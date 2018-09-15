<?php
	require ("../config/setup.php");
	session_id($_COOKIE["ssid"]);
    session_start();


		$upload_dir = "images/";
		$img = $_POST['hidden_data'];
		$img1 = $_POST['hidden_data1'];

		$img = str_replace('data:image/png;base64,', '', $img);
		$img = str_replace(' ', '+', $img);
		$data = base64_decode($img);
		$file = $upload_dir . mktime() . ".png";
		$success = file_put_contents($file, $data);


		$source = imagecreatefrompng("../webroot/img/camera_filter2/" . $img1 . ".png");
		$destination = imagecreatefrompng($file);

		$largeur_source = imagesx($source);
		$hauteur_source = imagesy($source);

		imagecopy($destination, $source, 0, 0, 0, 0, $largeur_source, $hauteur_source);
		imagepng($destination, "image/popop" . mktime() .".jpeg");
		$rename = "image/popop" . mktime() .".jpeg";

		$sql = $bdd->prepare("INSERT INTO pictures(usersid, picturesnames) VALUES(?, ?)");
		$sql->execute(array($_SESSION["id"], $rename));
?>