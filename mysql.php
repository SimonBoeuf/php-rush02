t<?php

function connect_sql($host, $login, $passwd, $base) {
	$con = null;

	if (empty($host) || empty($login) || empty($passwd))
		return $con;
	else if (empty($base))
		$con = mysqli_connect($host, $login, $passwd);
	else
		$con = mysqli_connect($host, $login, $passwd, $base);
	return $con;
}

function create_db($con, $db) {

	if (empty($db))
		return false;
	else
		$sql="CREATE DATABASE ".$db;

	if (mysqli_query($con, $sql))
		return true;
	else
		return false;
}

function create_table($con, $table) {

	if (empty($table))
		return false;
	else
		$sql = "CREATE TABLE ".$table;

	if (mysqli_query($con, $sql))
		return true;
	else
		return false;
}