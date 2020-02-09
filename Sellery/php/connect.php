<?php
	define('INCLUDE_CHECK',true);
	$currentURL = $_SERVER['SCRIPT_FILENAME'];
	if(!defined('INCLUDE_CHECK')) 
		die('You are not allowed to execute this file directly');

    $dbHost = 'localhost';

	$dbUser = 'Adam';
	$dbPass = 'Basketball481234';
	$dbDatabase = 'selleryShower'; 
	
	$dbHandle = new mysqli($dbHost,$dbUser,$dbPass,$dbDatabase) or die('Unable to establish a DB connection');

	mysqli_query($dbHandle,"SET names UTF8");
	mysqli_query($dbHandle,"SET CHARACTER SET utf8");
?>