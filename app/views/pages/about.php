<!-- <?php require APPROOT . '/views/inc/header.php'; ?>
<h1>About</h1>
<p>This is a social network type app built on the TraversyMVC framework</p>
<p>App Version: <?php echo $data['version']; ?></p>
<?php require APPROOT . '/views/inc/footer.php'; ?> -->

<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require APPROOT . '/views/PHPMailer/src/Exception.php';
require APPROOT . '/views/PHPMailer/src/PHPMailer.php';
require APPROOT . '/views/PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);

try {
    $mail->SMTPDebug = 2;
    $mail->SMTPSecure = 'tls';
    $mail->isSMTP();
    $mail->Host = 'sandbox.smtp.mailtrap.io';
    $mail->SMTPAuth = true;
    $mail->Port = 2525;
    $mail->Username = 'f91ace13a40c93';
    $mail->Password = 'f238c3ca91a9a2';


    $mail->setFrom('coding@stanvic.com.ng', 'Stanvic Coding Academy');
    $mail->addAddress('nnelivictor1@gmail.com');
    //$mail->addAddress('receiver2@gfg.com', 'Name');

    $mail->isHTML(true);
    $mail->Subject = 'Html inline Style Testing';
    $mail->Body =
        "<div style='background-color:antiquewhite;padding-bottom:20px;'>
            <h1 style='text-align:center;color:green;padding: 10px;background-color:black;border-radius:16px;'>Registeration is successfull</h1>
            <p style='text-align:center;font-size:21px;'>You have successfully registered with <strong>Stanvic Coding Academy</strong>.</p>
            <p style='text-align:center;'><a style='text-align:center;text-decoration:none;padding: 7px 9px;;background-color:green;color:black;border-radius:10px;' href='stanvic.com.ng'>Click here to login</a></p>
            
            </div>";
    //$mail->AltBody = 'Body in plain text for non-HTML mail clients';
    $mail->send();
    echo "Mail has been sent successfully!";
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
