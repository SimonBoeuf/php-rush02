<!doctype html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<title>Account</title>
		<link rel="stylesheet" href="install.css">
	</head>
	<body>
		<h1>Account</h1>
		<div class="block">
		<?php

			if (isset($_GET['mod']) && $_GET['mod'] == "ok")
				echo 'Compte modifie<br /><br />';
			else if (isset($_GET['mod']) && $_GET['mod'] == "ko")
				echo 'Erreur<br /><br />';

			if (isset($_GET['account']) && $_GET['account'] == "mod")
			{
				include("account_mod.php");
				echo '<a href="index.php?action=account">Annuler</a><br />';
			}
			else if (isset($_GET['account']) && $_GET['account'] == "del")
				include("account_del.php");
			else
			{
				echo '<a href="index.php?action=account&account=mod">Changer de mot de passe</a><br />
						<a href="index.php?action=account&account=del">Supprimer mon compte</a><br />';
			}

		?>
		</div>
	</body>
</html>
