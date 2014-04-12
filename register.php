<?php

$bool = true;

include('cfg.php');
include('mysql.php');

function create_account() {
	global $mysql_host;
	global $mysql_login;
	global $mysql_passwd;
	global $mysql_db;
	global $bool;

	if ($con = connect_sql($mysql_host, $mysql_login, $mysql_passwd, $mysql_db))
	{
		$hash = hash('whirlpool', mysqli_real_escape_string($con, $_POST['passwd']));
		$req_pre = mysqli_prepare($con, 'INSERT INTO members (login, passwd, admin) VALUES (?, ?, 0)');
		mysqli_stmt_bind_param($req_pre, "ss", mysqli_real_escape_string($con, $_POST['login']), $hash);
		mysqli_stmt_execute($req_pre);
	}
	else
		$bool = false;
}

function check_member() {
	global $mysql_host;
	global $mysql_login;
	global $mysql_passwd;
	global $mysql_db;

	$con = connect_sql($mysql_host, $mysql_login, $mysql_passwd, $mysql_db);
	$req_pre = mysqli_prepare($con, 'SELECT login FROM members');
	mysqli_stmt_execute($req_pre);
	mysqli_stmt_bind_result($req_pre, $data['login']);
	while(mysqli_stmt_fetch($req_pre))
	{
		if (!empty($data['login']) && $data['login'] == $_POST['login'])
			return false;
	}
	return true;
}

if (isset($_SESSION) && isset($_SESSION['login']) && !empty($_SESSION['login']))
	echo "Vous ne pouvez pas vous inscrire en etant connecte<br />";
else if (isset($_POST['submit']) && $_POST['submit'] == "OK"
	&& isset($_POST['login']) && !empty($_POST['login'])
	&& isset($_POST['passwd']) && !empty($_POST['passwd'])
	&& isset($_POST['cpasswd']) && !empty($_POST['cpasswd'])
	&& $_POST['passwd'] == $_POST['cpasswd'])
{
	if (check_member() === true)
	{
		create_account();
		header('Location: index.php?action=login');
	}
	else
		header('Location: index.php?action=register&error=badlogin');
}
else if (isset($_POST['submit']) && $_POST['submit'] == "OK")
	header('Location: index.php?action=register');
else
{
	echo '<form action="register.php" method="POST">
		<DIV id="rectangle_new">
		<CENTER>
		<SPAN><H2>Inscription</H2></SPAN>
		<HR width="100%"color="black">
		<br />
		<br />
		<div>Identifiant: </div>
		<input type="text" pattern=".{4,}" name="login" value="">
		<br />
		<br />
		<div>Mot de passe: </div>
		<input type="password"  pattern=".{6,}" name="passwd" value=""></SPAN>
		<br />
		<br />
		<div>Confirmez votre mot de passe: </div>
		<input type="password" pattern=".{6,}" name="cpasswd" value=""></SPAN>
		<br />
		<br />
		<input id="valid" type="submit" name="submit" value="OK">
		<a href="index.php">Retour a l\'index</a><br />';

		if(isset($_GET['error']) && $_GET['error'] == "badlogin")
			echo 'Error: Login deja existant.<br />';
		echo '</CENTER>
		</DIV>
		</form> ';
}
