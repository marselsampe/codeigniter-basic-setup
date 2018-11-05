<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends My_Controller 
{
	public function __construct()
	{
		parent::__construct();

		if($this->session->userdata('USER'))
			redirect('home');
	}

	public function index()
	{
		$this->load->model('LoginModel');

		$username=$this->input->post('username');
		$password=$this->input->post('password');

		$input = new stdClass();
		$input->username=$username;
		$input->password=$password;

		$data[ 'input' ] = $input;

		if( isset($username) || isset($password) ){
			if( !$username || !$password ){
				$this->session->set_flashdata('msg_error', 'Username / password anda salah !');
			}else{
				$result = $this->LoginModel->checkLogin($input);
				if( $result != NULL ){
					$this->session->set_userdata('USER', $result); // save to session
					$this->loginSuccessRedirect();
				}else{
					$this->session->set_flashdata('msg_error', 'Username / password anda salah !');
				}
			}
		}

		$this->load->view('login/header');
		$this->load->view('login/index', $data);
		$this->load->view('login/footer');
	}

	function loginSuccessRedirect(){
		$originalVisitedUri = $this->session->userdata('original-visited-uri');
		if( $originalVisitedUri != 'home' ){
			unset($_SESSION['original-visited-uri']);
			redirect( $originalVisitedUri );
		}else{
			$usersName = $this->session->userdata('USER')->name;
			$this->session->set_flashdata('msg_success', '<h4>Welcome ' . $usersName . '</h4>');
			$this->redirectToDefaultHomePage();
		}
	}

	public function forgotpassword()
	{
		$this->load->view('login/header');
		$this->load->view('login/forgotpassword');
		$this->load->view('login/footer');
	}
}