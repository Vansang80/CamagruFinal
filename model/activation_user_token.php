<?php
	require ("../config/setup.php");
	if (isset($_GET['pseudo']) && isset($_GET['key']))
	{
		$pseudo = htmlspecialchars(urldecode($_GET['pseudo']));
		$key = htmlspecialchars(urldecode($_GET['key']));

		$sql = $bdd->prepare("SELECT * FROM menbre WHERE pseudo = ? AND confirmkey = ?");
		$sql->execute(array($pseudo, $key));
		$user_count = $sql->rowCount();
		if ($user_count == 1)
		{
			$user = $sql->fetch();
			if ($user['confirm'] == 0)
		 	{
				$user_update = $bdd->prepare("UPDATE menbre SET confirm = 1 WHERE pseudo = ? AND confirmkey = ?");
				$user_update->execute(array($pseudo, $key));
		 		echo "Votre compte a bien ete comfirme, vous allez etre redirige sur la page de connexion dans quelque instant.";
		 		header("Refresh:5; url=indexView.php?page=sign_co");
		 	}
		 	else
		 	{
		 		echo "Votre compte a deja ete cree, vous allez etre redirige sur la page de connexion dans quelque instant!";
		 		header("Refresh:5; url=indexView.php?page=sign_co");
		 	}
		 }
		 else
		 	echo "Le speudo ou la cle n'existent pas !";
	}
?>