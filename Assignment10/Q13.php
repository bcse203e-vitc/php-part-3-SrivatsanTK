<?php
session_start();

if(isset($_POST['name']) && !empty($_POST['name'])){
    $_SESSION['name'] = htmlspecialchars($_POST['name']);
}

if(!isset($_SESSION['name'])){
    $_SESSION['name'] = "Student";
}

$name = $_SESSION['name'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Personalized Greeting</title>
</head>
<body>
    <h2>Hello, <?php echo $name; ?>! Welcome to the PHP lab.</h2>

    <form method="post">
        <label for="name">Enter your name: </label>
        <input type="text" id="name" name="name" placeholder="Your name">
        <button type="submit">Update Name</button>
    </form>
</body>
</html>
