<?php
	$sql = $bdd->prepare("SELECT * FROM menbre WHERE mail = ? AND motdepasse = ?");
	$sql->execute(array($email_co, $password_co));
	$user = $sql->fetch();
?>