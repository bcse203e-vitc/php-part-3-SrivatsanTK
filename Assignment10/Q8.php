<?php
$src = imagecreatefromjpeg("image.jpg");

$width = imagesx($src);
$height = imagesy($src);

$maxWidth = 200;
$maxHeight = 150;

$ratio = min($maxWidth / $width, $maxHeight / $height);
$newWidth = (int)($width * $ratio);
$newHeight = (int)($height * $ratio);

$new = imagecreatetruecolor($newWidth, $newHeight);

imagecopyresampled($new, $src, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

header("Content-Type: image/jpeg");
imagejpeg($new);

imagedestroy($src);
imagedestroy($new);
?>
