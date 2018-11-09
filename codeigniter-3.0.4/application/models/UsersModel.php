<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class UsersModel extends MY_Model {
	function __construct()
	{
		parent::__construct();

		// parent variables
		$this->SearchSessionPrefix = '_user';
	}

	private $_defaultSearchCategory = 'name';

	public function getData($searchCategory, $searchKeyword, $limit=NULL, $offset=NULL, $isIncludeArchivedRecords=FALSE)
	{
		if($offset==NULL)
			$offset=0;

		if( $searchCategory == "" )
			$searchCategory = $this->_defaultSearchCategory;

		$archivedSql = !$isIncludeArchivedRecords ? " isArchived != 1 AND " : ""; 
		$sql = "SELECT * FROM user " .
		" WHERE " . $archivedSql .
		" " . $searchCategory . " LIKE ? ORDER BY " . $searchCategory . " ASC ".
		( $limit ? " LIMIT ". $limit ." OFFSET ". $offset : "" );
		$query = $this->db->query( $sql, array( $searchKeyword ));

		return $query->result();
	}

	public function getDataCount( $searchCategory, $searchKeyword )
	{
		if( $searchCategory == "" )
			$searchCategory = $this->_defaultSearchCategory;

		$sql = "SELECT COUNT(uniqueId) AS total FROM user WHERE isArchived != 1 AND  " . $searchCategory . " LIKE ?";
		$query = $this->db->query($sql, array( $searchKeyword ));

		return $query->row_object()->total;
	}

}