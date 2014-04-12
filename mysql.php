<?php

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

function getData($login1, $login2)
{
	if ($con = connect_sql($mysql_host, $mysql_login, $mysql_passwd, $mysql_db))
	{
		$query = mysqli_query($con, "SELECT login FROM data WHERE login1 LIKE ".$login1." AND login2 LIKE ".$login2);
		$logins = mysqli_fetch_array($query, MYSQLI_ASSOC);
		$query = mysqli_query($con, "SELECT nom_partie FROM data WHERE login1 LIKE ".$login1." AND login2 LIKE ".$login2);
		$nom_partie = mysqli_fetch_array($query, MYSQLI_ASSOC);
		$query = mysqli_query($con, "SELECT * FROM vaisseaux WHERE login1 LIKE ".$login1." AND login2 LIKE ".$login2);
		$vaisseaux = mysqli_fetch_array($query, MYSQLI_ASSOC);
		$nom_classe = array();
		$i = 0;
		foreach ($vaisseaux as $key => $value) {
			if ($key == "nom")
				$nom_classe["nom"][$i] = $value;
			if ($key == "classe")
			{
				$nom_classe["classe"][$i] = $value;
				$i++;
			}
		}
		$ret = array(
			"logins" => array($logins['login1'], $logins['login2']),
			"nom_partie" => $nom_partie['nom_partie'],
			"vaisseaux" => $nom_classe
			);
		return ($ret);
	}
	else
		return (null);
}
?>