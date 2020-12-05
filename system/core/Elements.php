<?php

class Controller
{
    public function model($model)
	{
		require_once DIR . "/app/models/" . $model . ".php";
	}
	
	public function library($library)
	{
		require_once DIR . "/app/libraries/" . $library . ".php";
	}
	
	public function helper($helper)
	{
		require_once DIR . "/app/helpers/" . $helper . ".php";
	}

	public function view($page, $data = [])
	{
		if (is_array($data)) extract($data);
		require_once DIR . "/app/views/" . $page . ".php";
	}
}

class Model
{
	public function library($library)
	{
		require_once DIR . "/app/libraries/" . $library . ".php";
	}
	
	public function helper($helper)
	{
		require_once DIR . "/app/helpers/" . $helper . ".php";
	}
}