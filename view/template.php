<?php
session_start();
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Camagru</title>
		<meta charset="utf-8" />
		<link rel="stylesheet" href=<?php check_style()?> />
		<link href="https://fonts.googleapis.com/css?family=Lobster+Two" rel="stylesheet" />
		<link href=<?php check_fontAwesome() ?> rel="stylesheet" />
		<link href="https://fonts.googleapis.com/css?family=PT+Sans" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Rokkitt" rel="stylesheet">
	</head>
	<body>
		<?= $header ?>
		
		<?= $nav ?>
		
		<?= $section ?>
		
		<?= $footer ?>
		<script src="../webroot/js/filtre.js"></script>
		<?php
			if ($_GET["page"] == "user_co")
			{ 
				echo '<script src="../webroot/js/camera.js"></script>';
			}
		?>
	</body>
</html>

<?php
	function check_style()
	{
		if ($_GET['page'] == 'index' || $_GET['page'] == 'gallery' || $_GET['page'] == 'gallery1'|| $_GET['page'] == 'sign_in' || $_GET['page'] == 'sign_co' || $_GET['page'] == 'user_co' || $_GET['page'] == 'sign_confirm' || $_GET['page'] == "sign_do" || $_GET['page'] == 'commentaire' || $_GET['page'] == "miniature" || $_GET['page'] == "option" || $_GET['page'] == "password_recup")
			echo "../webroot/css/style.css";
		else
			echo "webroot/css/style.css";
	}

	function check_fontAwesome()
	{
		if ($_GET['page'] == 'index' || $_GET['page'] == 'gallery'|| $_GET['page'] == 'gallery1' || $_GET['page'] == 'sign_in' || $_GET['page'] == 'sign_co' || $_GET['page'] == 'user_co' || $_GET['page'] == 'sign_confirm' || $_GET['page'] == "sign_do" || $_GET['page'] == 'commentaire' || $_GET['page'] == "miniature" || $_GET['page'] == "option" || $_GET['page'] == "password_recup")
			echo "../webroot/icone/fontawesome-free-5.0.13/web-fonts-with-css/css/fontawesome-all.css";
		else
			echo "webroot/icone/fontawesome-free-5.0.13/web-fonts-with-css/css/fontawesome-all.css";
	}
?>