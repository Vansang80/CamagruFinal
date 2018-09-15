<?php
session_start();
?>
<?php 
	ob_start(); 

	require ("header.php");

	$header = ob_get_clean(); 
?>

<?php 
	ob_start();
	
		require ("nav.php");

	$nav = ob_get_clean();
 ?>

<?php 
	ob_start();

	if ($_GET['page'] == 'gallery')
		require ("gallery.php");
	else if ($_GET['page'] == 'gallery1')
		require ("gallery_profil.php");
	else if ($_GET['page'] == 'sign_in')
		require ("form.php");
	else if ($_GET['page'] == 'sign_co')
		require ("sign_co.php");
	else if ($_GET['page'] == 'user_co')
		require ("camera_filter.php");
	else if ($_GET['page'] == 'sign_do')
		require ("deconnexion.php");
	else if ($_GET['page'] == 'miniature')
		require ("miniature.php");
	else if ($_GET['page'] == 'option')
		require ("option.php");
	else if ($_GET['page'] == 'password_recup')
		require ("password_recup.php");
	else if ($_GET['page'] == 'commentaire')
		require ("commentaires.php");
	else if ($_GET['page'] == 'sign_confirm')
		require ("../model/activation_user_token.php");
	else
		require ("section.php");

	$section = ob_get_clean();
?>

<?php 
	ob_start();

	require ("footer.php");
	
	$footer = ob_get_clean();
?>

<?php require ("template.php"); ?>