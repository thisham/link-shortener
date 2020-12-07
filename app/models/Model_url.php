<?php

class Model_url extends Model
{
	private $mainTable = 'links';
	private $db;

	function __construct() {
		$this->db = new Database();
	}

	function get($id = null)
	{
		return (is_null($id))? 
			$this->getAll(): 
			$this->getOne($id);
	}

	private function getAll()
	{
		$query = "SELECT * FROM $this->mainTable";

		return $this->db->query($query)->execute()->fetchAll();
	}

	private function getOne($id)
	{
		$query = "SELECT * FROM $this->mainTable WHERE shortened = :link";

		return $this->db->query($query)->bind(['link' => $id])->execute()->fetchOne();
	}

	private function postedData($data, $type = "post")
	{
		return array(
			"short"	=> $data["shortLink"],
			"link"	=> $data["longLink"],
			"date"	=> date("Y-m-d H:i:s")
		);
	}

	function post($data)
	{
		$data = $this->postedData($data);
		$query = "INSERT INTO $this->mainTable VALUES (:short, :link, :date)";

		return $this->db->query($query)->bind($data)->execute()->rowCount();
	}

	function delete($id = null)
	{
		return (is_null($id))?
			$this->deleteAll():
			$this->deleteOne($id);
	}
	
	private function deleteAll()
	{
		$query = "DELETE FROM $this->mainTable";

		return $this->db->query($query)->execute()->rowCount();
	}

	private function deleteOne($id)
	{
		$query = "DELETE FROM $this->mainTable WHERE link = :link";

		return $this->db->query($query)->bind(["link" => $id])->execute()->rowCount();
	}

	function fetch($longLink, $shortLink = null)
	{
		return (is_null($shortLink))?
			$this->fetchAll($longLink):
			$this->fetchOne($longLink, $shortLink);
	}

	private function fetchAll($longLink)
	{
		$data = array(
			"link"	=> $longLink
		);
		$query = "UPDATE $this->mainTable SET target_url = :link";

		return $this->db->query($query)->bind($data)->execute()->rowCount();
	}

	private function fetchOne($longLink, $shortLink)
	{
		$data = array(
			"link"	=> $longLink,
			"short"	=> $shortLink
		);
		$query = "UPDATE $this->mainTable SET target_url = :link, shortened = :short";

		return $this->db->query($query)->bind($data)->execute()->rowCount();
	}
}
