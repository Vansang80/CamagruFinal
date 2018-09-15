<?php
	require ("../config/setup.php");

	if (isset($_GET['section']) && !empty($_GET['section']))
	{
		$section = htmlspecialchars($_GET['section']);
	}
	else
		$section = "";

	if (isset($_POST['mail_recup_button']))
	{
		if (isset($_POST['mail_recup']) && !empty($_POST['mail_recup']))
		{
			$mail_recup = htmlspecialchars($_POST['mail_recup']);

			if (filter_var($mail_recup, FILTER_VALIDATE_EMAIL))
			{
				$mail_recu = $bdd->prepare("SELECT mail FROM menbre WHERE mail = ?");
				$mail_recu->execute(array($mail_recup));

				$mail_exist = $mail_recu->rowCount();

				if ($mail_exist == 1)
				{
					$_SESSION['mail_recu'] = $mail_recup;
					
					for ($i = 0; $i <= 8; $i++)
					{
						$code_recu .= mt_rand(0, 9);
					}
					
					$mail_recup_exist = $bdd->prepare("SELECT id FROM recuperation WHERE mail = ?");
					$mail_recup_exist->execute(array($mail_recup));
					$mail_recup_exist1 = $mail_recup_exist->rowCount();

					if ($mail_recup_exist1 == 1)
					{
						$insert_recup = $bdd->prepare("UPDATE recuperation SET code = ? WHERE mail = ?");
						$insert_recup->execute(array($code_recu, $mail_recup));
					}
					else
					{
						$insert_recup = $bdd->prepare("INSERT INTO recuperation(mail, code) VALUES(?, ?)");
						$insert_recup->execute(array($mail_recup, $code_recu));
					}
					require ("../function/phpmailer2.php");
					$msg = "Un messsage vous a été envoyer dans votre boite mail !";
				}
				else
					$msg = "Cette adresse n'est pas dans notre base de donnee !";
			}
			else
				$msg = "Votre email est errone !";
		}
		else
			$msg = "Rentrer votre adresse mail !";
	}


	if (isset($_POST['verif_recup_button']) && !empty($_POST['verif_recup_button']))
	{
		 if (isset($_POST['verif_code']) && !empty($_POST['verif_code']))
		 {
		 	$verif_code = htmlspecialchars($_POST['verif_code']);
		 	$verif = $bdd->prepare("SELECT id FROM recuperation WHERE mail = ? AND code = ?");
		 	$verif->execute(array($_SESSION['mail_recu'], $verif_code));
		 	$verif = $verif->rowCount();

		 	if ($verif == 1)
		 	{
		 		header("Location: indexView.php?page=password_recup&section=change_mdp");
		 	}
		 	else
		 		$msg = "Code invalide";
		 }
		 else
			$msg = "Veuillez renter votre code";
	}

	if (isset($_POST['change_mdp_button']) && !empty($_POST['change_mdp_button']))
	{
		if (isset($_POST['change_mdp']) && isset($_POST['change_mdp_con']) && !empty($_POST['change_mdp']) && !empty($_POST['change_mdp_con']))
		{
			$mdp = htmlspecialchars($_POST['change_mdp']);
			$mdp_conf = htmlspecialchars($_POST['change_mdp_con']);

			if ($mdp == $mdp_conf)
			{
				$password = hash("whirlpool", $mdp);

				$insert_new_mdp = $bdd->prepare("UPDATE menbre SET motdepasse = ? WHERE mail = ?");
				$insert_new_mdp->execute(array($password, $_SESSION['mail_recu']));
				$msg = "Votre mot de passe a été changé !";
			}
			else
				$msg = "Vos mots de passe ne corespondent pas !";
		}
		else
			$msg = "Tous les champs doivent être remplis !";

	}
?>

<section>
	<?php
		if ($msg)
		{
			echo $msg;
		}
	?>
	<form method="post">
 

 		<?php if ($section == 'code') { ?>
 			<fieldset>
	      	 	<legend>Recuperer ton mot de passe</legend>

	       		<label for="verif_code">Ton code</label>
	       		<input type="text" name="verif_code" id="verif_code" placeholder="Code de vérification" />

	       		<input type="submit" name="verif_recup_button" value="Recuperer"/>
   			</fieldset>

 		<?php } else if ($section == 'change_mdp'){ ?>
 			<fieldset>
	       		<legend>Nouveau mot de passe</legend>

	       		<label for="change_mdp">Nouveau mot de passe</label>
	       		<input type="password" name="change_mdp" id="change_mdp" />

	       		<label for="change_mdp_con">Confirmer le nouveau mot de passe</label>
	       		<input type="password" name="change_mdp_con" id="change_mdp_con" />

		       	<input type="submit" name="change_mdp_button" value="Changer"/>
   			</fieldset>
 		<?php } else { ?>

		<fieldset>
	       	<legend>Recuperer ton mot de passe</legend>

	       	<label for="mail_recup">Ton email</label>
	       	<input type="email" name="mail_recup" id="mail_recup" />

	       	<input type="submit" name="mail_recup_button" value="Recuperer"/>
   		</fieldset>
   		<?php } ?>
	</form>
<section>