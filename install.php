=<?php

include("mysql.php");

function create_cfg() {
	$filecontent = "<?php
\$mysql_login = '".$_POST['login']."';
\$mysql_passwd = '".hash(whirlpool, $_POST['passwd'])."';
\$mysql_host = '".$_POST['host']."';
\$mysql_db = '".$_POST['db']."';";
	file_put_contents("cfg.php", $filecontent);
}

if (isset($_POST['submit']) && $_POST['submit'] == "OK"
	&& isset($_POST['login']) && !empty($_POST['login'])
	&& isset($_POST['passwd']) && !empty($_POST['passwd'])
	&& isset($_POST['host']) && !empty($_POST['host'])
	&& isset($_POST['db']) && !empty($_POST['db'])
	&& $con = connect_sql($_POST['host'], $_POST['login'], $_POST['passwd']))
{
	create_cfg();
	create_db($con, $_POST['db']);
	$con = connect_sql($_POST['host'], $_POST['login'], $_POST['passwd'], $_POST['db']);
	create_table($con, "members(id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, login CHAR(30), passwd CHAR(128), admin BOOLEAN)");
}
?>

<!doctype html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<title>Setup 1/2</title>
		<link rel="stylesheet" href="install.css">
	</head>
	<body>
		<h1>Setup 1/2</h1>
		<div class="block">
		<?php
			if (!file_exists('cfg.php'))
			{
				echo '<form action="install.php" method="post">
				<p>Database name:<br /><input class="input" type="text" name="db" value="battleship" /><p />
				<p>MySQL login:<br /><input class="input" type="text" name="login" value="root" /><p />
				<p>MySQL password:<br /><input class="input" type="password" name="passwd" value="" /><p />
				<p>Database Host:<br /><input class="input" type="text" name="host" value=".local.42.fr" /><p />
				<input type="submit" name="submit" value="OK" /></input>';
			}
			else
				header( 'Location: create_admin.php' ) ;
		?>
			</form>
		</div>
	</body>
</html>
