<?php
$width = 400;
$height = 60;

$img = imagecreatetruecolor($width, $height);

$bg = imagecolorallocate($img, 240, 240, 240);
imagefill($img, 0, 0, $bg);


$black = imagecolorallocate($img, 0, 0, 0);


$text = "Generated on " . date("H:i:s");

$font = __DIR__ . "/arial.ttf"; 
$fontSize = 20; 
$angle = 0; 
$x = 10; 
$y = 40; 
imagettftext($img, $fontSize, $angle, $x, $y, $black, $font, $text);

header("Content-Type: image/png");
imagepng($img);

imagedestroy($img);
?>
