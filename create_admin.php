<?php

$bool = true;

include("cfg.php");
include("mysql.php");

function insert_db() {
	global $mysql_host;
	global $mysql_login;
	global $mysql_passwd;
	global $mysql_db;
	global $bool;

	if ($con = connect_sql($mysql_host, $mysql_login, $mysql_passwd, $mysql_db))
	{
		$hash = hash('whirlpool', mysqli_real_escape_string($con, $_POST['passwd']));
		$req_pre = mysqli_prepare($con, 'INSERT INTO members (login, passwd, admin) VALUES (?, ?, 1)');
		mysqli_stmt_bind_param($req_pre, "ss", mysqli_real_escape_string($con, $_POST['login']), $hash);
		mysqli_stmt_execute($req_pre);
	}
	else
		$bool = false;
}

function check_admin() {
	global $mysql_host;
	global $mysql_login;
	global $mysql_passwd;
	global $mysql_db;

	$con = connect_sql($mysql_host, $mysql_login, $mysql_passwd, $mysql_db);
	$req_pre = mysqli_prepare($con, 'SELECT id FROM members WHERE admin=1');
	mysqli_stmt_execute($req_pre);
	mysqli_stmt_bind_result($req_pre, $data['id']);
	while(mysqli_stmt_fetch($req_pre))
	{
		if (!empty($data['id']))
			return true;
	}
	return false;
}

if (isset($_POST['submit']) && $_POST['submit'] == "OK"
	&& isset($_POST['login']) && !empty($_POST['login'])
	&& isset($_POST['passwd']) && !empty($_POST['passwd'])
	&& isset($_POST['cpasswd']) && !empty($_POST['cpasswd'])
	&& $_POST['passwd'] == $_POST['cpasswd'])
	insert_db();

?>

<!doctype html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<title>Setup 2/2</title>
		<link rel="stylesheet" href="install.css">
	</head>
	<body>
		<h1>Setup 2/2</h1>
		<div class="block">
		<?php
		if ($bool === true && check_admin() === true)
			header('Location: index.php?action=login');
		else if ($bool === true)
			{
				echo '<form action="create_admin.php" method="post">
				<p>Admin login:<br /><input class="input" type="text" name="login" pattern=".{4,}" maxlength="30" value="" /><p />
				<p>Admin password:<br /><input class="input" type="password" pattern=".{6,}" maxlength="30" name="passwd" value="" /><p />
				<p>Confirm password:<br /><input class="input" type="password" pattern=".{6,}" maxlength="30" name="cpasswd" value="" /><p />
				<input type="submit" name="submit" value="OK" /><br />Login min length: 4 chars<br />Password min length: 6 chars
				</form>';
			}
		else
			echo '<p>An error has occured, please try again</p>';
		?>
		</div>
	</body>
</html>
