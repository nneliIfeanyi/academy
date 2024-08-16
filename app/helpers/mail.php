<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require APPROOT . '/views/PHPMailer/src/Exception.php';
require APPROOT . '/views/PHPMailer/src/PHPMailer.php';
require APPROOT . '/views/PHPMailer/src/SMTP.php';

function sendMail($reciever, $course)
{
    $mail = new PHPMailer(true);
    $mail->SMTPDebug = 2;
    $mail->SMTPSecure = 'tls';
    $mail->isSMTP();
    $mail->Host = 'live.smtp.mailtrap.io';
    $mail->SMTPAuth = true;
    $mail->Port = 587;
    $mail->Username = 'api';
    $mail->Password = '0dcbca9704cf4ae1be561df980807ca3';


    $mail->setFrom('coding@stanvic.com.ng', 'Stanvic Coding Academy');
    $mail->addAddress($reciever);
    //$mail->addAddress('receiver2@gfg.com', 'Name');

    $mail->isHTML(true);
    $mail->Subject = 'Registeration is successfull';
    $mail->Body =
        "<div style='text-align:center;background-color:antiquewhite;padding-bottom:20px;'>
            <h1 style='color:antiquewhite;padding: 28px;border-bottom:2px solid #ffc107;background-color:black;border-radius:6px;'>Stanvic Coding Academy</h1>
        
            <p style='font-size:19px;padding:7px;>
                Congratulations you have successfully enrolled for $course with <strong>Stanvic Coding Academy</strong>.
                
            </p>
            <p style=''><a style='text-decoration:none;padding: 7px 12px;;background-color:#ffc107;colorblack;border-radius:10px;' href='https://academy.stanvic.com.ng/users/login'>Verify your email</a></p>
            
            </div>";
    //$mail->AltBody = 'Body in plain text for non-HTML mail clients';
    $mail->send();
}


function sendMailToAdmin($reciever, $name, $phone, $course)
{
    $mail = new PHPMailer(true);
    $mail->SMTPDebug = 2;
    $mail->SMTPSecure = 'tls';
    $mail->isSMTP();
    $mail->Host = 'live.smtp.mailtrap.io';
    $mail->SMTPAuth = true;
    $mail->Port = 587;
    $mail->Username = 'api';
    $mail->Password = '0dcbca9704cf4ae1be561df980807ca3';


    $mail->setFrom('coding@stanvic.com.ng', 'Stanvic Coding Academy');
    $mail->addAddress($reciever);
    //$mail->addAddress('receiver2@gfg.com', 'Name');

    $mail->isHTML(true);
    $mail->Subject = 'Course Registration';
    $mail->Body =
        "<div style='text-align:center;background-color:antiquewhite;padding-bottom:20px;'>
            <h1 style='color:antiquewhite;padding: 28px;border-bottom:2px solid #ffc107;background-color:black;border-radius:6px;'>Stanvic Coding Academy</h1>
        
            <p style='font-size:21px;'>
                Someone just registered by name:$name, phone: $phone, course enrolled: $course.
                
            </p>
            
            </div>";
    //$mail->AltBody = 'Body in plain text for non-HTML mail clients';
    $mail->send();
}
