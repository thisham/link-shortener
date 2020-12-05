<?php

$loader = (object) config()["autoload"];

if (count($loader->models) > 0) {
	for ($i=0; $i < count($loader->models); $i++) { 
		if (file_exists(DIR . "/app/models/" . ucfirst($loader->models[$i]) . ".php")) {
			include_once DIR . "/app/models/" . ucfirst($loader->models[$i]) . ".php";
		} else if (file_exists(DIR . "/system/models/" . ucfirst($loader->models[$i]) . ".php")) {
			include_once DIR . "/system/models/" . ucfirst($loader->models[$i]) . ".php";
		}
	}
}

if (count($loader->libraries) > 0) {
	for ($i=0; $i < count($loader->libraries); $i++) { 
		if (file_exists(DIR . "/app/libraries/" . ucfirst($loader->libraries[$i]) . ".php")) {
			include_once DIR . "/app/libraries/" . ucfirst($loader->libraries[$i]) . ".php";
		} else if (file_exists(DIR . "/system/libraries/" . ucfirst($loader->libraries[$i]) . ".php")) {
			include_once DIR . "/system/libraries/" . ucfirst($loader->libraries[$i]) . ".php";
		}
	}
}

if (count($loader->helpers) > 0) {
	for ($i=0; $i < count($loader->helpers); $i++) { 
		if (file_exists(DIR . "/app/helpers/" . ucfirst($loader->helpers[$i]) . ".php")) {
			include_once DIR . "/app/helpers/" . ucfirst($loader->helpers[$i]) . ".php";
		} else if (file_exists(DIR . "/system/helpers/" . ucfirst($loader->helpers[$i]) . ".php")) {
			include_once DIR . "/system/helpers/" . ucfirst($loader->helpers[$i]) . ".php";
		}
	}
}