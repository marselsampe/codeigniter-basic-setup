<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginModel extends CI_Model {
	function __construct()
	{
		parent::__construct();
	}

	function checkLogin( $input )
	{
		$hashedPassword = md5($input->password);
		$sql = "SELECT * FROM user WHERE username=? AND password=?";
    	$query=$this->db->query($sql, array( $input->username, $hashedPassword ));
		if ($query->num_rows() > 0)
			return $query->row();
		else
			return null;
	}

	function getSession( $username )
	{
		$sql = "SELECT * FROM user WHERE username=?";
		$query=$this->db->query($sql, $username );
		if ($query->num_rows() > 0)
			return $query->row();
		else
			return null;
	}
}