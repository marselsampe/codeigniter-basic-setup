<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends My_Controller 
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		if ($this->session->userdata('USER'))
			redirect('home');

		$this->load->model('LoginModel');

		$username=$this->input->post('username');
		$password=$this->input->post('password');

		$input =new stdClass();
		$input->username=$username;
		$input->password=$password;

		if( isset($username) || isset($password) ){
			if( !$username || !$password ){
				$this->session->set_flashdata('msg_error', 'Username / password salah !');
			}else{
				$result = $this->LoginModel->checkLogin($input);
				if( $result != NULL ){
					$this->session->set_userdata('USER', $result);
					redirectUserToHome( $status );
				}else{
					$this->session->set_flashdata('msg_error', 'Username / password salah !');
				}
			}
		}

		$data[ 'input' ] = $input;

		$this->load->view('layout/header');
		$this->load->view('login/index', $data);
		$this->load->view('layout/footer');
	}
}