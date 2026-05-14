<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and collect input data
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $department = filter_var($_POST['department'], FILTER_SANITIZE_STRING);
    $product_ref = isset($_POST['product_ref']) ? filter_var($_POST['product_ref'], FILTER_SANITIZE_STRING) : 'N/A';
    $message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);

    // Basic validation
    if (empty($name) || empty($email) || empty($message)) {
        header("Location: contact.php?status=error&message=Missing required fields");
        exit;
    }

    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host       = SMTP_HOST;
        $mail->SMTPAuth   = true;
        $mail->Username   = SMTP_USERNAME;
        $mail->Password   = SMTP_PASSWORD;
        $mail->SMTPSecure = SMTP_ENCRYPTION;
        $mail->Port       = SMTP_PORT;

        // Recipients
        $mail->setFrom(SMTP_USERNAME, 'Fintek Website Form');
        $mail->addAddress(RECIPIENT_EMAIL, RECIPIENT_NAME);
        $mail->addReplyTo($email, $name);

        // Content
        $mail->isHTML(true);
        $mail->Subject = "New Inquiry: $department - From $name";
        
        $emailContent = "
            <h2>New Website Inquiry</h2>
            <p><strong>Name:</strong> $name</p>
            <p><strong>Email:</strong> $email</p>
            <p><strong>Department:</strong> " . ucfirst($department) . "</p>
            <p><strong>Product Reference:</strong> $product_ref</p>
            <p><strong>Message:</strong><br>" . nl2br($message) . "</p>
            <hr>
            <p>This email was sent from the Fintek website contact form.</p>
        ";

        $mail->Body    = $emailContent;
        $mail->AltBody = strip_tags(str_replace('<br>', "\n", $emailContent));

        $mail->send();
        header("Location: contact.php?status=success");
        exit;
    } catch (Exception $e) {
        header("Location: contact.php?status=error&message=" . urlencode("Mailer Error: {$mail->ErrorInfo}"));
        exit;
    }
} else {
    header("Location: contact.php");
    exit;
}
?>
