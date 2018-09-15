<?php
	require ("../config/setup.php");
?>

<section>
	<div id="sign_in">
		<div id="camera">
			<div id="camera_left">
				<div id="1" class="0 camera_js camera_left_sous camera_left_sous1"></div>
				<div id="2" class="1 camera_js camera_left_sous camera_left_sous2"></div>
				<div id="3" class="2 camera_js camera_left_sous camera_left_sous3"></div>
				<div id="4" class="3 camera_js camera_left_sous camera_left_sous4"></div>
				<div id="5" class="4 camera_js camera_left_sous camera_left_sous5"></div>
			</div>
			<div id="camera_middle">
				<img src="" id="filter_img" />
				<video id="video"></video>
				<button id="startbutton">Prendre une photo</button>
				<canvas id="canvas"></canvas>
				<p id="bon"><a href="indexView.php?page=miniature">Si veux insérer ta propre photo clique ici -></a></p>
			</div>
			<div id="camera_right">
				<div id="6" class="5 camera_js camera_right_sous camera_right_sous6"></div>
				<div id="7" class="6 camera_js camera_right_sous camera_right_sous7"></div>
				<div id="8" class="7 camera_js camera_right_sous camera_right_sous8"></div>
				<div id="9" class="8 camera_js camera_right_sous camera_right_sous9"></div>
				<div id="a" class="9 camera_js camera_right_sous camera_right_sous10"></div>
			</div>
		</div>


		<div id="capture">
			<img src="../webroot/css/1.png" id="photo" alt="photo">
		</div>
		<form method="post" accept-charset="utf-8" name="form1">
            <input name="hidden_data" id='hidden_data' type="hidden"/>
        
            <input name="hidden_data1" id='hidden_data1' type="hidden"/>
        </form>
	</div>
</section>
