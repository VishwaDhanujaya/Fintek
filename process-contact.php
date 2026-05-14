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
        $mail->setFrom(SMTP_USERNAME, 'Fintek Inquiries');
        $mail->addAddress(RECIPIENT_EMAIL, RECIPIENT_NAME);
        $mail->addReplyTo($email, $name);

        // Attachments
        $mail->addEmbeddedImage('assets/images/fintek-logo.png', 'fintek_logo');

        // Content
        $mail->isHTML(true);
        $mail->Subject = "New Website Inquiry: $department";
        
        $emailContent = "
        <div style='font-family: Arial, sans-serif; line-height: 1.6; color: #333; max-width: 600px; margin: 0 auto; border: 1px solid #f0f0f0; border-radius: 12px; overflow: hidden;'>
            <div style='background-color: #ffffff; padding: 30px; text-align: center; border-bottom: 2px solid #f8f9fa;'>
                <img src='cid:fintek_logo' alt='Fintek Logo' style='height: 50px; width: auto;'>
            </div>
            <div style='padding: 40px; background-color: #ffffff;'>
                <h2 style='color: #0056b3; margin-top: 0; font-size: 24px;'>New Website Inquiry</h2>
                <p style='color: #666; margin-bottom: 30px;'>A new message has been submitted from the contact form on your website.</p>
                
                <table style='width: 100%; border-collapse: collapse;'>
                    <tr>
                        <td style='padding: 12px 0; border-bottom: 1px solid #f0f0f0; font-weight: bold; width: 150px;'>Sender Name:</td>
                        <td style='padding: 12px 0; border-bottom: 1px solid #f0f0f0;'>$name</td>
                    </tr>
                    <tr>
                        <td style='padding: 12px 0; border-bottom: 1px solid #f0f0f0; font-weight: bold;'>Email Address:</td>
                        <td style='padding: 12px 0; border-bottom: 1px solid #f0f0f0;'><a href='mailto:$email' style='color: #0056b3; text-decoration: none;'>$email</a></td>
                    </tr>
                    <tr>
                        <td style='padding: 12px 0; border-bottom: 1px solid #f0f0f0; font-weight: bold;'>Department:</td>
                        <td style='padding: 12px 0; border-bottom: 1px solid #f0f0f0;'>" . ucfirst($department) . "</td>
                    </tr>
                    <tr>
                        <td style='padding: 12px 0; border-bottom: 1px solid #f0f0f0; font-weight: bold;'>Product Ref:</td>
                        <td style='padding: 12px 0; border-bottom: 1px solid #f0f0f0;'>$product_ref</td>
                    </tr>
                </table>
                
                <div style='margin-top: 30px; padding: 25px; background-color: #f9f9f9; border-radius: 8px;'>
                    <p style='font-weight: bold; margin-top: 0; color: #0056b3;'>Message Contents:</p>
                    <p style='margin-bottom: 0; white-space: pre-wrap;'>$message</p>
                </div>
            </div>
            <div style='background-color: #f8f9fa; padding: 20px; text-align: center; font-size: 12px; color: #999;'>
                <p style='margin: 0;'>&copy; " . date('Y') . " Fintek Managed Solutions (Pvt) Ltd. All rights reserved.</p>
                <p style='margin: 5px 0 0;'>This is an automated notification from your website's inquiry portal.</p>
            </div>
        </div>
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
