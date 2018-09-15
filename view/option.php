<?php
	require ("../config/setup.php");

	if (isset($_POST['speudo_option_button']))
	{
		if (isset($_POST['speudo_option']) && !empty($_POST['speudo_option']) && isset($_POST['speudo_option_com']) && !empty($_POST['speudo_option_com']))
		{
			$pseudo_option = htmlspecialchars($_POST['speudo_option']);
			$pseudo_option_com = htmlspecialchars($_POST['speudo_option_com']);
			$pseudo_lenght_option = strlen($pseudo_option);

			if ($pseudo_lenght_option <= 255)
			{
				if ($pseudo_option == $pseudo_option_com)
				{
					$change_speudo = $bdd->prepare("UPDATE menbre SET pseudo = ? WHERE id = ?");
					$change_speudo->execute(array($pseudo_option, $_SESSION['id']));
					$_SESSION['pseudo'] = $pseudo_option;
					$msg = "Votre speudo a bien étè changé !";
				}
				else
					$msg = "Votre speudo ne corespondent pas !";
			}
			else
				$msg = "Votre speudo doit être inferieur à 255 caractères !";				
		}
		else
			$msg = "Tous les champs doivent être remplis";
	}

	if (isset($_POST['mail_option_button']))
	{
		if (isset($_POST['mail_option']) && !empty($_POST['mail_option']) && isset($_POST['mail_option_com']) && !empty($_POST['mail_option_com']))
		{
			$mail_option = htmlspecialchars($_POST['mail_option']);
			$mail_option_com = htmlspecialchars($_POST['mail_option_com']);

			if (filter_var($mail_option, FILTER_VALIDATE_EMAIL))
			{
				if ($mail_option == $mail_option_com)
				{
					$change_mail = $bdd->prepare("UPDATE menbre SET mail = ? WHERE id = ?");
					$change_mail->execute(array($mail_option, $_SESSION['id']));
					$_SESSION['mail'] = $mail_option;
					$msg = "Votre mail a bien étè changé !";
				}
				else
					$msg = "Vos mails ne correspond pas !";
			}
			else
				$msg = "Votre email est errone !";
		}
		else
			$msg = "Tous les champs doivent être remplis";
	}

	if (isset($_POST['password_option_button']))
	{
		if (isset($_POST['password_option']) && !empty($_POST['password_option']) && isset($_POST['password_option_com']) && !empty($_POST['password_option_com']))
		{
			$password_option = htmlspecialchars($_POST['password_option']);
			$password_option_com = htmlspecialchars($_POST['password_option_com']);

			$password_option_hash = hash("whirlpool", $password_option);
			$password_option_com_hash = hash("whirlpool", $password_option_com);

			if ($password_option_hash == $password_option_com_hash)
			{
				$change_password = $bdd->prepare("UPDATE menbre SET motdepasse = ? WHERE id = ?");
				$change_password->execute(array($password_option_hash, $_SESSION['id']));
				$msg = "Votre mot de passe a bien étè changé !";
			}
			else
				$msg = "Vos mots de passe ne correspond pas !";
		}
		else
			$msg = "Tous les champs doivent être remplis";
	}

	if ($msg)
		echo $msg;
?>

<section>
	<form method="post">
 
		<fieldset>
	       	<legend>Changer votre speudo</legend>

	       	<label for="speudo_option">Votre nouveau speudo</label>
	       	<input type="text" name="speudo_option" id="speudo_option" />

	       	<label for="speudo_option_com">Retaper votre nouveau speudo</label>
	       	<input type="text" name="speudo_option_com" id="speudo_option_com" />

	       	<input type="submit" name="speudo_option_button" value="Changer"/>
   		</fieldset>
	</form>

	<form method="post">
 
		<fieldset>
	       	<legend>Changer votre mail</legend>

	       	<label for="mail_option">Votre nouveau mail</label>
	       	<input type="email" name="mail_option" id="mail_option" />

	       	<label for="mail_option_com">Retaper votre nouveau mail</label>
	       	<input type="email" name="mail_option_com" id="mail_option_com" />

	       	<input type="submit" name="mail_option_button" value="Changer"/>
   		</fieldset>
	</form>

	<form method="post">
 
		<fieldset>
	       	<legend>Changer votre mot de passe</legend>

	       	<label for="password_option">Votre nouveau mot de passe</label>
	       	<input type="password" name="password_option" id="password_option" />

	       	<label for="password_option_com">Retaper votre nouveau mot de passe</label>
	       	<input type="password" name="password_option_com" id="password_option_com" />

	       	<input type="submit" name="password_option_button" value="Changer"/>
   		</fieldset>
	</form>
 
</section>