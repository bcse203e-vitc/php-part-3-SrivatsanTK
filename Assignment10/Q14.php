<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $to = "example@domain.com";
    $subject = "Contact Form Message";

    $name = htmlspecialchars($_POST['name']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $message = htmlspecialchars($_POST['message']);

    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    if(mail($to, $subject, $message, $headers)){
        echo "Mail Sent Successfully!";
    } else {
        echo "Mail Sending Failed!";
    }
}
?>

<form method="post">
    Name: <input type="text" name="name" required><br>
    Email: <input type="email" name="email" required><br>
    Message: <textarea name="message" required></textarea><br>
    <button type="submit">Send</button>
</form>
