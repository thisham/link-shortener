<?php
if (!session_id()) {
	session_start();
}

define('DIR', __DIR__);

require_once DIR . "/system/init.php";

$main = new Main;