<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends MY_Controller 
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		unset($_SESSION['USER']);
		unset($_SESSION['USER_EXTENDED_DATA']);
		redirect('login');
	}
}