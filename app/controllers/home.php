<?php

class home extends Controller
{
	private $url;

	function __construct() {
		$this->model('Model_url');
		$this->url = new Model_url();
	}

	function index($url = null)
	{
		if (is_null($url)) {
			$this->page();
		} else {
			$redirect = $this->url->get($url);
			redirectTo($redirect["target_url"]);
		}
	}

	private function page()
	{
		$data = array(
			"title"	=> "Shorten your URL's now!"
		);

		$this->view('web/header', $data);
		$this->view('web/navbar');
		$this->view('web/page');
		$this->view('web/footer');
	}

	function index2()
	{
		echo "Framework not Installed!";
	}
}
