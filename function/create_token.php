<?php
	function token($lenght)
	{
		$str = "0123456789qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM";
		return substr(str_shuffle(str_repeat($str, $lenght)), 0, $lenght);
	}

?>