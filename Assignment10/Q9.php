<?php
// Create a true color image
$img = imagecreatetruecolor(250, 250);

// Fill background with white
$bg = imagecolorallocate($img, 255, 255, 255);
imagefill($img, 0, 0, $bg);

// Draw 10 random colored ellipses
for ($i = 0; $i < 10; $i++) {
    // Generate a random color
    $color = imagecolorallocate($img, rand(0, 255), rand(0, 255), rand(0, 255));
    
    // Random position and size
    $x = rand(25, 225);
    $y = rand(25, 225);
    $width = rand(20, 100);
    $height = rand(20, 100);

    // Draw a filled ellipse
    imagefilledellipse($img, $x, $y, $width, $height, $color);
}

// Output the image
header("Content-Type: image/png");
imagepng($img);

// Free memory
imagedestroy($img);
?>
