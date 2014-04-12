<?php

include('cfg.php');
include('mysql.php');

function del_account() {
	global $mysql_host;
	global $mysql_login;
	global $mysql_passwd;
	global $mysql_db;

	if ($con = connect_sql($mysql_host, $mysql_login, $mysql_passwd, $mysql_db))
	{
		$req_pre = mysqli_prepare($con, 'SELECT id FROM  members WHERE login LIKE ?');
		mysqli_stmt_bind_param($req_pre, "s", $_SESSION['login']);
		mysqli_stmt_execute($req_pre);
		mysqli_stmt_bind_result($req_pre, $data['id']);
		mysqli_stmt_fetch($req_pre);
		if ($data['id'] > 1 && $con = connect_sql($mysql_host, $mysql_login, $mysql_passwd, $mysql_db))
		{
			$req_pre = mysqli_prepare($con, 'DELETE FROM members WHERE login LIKE ?');
			mysqli_stmt_bind_param($req_pre, "s", $_SESSION['login']);
			mysqli_stmt_execute($req_pre);
			return true;
		}
		else
			return false;
	}
	else
		return false;
}

if (del_account() === true)
{
	if (!isset($_SESSION))
		session_start();
	$_SESSION['login'] = "";
	$_SESSION['admin'] = 0;
	unset($_SESSION);
	session_destroy();
	echo "Compte supprime<br /><a href=\"index.php\">Revennir a l'index</a>";
}
else
	echo "Impossible de supprimer le compte";
