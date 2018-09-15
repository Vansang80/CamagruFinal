<header>
		<div id="logo_title">
			<img id="img_logo" src=<?php check_header();?> alt="logo_photo"/>
			<h1>Camagru</h1>
		</div>
</header>

<?php
	function check_header()
		{
			if (isset($_GET['page']) == 'index' || isset($_GET['page']) == 'gallery' || isset($_GET['page']) == 'sign_in')
				echo "../webroot/img/logo_photos.png";
			else
				echo "webroot/img/logo_photos.png";
		}
?>