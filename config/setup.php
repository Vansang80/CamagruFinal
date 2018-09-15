<?php
	require("database.php");
	
	try
	{
		$bdd1 = new PDO("mysql:host=$DB_DSN", $DB_USER, $DB_PASSWORD);
		$bdd1->setAttribute(PDO::ERRMODE_EXCEPTION);
		$bdd1->query("CREATE DATABASE IF NOT EXISTS espace_menbre");
		
	}
	catch(PDOException $e)
	{
		echo "ERROR" . $e->getMessage();
	}

	try
	{
		$bdd2 = new PDO("mysql:host=$DB_DSN; dbname=espace_menbre", $DB_USER, $DB_PASSWORD);
		$bdd2->setAttribute(PDO::ERRMODE_EXCEPTION);
		$bdd2->query("CREATE TABLE IF NOT EXISTS menbre (
						  id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
						  pseudo VARCHAR(255) NOT NULL,
						  mail VARCHAR(255) NOT NULL,
						  motdepasse VARCHAR(255) NOT NULL,
						  confirmkey VARCHAR(60) NOT NULL,
						  confirm INT(1) NOT NULL DEFAULT 0)"
						);

		$bdd2->query("CREATE TABLE IF NOT EXISTS commentaires (
						  id_commentaire INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
						  pseudo VARCHAR(255) NOT NULL,
						  commentaire TEXT NOT NULL,
						  id_picture INT(11) NOT NULL)"
						);

		$bdd2->query("CREATE TABLE IF NOT EXISTS likes (
						  id_likes INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
						  id_picture INT(11) NOT NULL,
						  id_menber INT(11) NOT NULL)"
						);

		$bdd2->query("CREATE TABLE IF NOT EXISTS pictures (
						  pictures_id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
						  usersid INT(11) NOT NULL,
						  picturesnames VARCHAR(255) NOT NULL)"
						);

		$bdd2->query("CREATE TABLE IF NOT EXISTS recuperation (
						  id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
						  mail VARCHAR(255) NOT NULL,
						  code INT(11) NOT NULL)"
						);
	}
	catch(PDOException $e)
	{
		echo "ERROR" . $e->getMessage();
	}


try
	{
		$bdd = new PDO("mysql:host=$DB_DSN;dbname=espace_menbre", $DB_USER, $DB_PASSWORD);
		$bdd->setAttribute(PDO::ERRMODE_EXCEPTION);
	}
	catch(PDOException $e)
	{
		echo "ERROR" . $e->getMessage();
	}

?>