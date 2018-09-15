<?php
	require ("../config/setup.php");
	require ("../model/insert_user.php");
	require ("../function/create_token.php");
	if (isset($_POST['form_click']))
	{
		if (!empty($_POST['pseudo']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['password_confirm']))
		{
			$pseudo = htmlspecialchars($_POST['pseudo']);
			$email = htmlspecialchars($_POST['email']);
			$password = hash("whirlpool", $_POST['password']);
			$password_confirm = hash("whirlpool", $_POST['password_confirm']);
			$pseudo_lenght = strlen($_POST['pseudo']);
			
			if ($pseudo_lenght <= 255)
			{
				if (filter_var($email, FILTER_VALIDATE_EMAIL))
				{
					require ("../model/check_mail.php");
					$mail_exist = $sql->rowCount();

					if (!$mail_exist == 1)
					{
						if ($password == $password_confirm)
						{
							
							$token = token(60);
							insert_user($pseudo, $email, $password, $token, $bdd);
							
							
							require ("../function/phpmailer.php");

							$confirm = "Votre compte est cree, veuillez confirmer le lien envoyer dans votre boite mail!";
						}
						else
							$erreurs = "Vos mots de passe ne correspond pas !";
					}
					else
						$erreurs = "Email deja utilise !";
				}
				else
					$erreurs = "Votre email est errone !";
			}
			else
				$erreurs = "Le speudo doit être inferieur a 255 caracteres !";
		}
		else
			$erreurs = "Tous les champs doivent être remplis !";
	}
?>

<section>
	<div id="form">
		<form method="POST" action="">
			<h2 class="header_form">Rejoins-nous !</h2>
			<label for="pseudo">Pseudo :</label><br />
			<input type="text" name="pseudo" id="pseudo" /><br />
			<label for="email">Votre adresse email :</label><br />
			<input type="email" name="email" id="email" />
			<label for="password">Mot de passe :</label><br />
			<input type="password" name="password" id="password" /><br />
			<label for="password_confirm">Retaper votre mot de passe :</label><br />
			<input type="password" name="password_confirm" id="password_confirm" /><br />
			<div class="footer_form">
				<input type="submit" name="form_click" value="C'est parti !">
			</div>
			<div class="erreurs">
				<?php if (isset($erreurs))
					  {
					  	echo $erreurs;
					  } 
					  else if (isset($confirm))
					  	echo $confirm;
					  ?>
			</div>
		</form>
	</div>
</section>