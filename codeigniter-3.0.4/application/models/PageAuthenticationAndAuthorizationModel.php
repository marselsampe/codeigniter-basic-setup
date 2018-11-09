<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class PageAuthenticationAndAuthorizationModel extends CI_Model 
{
	function __construct()
	{
		parent::__construct();
	}

	public function isOpenPage( $controllerName )
	{
		$openPages = array( 'login', 'logout', 'pagenotfound' );
		for( $i=0; $i < count( $openPages ); $i++ ){
			if( $openPages[ $i ] == $controllerName )
				return true;
		}

		return false;
	}

	public function getDefaultHomePage( $userStatus )
	{
		return 'home/index';
	}

	public function isAuthorized( $controllerName, $functionName, $userStatus )
	{
		if( $userStatus == 'Administrator' )
			return true;

		switch( strtolower( $controllerName ) ){
			case 'user' :
				return $this->checkUserController( $functionName, $userStatus );
		}

		return true;
	}

	function checkUserController( $functionName, $userStatus ){
		return false;
	}
}