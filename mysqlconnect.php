#!/usr/bin/php
<?php

function mysqlconnect(){

	$mydb = new mysqli('127.0.0.1','testuser','12345','FantasyFootball');

	if ($mydb->errno != 0)
	{
		echo "failed to connect to database: ". $mydb->error . PHP_EOL;
		exit(0);
	}

	return $mydb;

}
?>
