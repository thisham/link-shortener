<?php

class url extends Controller
{
	private $url;

	function __construct() {
		$this->model('Model_url');
		$this->url = new Model_url();
	}

	function index($url = null)
	{
		JSONExport(200, $this->url->get($url));
	}

	private function credentialCheck()
	{
		if ($_POST["appCode"] != "linker2020") {
			JSONExport(403, $this->url->get());
			exit;
		}
	}

	function post()
	{
		$this->credentialCheck();
		($this->url->post($_POST) > 0)?
			JSONExport(200, $this->url->get()):
			JSONExport(304, $this->url->get());
	}

	function fetch($id = null)
	{
		$this->credentialCheck();
		($this->url->fetch($_POST["longLink"], $id) > 0)?
			JSONExport(200, $this->url->get($id)):
			JSONExport(304, $this->url->get($id));
	}

	function delete($id = null)
	{
		$this->credentialCheck();
		($this->url->delete($_POST["longLink"], $id) > 0)?
			JSONExport(200, $this->url->get($id)):
			JSONExport(304, $this->url->get($id));
	}
}
