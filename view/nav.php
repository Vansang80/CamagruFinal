<nav>
	<ul>
		<a href=<?php check_index() ?>>
			<li id="radius-start"><i class="fas fa-home"></i></li>
		</a>
		<a href=<?php check_gallery() ?>>
			<li id="border_middle">Galeries</li>
		</a>
		<a href=<?php check_signIn() ?>>
			<li id="border_inscription">Inscription</li>
		</a>

		<?php
			if ($_SESSION["id"])
			{
				echo "
				<a href='indexView.php?page=gallery1'>
					<li id='my_profil'>Moi</li>
				</a>";

				echo "
				<a href='indexView.php?page=user_co'>
					<li id='camera_play'>Camera</li>
				</a>";
			}
		?>

		<a href=<?php
				if ($_SESSION["id"]){check_do();}
				else{check_co();}?>>
			<li id="radius-end"><?php if ($_SESSION["id"]){echo "Deconnexion";} 
									  else{echo "Connexion";}?>
			</li>
		</a>
	</ul>
</nav>


<?php
	function check_index()
	{
		if (isset($_GET['page']) == 'index' || isset($_GET['page']) == 'gallery' || isset($_GET['page']) == 'sign_in')
			echo "indexView.php?page=index";
		else
			echo "view/indexView.php?page=index";
	}

	function check_gallery()
	{
		if (isset($_GET['page']) == 'index' || isset($_GET['page']) == 'gallery' || isset($_GET['page']) == 'sign_in')
			echo "indexView.php?page=gallery";
		else
			echo "view/indexView.php?page=gallery";
	}

	function check_signIn()
	{
		if (isset($_GET['page']) == 'index' || isset($_GET['page']) == 'gallery' || isset($_GET['page']) == 'sign_in')
			echo "indexView.php?page=sign_in";
		else
			echo "view/indexView.php?page=sign_in";
	}

	function check_co()
	{
		if (isset($_GET['page']) == 'index' || isset($_GET['page']) == 'gallery' || isset($_GET['page']) == 'sign_in' || isset($_GET['page']) == 'sign_co')
			echo "indexView.php?page=sign_co";
		else
			echo "view/indexView.php?page=sign_co";
	}
	function check_do()
	{
		if (isset($_GET['page']) == 'index' || isset($_GET['page']) == 'gallery' || isset($_GET['page']) == 'sign_in' || isset($_GET['page']) == 'sign_co')
			echo "indexView.php?page=sign_do";
		else
			echo "view/indexView.php?page=sign_do";
	}
?>