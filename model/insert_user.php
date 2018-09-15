<?php
	function insert_user($pseudo, $email, $password, $token, $bdd)
	{
		$sql = $bdd->prepare("INSERT INTO menbre(pseudo, mail, motdepasse, confirmkey) VALUES(?, ?, ?, ?)");
		$sql->execute(array($pseudo, $email, $password, $token));
	}
?>