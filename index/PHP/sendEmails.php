<?php

function sendEmail($email){
    //echo $email;
    $mail = new PHPMailer();
    $mail->isSmtp();
    $mail->SMTPDebug = 0;
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'ssl';
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = '465'; //587
    $mail->isHTML(true);
    $mail->Username = 'fnexus.co@gmail.com';
    $mail->Password = 'fn3xu5team';
    $mail->SetFrom('fnexus.co@gmail.com');
    $mail->Subject = 'FNEXUS';
    $mail->Body = 'Se ha realizado un nuevo comentario en tu anuncio!';
    $mail->AddAddress($email);

    $mail->Send();
}
