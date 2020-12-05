<?php

class Main 
{
	private $controller = 'home';
	private $method = 'index';
	private $params = [];

	public function __construct()
	{
		$uri = $this->uri();
		$iurl = (is_array($uri)) ? count($uri): 0;
		$dfc = $this->controller;
		$a = false; $i = 0;

		do {
			if (file_exists(DIR . '/app/controllers/' . $uri[0] . '.php')) {
				$dfc = $uri[0];
				unset($uri[0]);
				$a = true;
			} else if (file_exists(DIR . '/app/controllers/' . $uri[0] . '/' . $this->controller . '.php')) {
				$dfc = $uri[0] . '/' . $this->controller;
				unset($uri[0]);
				$a = true;
			} else {
				$i = $i + 1;
				if (isset($uri[$i])) {
					$uri[0] = $uri[0] . "/" . $uri[$i];
					unset($uri[$i]);
				}
			}
		} while (!$a && $i < $iurl);

		include DIR . "/app/controllers/" . $dfc . ".php";
		$ctrl = explode("/", $dfc);
		$this->controller = end($ctrl);
		$this->controller = new $this->controller;

		if (!empty($uri)) {
			if (method_exists($this->controller, reset($uri))) {
				$this->method = reset($uri);
				unset($uri[array_keys($uri, reset($uri))[0]]);
			}
		}

		if (!empty($uri)) {
			$this->params = (array) array_values($uri);
		}

		call_user_func_array([$this->controller, $this->method], $this->params);
	}

	public function uri()
	{
		if (isset($_GET['q'])) {
			$url = rtrim($_GET['q'], '/'); // fn rtrim() berfungsi menghapus tanda setelah string
			
			$url = filter_var($url, FILTER_SANITIZE_URL); // filter karakter aneh di url
			$url = explode('/', $url);

			return $url;
		}
	}
}
