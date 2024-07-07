<?php
// SMTP server settings for Gmail
$smtp_server = 'smtp.gmail.com';
$smtp_port = 587; // TLS
// $smtp_username = 'your_email@gmail.com'; // Your Gmail email address
// $smtp_password = 'your_password'; // Your Gmail password

// Sender and recipient
$from_email = 'theneerajjha@gmail.com'; // Sender's email address
$from_name = 'Neeraj Jha'; // Sender's name
$to_email = 'theneerajjha@gmail.com'; // Recipient's email address
$to_name = 'Neeraj Jha'; // Recipient's name

// Email content
$subject = 'Test Email';
$message = '<p>This is a test email sent via Gmail SMTP.</p>';

// Email headers
$headers = "From: $from_name <$from_email>\r\n";
$headers .= "Reply-To: $from_name <$from_email>\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

// SMTP settings
ini_set('SMTP', $smtp_server);
ini_set('smtp_port', $smtp_port);
ini_set('sendmail_from', $from_email);

// Send the email
$result = mail($to_email, $subject, $message, $headers);

if ($result) {
    echo 'Message has been sent.';
} else {
    echo 'Message could not be sent.';
}
?>
