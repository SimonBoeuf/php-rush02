<div id="menuiblock">
			<ul id ="menu">
		<?php
			if (!isset($_SESSION['login']))
				session_start();
			if (empty($_SESSION['login']))
			{
				echo '<li><a href="index.php?action=login">Connexion</a>
				<ul>
					<li><a href="index.php?action=login">Se connecter</a></li>
					<li><a href="index.php?action=register">S\'inscrire</a></li>
				</ul>
				</li>';
			}
			else
			{
				echo '<li><a href="index.php?action=account">Mon compte</a>
				<ul>
					<li><a href="index.php?action=disconnect">D&eacute;connexion</a></li>
				</ul>
				</li>';
			}
		?>

				<?php
					if (isset($_SESSION['admin']) && $_SESSION['admin'] == 1)
						echo '<li><a href="index.php?action=manage">Admin</a></li>';
				?>
			</ul>
		</div>
