<?php

session_destroy();

if (!isset($_SESSION))
	session_start();
$_SESSION['login'] = "";
$_SESSION['admin'] = 0;

header('Location: index.php');

