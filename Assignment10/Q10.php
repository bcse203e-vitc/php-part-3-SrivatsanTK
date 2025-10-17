<?php
$to = "receiver@example.com";
$subject = "Test Email with Attachment";
$message = "This is a test email from PHP with an attachment.";
$from = "admin@example.com";
$file = "sample.pdf"; 

$content = chunk_split(base64_encode(file_get_contents($file)));
$filename = basename($file);

$separator = md5(time());

$headers  = "From: ".$from."\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: multipart/mixed; boundary=\"".$separator."\"\r\n\r\n";

$body = "--".$separator."\r\n";
$body .= "Content-Type: text/plain; charset=\"UTF-8\"\r\n";
$body .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
$body .= $message."\r\n\r\n";

$body .= "--".$separator."\r\n";
$body .= "Content-Type: application/octet-stream; name=\"".$filename."\"\r\n";
$body .= "Content-Transfer-Encoding: base64\r\n";
$body .= "Content-Disposition: attachment; filename=\"".$filename."\"\r\n\r\n";
$body .= $content."\r\n\r\n";
$body .= "--".$separator."--";

if(mail($to, $subject, $body, $headers)){
    echo "Mail sent successfully.";
} else {
    echo "Mail failed.";
}
?>
