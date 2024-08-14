<?php

// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;

// require APPROOT . '/views/PHPMailer/src/Exception.php';
// require APPROOT . '/views/PHPMailer/src/PHPMailer.php';
// require APPROOT . '/views/PHPMailer/src/SMTP.php';

// function sendMail()
// {
//     $mail = new PHPMailer(true);

//     try {
//         $mail->SMTPDebug = 2;
//         $mail->SMTPSecure = 'tls';
//         $mail->isSMTP();
//         $mail->Host = 'sandbox.smtp.mailtrap.io';
//         $mail->SMTPAuth = true;
//         $mail->Port = 2525;
//         $mail->Username = 'f91ace13a40c93';
//         $mail->Password = 'f238c3ca91a9a2';


//         $mail->setFrom('coding@stanvic.com.ng', 'Stanvic Coding Academy');
//         $mail->addAddress('nnelivictor1@gmail.com');
//         //$mail->addAddress('receiver2@gfg.com', 'Name');

//         $mail->isHTML(true);
//         $mail->Subject = 'Testing out on mailtrap';
//         $mail->Body =
//             "<table style='text-align:center;width:100%'>
//             <h1>Registeration is successfull</h1>
//             <p>You have successfully registered.</p>
//             <a href='stanvic.com.ng'>click here to login</a>
            
//             </table>";
//         //$mail->AltBody = 'Body in plain text for non-HTML mail clients';
//         $mail->send();
//         echo "Mail has been sent successfully!";
//     } catch (Exception $e) {
//         echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
//     }
// }
