<?php
	require ("../config/setup.php");
	$count = $bdd->query("SELECT COUNT(*) as nb_pictures FROM pictures");
?>

<section>
	<div id="gallery">
		<div class="box_gallery">
			<?php
				$count_fetch = $count->fetch();
				$nb_picture = intval($count_fetch['nb_pictures']);
				$picture_page = 5;
				$nb_page = intval(ceil($nb_picture / $picture_page));

				if (isset($_GET['nb_page']) && $_GET['nb_page'] > 0 && $_GET['nb_page'] <= $nb_page )
				{
					$current_page = $_GET['nb_page'];
				}
				else
				{
					$current_page = 1;
				}

				$images = $bdd->query("SELECT * FROM pictures ORDER BY pictures_id DESC LIMIT " . (($current_page - 1) * $picture_page). ", $picture_page");

				if (isset($_GET['like']) && !empty($_GET['like']) && isset($_GET['pictures_id']) && !empty($_GET['pictures_id']))
					{
						$secure_picture_id = htmlspecialchars($_GET['pictures_id']);
						$secure_like = htmlspecialchars($_GET['like']);

						
							$check_like = $bdd->prepare("SELECT * FROM likes WHERE id_picture = ? AND id_menber = ?");
							$check_like->execute(array($secure_picture_id, $_SESSION['id']));

														
							if ($check_like->rowCount() == 1)
							{
								$likes_del = $bdd->prepare("DELETE FROM likes WHERE id_picture = ? AND id_menber = ?");
								$likes_del->execute(array($secure_picture_id, $_SESSION['id']));
							}
							else
							{
								$likes = $bdd->prepare("INSERT INTO likes (id_picture, id_menber) VALUES (?, ?)");
								$likes->execute(array($secure_picture_id, $_SESSION['id']));
							}
						
					}


				while ($donnees = $images->fetch())
				{
					$nb_likes = $bdd->prepare("SELECT * FROM likes WHERE id_picture = ?");
					$nb_likes->execute(array($donnees['pictures_id']));

					$nb_likes = $nb_likes->rowCount();

					echo "<div id=sous_gallery>
							<div id='zoom_picture'>
								<a href='indexView.php?page=commentaire&pictures_id={$donnees['pictures_id']}&users={$_SESSION['id']}'><img class='galery_picture' src='{$donnees['picturesnames']}' /></a>
							</div>";
					if ($_SESSION['id'])
					{	
						echo "
							<div id='com_like'>
								<div class='size_awesome'><a href='indexView.php?page=commentaire&pictures_id={$donnees['pictures_id']}'><i class='fas fa-comments'></i></a></div>
								<div class='size_awesome'><a href='indexView.php?like=1&page=gallery&pictures_id={$donnees['pictures_id']}&nb_page={$_GET['nb_page']}'><i class='fas fa-thumbs-up'></i>(" . $nb_likes . ")</a></div>
							</div>";
					}
					echo "</div>";
				}
			?>
		</div>
		<div id="pagination">
			<?php
				

				for ($i = 1; $i <= $nb_page; $i++)
				{
					if ($i == $current_page)
					{
						echo "<span id='sous_pagination_current'>" . $i . "</span> ";
					}
					else
					{
						echo "<a id='sous_pagination'href='indexView.php?page=gallery&nb_page=$i'>" . $i . "</a> ";
					}
				}
			?>
		</div>
	</div>
</section>