<html>
	<head>
		<link rel ="stylesheet" type="text/css" href="style.css">
		<link rel ="stylesheet" type="text/css" href="index.css">
		<link rel ="stylesheet" type="text/css" href="test.css">
	</head>
	<body>
	</div>
		<?php
			include("menu.php");
		?>
		<?php

		if (!isset($_SESSION))
			session_start();

		if (isset($_GET['action']) && !empty($_GET['action']))
		{
			if ($_GET['action'] == "login")
				include('login.php');
			else if ($_GET['action'] == "register")
				include('register.php');
			else if ($_GET['action'] == "disconnect")
				include('disconnect.php');
			else if ($_GET['action'] == "manage")
				include('manage.php');
			else if ($_GET['action'] == "account")
				include('account.php');
		}
		else
			include('welcome.php');

		?>
		</div>
	</body>
</html>
