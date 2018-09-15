<?php
require ("../config/setup.php");

	if (isset($_FILES['picture_perso']) && !empty($_FILES['picture_perso']['name']))
	{
		if (exif_imagetype($_FILES['picture_perso']['tmp_name']) == 2)
		{
			$upload_dir = "images/";
			$file = $upload_dir . mktime() . ".jpg";
			move_uploaded_file($_FILES['picture_perso']['tmp_name'], $file);
			
			var_dump($file);

			$source = imagecreatefrompng("../webroot/img/camera_filter2/" . $_POST['filter'] . ".png");
			$destination = imagecreatefromjpeg($file);

			var_dump($source);
			
			$largeur_source = imagesx($source);
			$hauteur_source = imagesy($source);

			imagecopy($destination, $source, 0, 0, 0, 0, $largeur_source, $hauteur_source);
			imagejpeg($destination, "image/popop" . mktime() .".jpeg");
			$rename = "image/popop" . mktime() .".jpeg";

			$sql = $bdd->prepare("INSERT INTO pictures(usersid, picturesnames) VALUES(?, ?)");
			$sql->execute(array($_SESSION["id"], $rename));

			$msg = "Votre photo a bien ete uploader !";
		}
		else
		{
			$msg = "Votre photo doit être au format jpg !";
		}
	}
?>

<section>
	<div id="mini_picture">
		<div id="0" class="0 camera_js camera_left_sous camera_left_sous1">1</div>
		<div id="1" class="1 camera_js camera_left_sous camera_left_sous2">2</div>
		<div id="2" class="2 camera_js camera_left_sous camera_left_sous3">3</div>
		<div id="3" class="3 camera_js camera_left_sous camera_left_sous4">4</div>
		<div style="color: white;"id="4" class="4 camera_js camera_left_sous camera_left_sous5">5</div>
		<div id="5" class="5 camera_js camera_right_sous camera_right_sous6">6</div>
		<div id="6" class="6 camera_js camera_right_sous camera_right_sous7">7</div>
		<div id="7" class="7 camera_js camera_right_sous camera_right_sous8">8</div>
		<div id="8" class="8 camera_js camera_right_sous camera_right_sous9">9</div>
		<div id="9" class="9 camera_js camera_right_sous camera_right_sous10">10</div>
	</div>
	<form method="post" enctype="multipart/form-data">
		<label for="file">Sélectionne ton fichier à envoyer au format jpg :</label><br />
		<input type="file" id="file" name="picture_perso" checked="checked" />
		<input type="hidden" name="MAX_FILE_SIZE" value="1048576" />
		<select name="filter" id="filter_mini">
		   <option value="0">1</option>
           <option value="1">2</option>
           <option value="2">3</option>
           <option value="3">4</option>
           <option value="4">5</option>
           <option value="5">6</option>
           <option value="6">7</option>
           <option value="7">8</option>
           <option value="8">9</option>
           <option value="9">10</option>
       </select>
		<input type="submit" value="Envoyer" />
	</form>
</section>
<?php
	if ($msg)
	{
		echo $msg;
	}
?>