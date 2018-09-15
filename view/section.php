<section>
	<div id="main_section">
		<p>Viens prendre<br /> tes photos !</p>
		<img id="logo_troll" src=<?php check_section_main() ?> alt="rick and morty" />
	</div>
</section>

<?php

function check_section_main()
{
	if (isset($_GET['page']) == 'index' || isset($_GET['page']) == 'gallery' || isset($_GET['page']) == 'sign_in')
		echo "../webroot/img/logo_troll.png";
	else
		echo "webroot/img/logo_troll.png";
}