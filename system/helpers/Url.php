<?php

function base_url($location = null)
{
	switch ($location) {
		case null:
			$url = config()["base_url"];
			break;
		
		default:
			$url = config()["base_url"] . "/" . $location;
			break;
	}

	return $url;
}

function redirect($location = null)
{
	echo '<script>window.location = "' . base_url($location) . '"</script>';
}

function redirectTo($location = null)
{
	echo '<script>window.location = "' . $location . '"</script>';
}
