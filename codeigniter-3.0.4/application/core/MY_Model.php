<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class MY_Model extends CI_Model {
	function __construct()
	{
		parent::__construct();
	}

	protected $SearchSessionPrefix = "_default";
	
	public function handleAndGetSearchSession($searchCategory, $searchKeyword, $isReset)
	{
		$prefix = $this->SearchSessionPrefix;
		$search = new stdClass();

		if( $isReset ){
			$search->searchCategory=NULL;
			$search->searchKeyword=NULL;
			unset($_SESSION['SearchCategory' . $prefix]);
			unset($_SESSION['SearchKeyword' . $prefix]);
			return $search;
		}

		if($searchCategory)
		{			
			$this->session->set_userdata('SearchCategory' . $prefix, $searchCategory);
			$this->session->set_userdata('SearchKeyword' . $prefix, $searchKeyword);
		}
		elseif($this->session->userdata('SearchCategory' . $prefix))
		{
			$searchCategory = $this->session->userdata('SearchCategory' . $prefix);
			$searchKeyword = $this->session->userdata('SearchKeyword' . $prefix);
		}
		else
		{
			$searchCategory = "";
			$searchKeyword = "";
		}

		$search->searchCategory=$searchCategory;
		$search->searchKeyword=$searchKeyword;

		return $search;
	}

}