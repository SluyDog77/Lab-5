<?php 
	session_start(); 
	$text = rand(10000,99999); 
	$_SESSION["vercode"] = $text; 
	$height = 25; 
	$width = 65; 
	   
	$image_p = imagecreatetruecolor($width, $height); 
	$black = imagecolorallocate($image_p, 0, 0, 0); 
	$white = imagecolorallocate($image_p, 255, 255, 255); 
	$font_size = 14; 
	
	imagefill($image_p, 0, 0, $black);
	imagestring($image_p, $font_size, 5, 5, $text, $white); 
	imagejpeg($image_p, null, 80); 
?>