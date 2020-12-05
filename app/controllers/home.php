<?php

class home extends Controller
{

	function index()
	{
		$this->view('web/index', ['as' => 'asdasd']);
	}

	function index2()
	{
		echo "Framework not Installed!";
	}
}
