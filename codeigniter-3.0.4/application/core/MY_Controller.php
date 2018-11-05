<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller 
{
	public function __construct() 
	{
		parent::__construct();

		$this->load->library('session');

		$this->load->helper('url');
		$this->load->helper('common');

		$this->load->model( 'PageAuthenticationModel' );

		$this->validateUserCredential();
		$this->validateVisitedPage();
	}

	function validateUserCredential()
	{
		if ( !$this->session->userdata('USER') )
		{
			$currentController = $this->uri->segment(1);
			if( !$this->PageAuthenticationModel->isOpenPage( $currentController ) ){
				$this->session->set_userdata('original-visited-uri', uri_string()); // save original visited uri to session
				redirect( 'login' );
			}
		}
	}

	function validateVisitedPage()
	{
		if( !isset( $_SESSION['USER'] ) )
			return;

		$userStatus = $_SESSION['USER']->status;
		$controllerName = $this->uri->segment(1);
		$functionName = $this->uri->segment(2);

		if( !$this->PageAuthenticationModel->isAuthorized( $controllerName, $functionName, $userStatus ) )
		{
			$this->redirectToDefaultHomePage();
		}
	}

	function redirectToDefaultHomePage()
	{
		$userStatus = $_SESSION['USER']->status;
		$defaultHomePage = $this->PageAuthenticationModel->getDefaultHomePage( $userStatus );
		redirect( $defaultHomePage );
	}

}