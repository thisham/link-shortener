<?php

function config() {
	return array(
		"database"	=> array(
			"name"	=> "lshort",
			"user"	=> "root",
			"pass"	=> "",
			"host"	=> "localhost"
		),
		"autoload"	=> array(
			"models"	=> [],
			"libraries"	=> ['database'],
			"helpers"	=> ['url', 'json_api']
		),
		"base_url"	=> "http://localhost/project/lshort"
	);
}