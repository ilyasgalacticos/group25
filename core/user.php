<?php 
	
	$online = false;
	$USER = null;

	session_start();

	if(isset($_SESSION['CURRENT_USER'])){

		$online = true;
		$USER = $_SESSION['CURRENT_USER'];

	}

	define("ONLINE", $online);
	define('USER', $USER);
	

?>