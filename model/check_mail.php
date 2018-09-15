<?php
	$sql = $bdd->prepare("SELECT * FROM menbre WHERE mail = ?");
	$sql->execute(array($email));
?>