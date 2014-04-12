<?php

$bool = true;

include('cfg.php');
include('mysql.php');

function add_history() {
	global $mysql_host;
	global $mysql_login;
	global $mysql_passwd;
	global $mysql_db;
	global $bool;

	if ($con = connect_sql($mysql_host, $mysql_login, $mysql_passwd, $mysql_db))
	{
		if (!create_table($con, "history"))
			return (false);
		$req_pre = mysqli_prepare($con, 'INSERT INTO history (login, opponent, name, date, result) VALUES ('.$data['login'].$data['nom_partie'].date(time(), '%Y-%m-%d ').')');
		mysqli_stmt_bind_param($req_pre, "ss", mysqli_real_escape_string($con, $_POST['login']), $hash);
		mysqli_stmt_execute($req_pre);
	}
	else
		return (false);
}
?>