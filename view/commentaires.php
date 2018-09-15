<?php
	require ("../config/setup.php");
	if (isset($_GET['pictures_id']) && !empty($_GET['pictures_id']))
	{
		$pictures_secure = htmlspecialchars($_GET['pictures_id']);
		$nb_pictures = $bdd->prepare("SELECT * FROM pictures WHERE pictures_id = ?");
		$nb_pictures->execute(array($pictures_secure));
		$nb = $nb_pictures->fetch();
	}
	if (isset($_POST['button_commentaire']))
	{
		if (isset($_POST['pseudo_commentaires']) && isset($_POST['text_commentaires']) && !empty($_POST['pseudo_commentaires']) && !empty($_POST['text_commentaires']))
		{
			$pseudo_com = htmlspecialchars($_POST['pseudo_commentaires']);
			$text_com = htmlspecialchars($_POST['text_commentaires']);

			if (strlen($pseudo_com) < 50)
			{
				$commentaire_bdd = $bdd->prepare("INSERT INTO commentaires (pseudo, commentaire, id_picture) VALUES (?, ?, ?)");
				$commentaire_bdd->execute(array($pseudo_com, $text_com, $pictures_secure));
				$msg = "<p style='color: green;'>Votre commentaire a bien ete posté !</p>";
				if (isset($_GET['users']) && !empty($_GET['users']))
				{
					$users_secure = htmlspecialchars($_GET['users']);
					$adress_mail = $bdd->prepare("SELECT mail FROM menbre WHERE id = ?");
					$adress_mail->execute(array($users_secure));
					$mail = $adress_mail->fetch();
					/*require ("../function/phpmailer1.php");*/
				}
			}
			else
				$msg = "Votre pseudo ne doit pas dépassé 50 caractères !";
		}
		else
			$msg = "Tous les champs doivent etre remplis !";
	}

	$echo_commentaire = $bdd->prepare("SELECT * FROM commentaires WHERE id_picture = ? ORDER BY id_commentaire DESC");
	$echo_commentaire->execute(array($pictures_secure));
?>


<section>
	
	<div id="picture_commentaire">
			<?php
				echo "<img id='pic_com'src='{$nb['picturesnames']}' />";
			?>
	</div>

	<?php
		if ($_SESSION['id'])
		{
			echo '
				<div>
					<form method="post">
						<label for="pseudo_commentaires">Pseudo :</label><br />
						<input type="text" name="pseudo_commentaires" id="pseudo_commentaires" value=' . $_SESSION["pseudo"] .'><br />
						<label for="text_commentaires">Votre commentaire :</label><br />
						<textarea name="text_commentaires" id="text_commentaires"></textarea><br />
						<input type="submit" name="button_commentaire" value="Poster mon commentaire!">
					</form>
				</div> ';
		}
	?>

	<?php
			if ($msg)
			echo $msg;
	?>
	<div>
		<h2>Commentaires :</h2>
		<?php
			while ($donnees = $echo_commentaire->fetch())
			{
				echo "<p style='word-wrap: break-word;'><span style='font-weight: bold;'>{$donnees['pseudo']}</span> : {$donnees['commentaire']}</p>";
			}
		?>
	</div>
</section>