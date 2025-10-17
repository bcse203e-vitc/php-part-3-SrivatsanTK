<?php
session_start();

// ✅ Generate CAPTCHA image only when ?captcha exists
if (isset($_GET['captcha'])) {
    $captcha = rand(1000, 9999);
    $_SESSION['captcha'] = $captcha;

    // GD Library Image
    $image = imagecreate(100, 40);
    $bg = imagecolorallocate($image, 200, 200, 200);
    $textcolor = imagecolorallocate($image, 0, 0, 0);
    imagestring($image, 5, 25, 10, $captcha, $textcolor);

    // ✅ Must send header BEFORE output
    header("Content-Type: image/png");
    imagepng($image);
    imagedestroy($image);
    exit();
}

// ✅ CAPTCHA verification
$message = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['captcha'] == $_SESSION['captcha']) {
        $message = "<p style='color:green'>✅ CAPTCHA Verified Successfully!</p>";
    } else {
        $message = "<p style='color:red'>❌ Incorrect CAPTCHA. Try again.</p>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>CAPTCHA Demo</title>
</head>
<body>
    <h2>Enter CAPTCHA</h2>
    <?= $message ?>
    <form method="POST">
        <img src="captcha.php?captcha=1" alt="CAPTCHA Image"><br><br>
        <input type="text" name="captcha" placeholder="Enter CAPTCHA" required><br><br>
        <button type="submit">Verify</button>
    </form>
</body>
</html>
