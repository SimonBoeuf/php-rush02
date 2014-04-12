<?php

$bool = true;

include('cfg.php');
include('mysql.php');

function del_db() {
	global $mysql_host;
	global $mysql_login;
	global $mysql_passwd;
	global $mysql_db;
	global $bool;

	if ($con = connect_sql($mysql_host, $mysql_login, $mysql_passwd, $mysql_db))
	{
		foreach ($_POST as $key => $value) {
			if (is_numeric($key) && $key > 1)
			{
				$req_pre = mysqli_prepare($con, 'DELETE FROM members WHERE id='.$key);
				mysqli_stmt_execute($req_pre);
			}
		}
	}
	else
		$bool = false;
}

if (isset($_POST['submit']) && $_POST['submit'] == "Supprimer les membres")
{
	del_db();
	if ($bool === true)
		header('Location: index.php?action=manage&manage=delok');
}
else if (isset($_POST['submit']) && $_POST['submit'] == "OK")
{
	header('Location: index.php?action=manage&manage=delmembers');
}
else
{
	$con = connect_sql($mysql_host, $mysql_login, $mysql_passwd, $mysql_db);
	$req_pre = mysqli_prepare($con, 'SELECT id, login FROM members');
	mysqli_stmt_execute($req_pre);
	mysqli_stmt_bind_result($req_pre, $data['id'], $data['login']);
	echo "<form method=\"post\" action=\"del_members.php\"><table>";
	echo "<tr><td>ID</td><td>Login</td><td>Supr.</td></tr>";
	while(mysqli_stmt_fetch($req_pre))
	{
		if ($data['id'] > 1)
			echo "<tr><td>".$data['id']."</td><td>".$data['login']."</td><td><input type=\"checkbox\" name=\"".$data['id']."\" id=\"".$data['id']."\" /></td></tr>";
	}
	echo "</table><input type=\"submit\" name=\"submit\" value=\"Supprimer les membres\" /></form>";
}
