<!doctype html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<title>Manage</title>
		<link rel="stylesheet" href="install.css">
	</head>
	<body>
		<h1>Manage</h1>
		<div class="block">
		<?php

		if (!isset($_SESSION) || (isset($_SESSION['admin']) && $_SESSION['admin'] == 0))
			header('Location: index.php');
		else
		{
			if (isset($_GET['manage']) && $_GET['manage'] == "delmembers")
			{
				include("del_members.php");
				echo '<a href="index.php?action=manage">Annuler</a><br />';
			}
			else
				echo '<a href="index.php?action=manage&manage=delmembers">Supprimer des membres</a><br />';
		}
		?>
		</div>
	</body>
</html>
