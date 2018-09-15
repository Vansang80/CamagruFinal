<?php
	require ("../config/setup.php");
	if (isset($_POST['form_co']))
	{
		if (!empty($_POST['email_co']) && !empty($_POST['password_co']))
		{
			$email_co = htmlspecialchars($_POST['email_co']);
			$password_co = hash("whirlpool", $_POST['password_co']);
			require ("../model/check_connection.php");
			$user_exist = $sql->rowcount();
			if ($user_exist == 1 && $user['confirm'] == 1)
			{
				$confirm = "Vous etes connectes";
				$_SESSION['id'] = intval($user['id']);
				$_SESSION['pseudo'] = $user['pseudo'];
				$_SESSION['mail'] = $user['mail'];
				setcookie("ssid", session_id());
				header("Location: indexView.php?page=user_co");
			}
			else
				$erreurs = "Mauvais email ou mot de passe";
		}
		else
			$erreurs = "Tous les champs doivent être remplis !";
	}
?>


<section>
	<div id="form">
		<form method="POST" action="">
			<h2 class="header_form">Connecte-toi !</h2>
			<label for="email_co">Votre adresse email :</label><br />
			<input type="email" name="email_co" id="email_co" />
			<label for="password_co">Mot de passe :</label><br />
			<input type="password" name="password_co" id="password_co" /><br />
			<div class="footer_form">
				<input style="margin-bottom: 10px;" type="submit" name="form_co" value="Je suis de retour !">
				<a style="color: white; font-size: 20px;" href="indexView.php?page=password_recup">Si tu as perdu ton mot de passe -><a/>
			</div>
			<div class="erreurs">
				<?php if (isset($erreurs))
					  	echo $erreurs;
					  else if (isset($confirm))
					  	echo $confirm;
				?>
			</div>
		</form>
	</div>
</section>