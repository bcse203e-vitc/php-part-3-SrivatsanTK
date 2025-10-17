<?php
session_start();

$name = $_SESSION['user'] ?? "Guest";

if($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['feedback'])){
    $feedback = htmlspecialchars($_POST['feedback']);
    $to = "admin@vit.ac.in";
    $subject = "Student Feedback";
    $message = "Feedback from $name:\n\n$feedback";
    $headers = "From: noreply@vit.ac.in\r\n";
    $headers .= "Reply-To: noreply@vit.ac.in\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    if(mail($to, $subject, $message, $headers)){
        echo "Thank you, $name. Feedback sent!";
    } else {
        echo "Failed to send feedback. Please try again.";
    }
}
?>

<form method="post">
    <textarea name="feedback" placeholder="Enter your feedback" required></textarea><br>
    <button type="submit">Submit Feedback</button>
</form>
