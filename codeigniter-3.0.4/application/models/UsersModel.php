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

	public function getDetail($id)
	{
		$query = $this->db->query("SELECT * FROM user WHERE uniqueId=".$id);
		return $query->row_object();
	}

	public function insert( $input )
	{
		$this->db->trans_begin();

		$isArchived = isset( $input->isArchived ) ? $input->isArchived : 0;
		$sql = "INSERT INTO user (name, username, password, email, status, isActive, isArchived) VALUES (?,?,?,?,?,?,?)";
		$this->db->query($sql, array($input->name, $input->username, md5($input->password), $input->email, $input->status, 1, $isArchived));
		$userQueryResult = $this->db->error();

		if ($this->db->trans_status() === FALSE)
		{
			if( $userQueryResult["code"] != "0" )
				$result = $userQueryResult;

			$this->db->trans_rollback();
		}
		else{
			$result = null;
			$this->db->trans_commit();
		}

		return $result;
	}

	public function update($input, $id){
		$archivedSql = isset( $input->isArchived ) ? ", isArchived=" . $input->isArchived . " " : "";
		if($input->password==""){
			$sql = "UPDATE user SET username=?, name=?, status=?, email=?, isActive=? " . $archivedSql . " WHERE uniqueId=?";
			$this->db->query($sql, array($input->username, $input->name, $input->status, $input->email, $input->isActive, $id));
		}
		else
		{
			$sql = "UPDATE user SET username=?, password=?, name=?, status=?, email=?, isActive=? " . $archivedSql . " WHERE uniqueId=?";
			$this->db->query($sql, array($input->username, md5($input->password), $input->name, $input->status, $input->email, $input->isActive, $id));
		}

		return $this->db->error();
	}

	public function delete($id){
		$sql = "UPDATE user SET isArchived=1 WHERE uniqueId=?";
		$this->db->query($sql, array($id));

		return $this->db->error();
	}

	public function permanentDelete($id){
		$sql = "DELETE FROM user WHERE uniqueId=?";
		$this->db->query($sql, array($id));

		return $this->db->error();
	}

}