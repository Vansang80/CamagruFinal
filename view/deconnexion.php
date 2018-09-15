<?php
session_unset();
session_destroy();
?>

<section>
	<div id="deconnexion">Reviens vite!</div>
</section>

<?php

 header("Location: indexView.php?page=sign_co");
?>