<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller 
{
	public function __construct() 
	{
		parent::__construct();

        $this->load->helper('url');
		$this->load->library('session');
        $this->load->helper('common');

		$this->validateUser();
	}

	function validateUser()
	{
		if ( !$this->session->userdata('USER') )
		{
			$currentPage = $this->uri->segment(1);
			if( $this->isRestrictedPage( $currentPage ) )
				redirect( 'login' );
		}
	}

	function isRestrictedPage( $page ){
		$openPages = array( 'login', 'logout' );
		for( $i= 0; $i <= count( $openPages ); $i++ )
			if( $openPages[ $i ] == $page )
				return false;
		return true;
	}

}
