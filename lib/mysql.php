<?php
function connect_db() {
	$server = 'localhost';
	$user = 'root';
	$pass = 'sportskeeda';
	$database = 'slim_db';
	$connection = new mysqli($server, $user, $pass, $database);

	return $connection;
}