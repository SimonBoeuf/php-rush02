<?php

$bool = true;

include('cfg.php');
include('mysql.php');

function check_member() {
	global $mysql_host;
	global $mysql_login;
	global $mysql_passwd;
	global $mysql_db;

	if (!isset($_SESSION))
		session_start();
	$hash = hash('whirlpool', $_POST['passwd']);
	$con = connect_sql($mysql_host, $mysql_login, $mysql_passwd, $mysql_db);
	$req_pre = mysqli_prepare($con, 'SELECT login, passwd, admin FROM members');
	mysqli_stmt_execute($req_pre);
	mysqli_stmt_bind_result($req_pre, $data['login'], $data['passwd'], $data['admin']);
	while(mysqli_stmt_fetch($req_pre))
	{
		echo $data['login']." - ".$_POST['login']."<br />";
		if (!empty($data['login']) && $data['login'] == $_POST['login'] && $data['passwd'] == $hash)
		{
			$_SESSION['admin'] = $data['admin'];
			$_SESSION['login'] = $data['login'];
			return true;
		}
	}
	return false;
}


if (!isset($_GET['msg']) && isset($_SESSION) && !empty($_SESSION['login']))
	echo 'deja connect<br />';
else if (isset($_POST['submit']) && $_POST['submit'] == "OK"
	&& isset($_POST['login']) && !empty($_POST['login'])
	&& isset($_POST['passwd']) && !empty($_POST['passwd']))
{
	echo "ok";
	if (check_member() === true)
		header('Location: index.php?action=login&msg=success');
	else
		header('Location: index.php?action=login&error=badlogin');
}
else if (isset($_POST['submit']) && $_POST['submit'] == "OK")
	header('Location: index.php?action=login');
else
{
	echo '<form action="login.php" method="POST">
		<div id="space_bis"><H2>CONNEXION</H2></div>
		<br />
		<br />
		<div id="space_id"><h4>Identifiant: </h4><input type="text" name="login" value=""></div>
		<br />
		<br />
		<div id="space_pa"><h4>Mot de passe: </h4><input type="password" name="passwd" value=""></div>
		<br /><input id="space_sub" type="submit" name="submit" value="OK">
		<br /><a href="index.php"><div id="space_cb">Annuler</div></a><br />
		</form>';
}
