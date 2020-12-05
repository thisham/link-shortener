<?php

function config() {
	return array(
		"database"	=> array(
			"name"	=> "tes_data",
			"user"	=> "root",
			"pass"	=> "",
			"host"	=> "localhost"
		),
		"autoload"	=> array(
			"models"	=> [],
			"libraries"	=> ['database'],
			"helpers"	=> ['url']
		),
		"base_url"	=> "http://localhost/label/backend"
	);
}