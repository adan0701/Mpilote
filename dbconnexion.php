<?php
	header('Content-Type:text/html;charset=utf-8');
	
	define('BDD_USER', 'root');
	define('BDD_PWD', 'root');
	define('BDD_SERVER', 'localhost');
	define('BDD_NAME', 'mpilote');

	$db = new PDO('mysql:host='.BDD_SERVER.';dbname='.BDD_NAME.';charset=utf8mb4', BDD_USER, BDD_PWD);

	session_start();
?>