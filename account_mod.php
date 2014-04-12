<?php

if (!isset($_SESSION))
	session_start();

include('cfg.php');
include('mysql.php');

function mod_account() {
	global $mysql_host;
	global $mysql_login;
	global $mysql_passwd;
	global $mysql_db;

	$con = connect_sql($mysql_host, $mysql_login, $mysql_passwd, $mysql_db);
	$hash = hash('whirlpool', mysqli_real_escape_string($con, $_POST['old_passwd']));
	$req_pre = mysqli_prepare($con, 'SELECT passwd FROM members WHERE login LIKE ?');
	mysqli_stmt_bind_param($req_pre, "s", $_SESSION['login']);
	mysqli_stmt_execute($req_pre);
	mysqli_stmt_bind_result($req_pre, $data['passwd']);
	mysqli_stmt_fetch($req_pre);
	echo $_SESSION['login']."<br />hash: ".$hash."<br />data: ".$data['passwd'];
	if ($hash == $data['passwd'])
	{
		$hash = hash('whirlpool', $_POST['passwd']);
		$con = connect_sql($mysql_host, $mysql_login, $mysql_passwd, $mysql_db);
		$req_pre = mysqli_prepare($con, 'UPDATE members SET passwd = ? WHERE login = ?');
		mysqli_stmt_bind_param($req_pre, "ss", $hash, $_SESSION['login']);
		mysqli_stmt_execute($req_pre);
		return true;
	}
	return false;
}

if (isset($_POST['old_passwd']) && !empty($_POST['old_passwd'])
	&& isset($_POST['passwd']) && !empty($_POST['passwd'])
	&& isset($_POST['cpasswd']) && !empty($_POST['cpasswd'])
	&& $_POST['passwd'] == $_POST['cpasswd'] && (mod_account() === true))
	header('Location: index.php?action=account&mod=ok');
else if (isset($_GET['account']) && $_GET['account'] == "mod")
{
	echo '<form action="account_mod.php" method="post">
	Ancien mot de passe: <br /><input type="password" name="old_passwd" value="" /><br />
	Nouveau mot de passe: <br /><input type="password" name="passwd" value="" /><br />
	Confirmation: <br /><input type="password" name="cpasswd" value="" /><br />
	<input type="submit" name="submit" value="OK" /></input>
	</form>';
}
else
	header('Location: index.php?action=account&mod=ko');
