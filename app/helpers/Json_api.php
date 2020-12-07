<?php

function JSONExport($status = 200, $response = null)
{
	header("Content-Type: application/json; charset=UTF-8");
	echo json_encode(array(
		'status'	=> $status,
		'response'	=> $response
	));
}