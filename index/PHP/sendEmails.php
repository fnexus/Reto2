<?php

function sendEmail($email){
    $mail = new PHPMailer();
    $mail->isSmtp();
    $mail->SMTPDebug = 1;
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'ssl';
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = '465'; //587
    $mail->isHTML(true);
    $mail->Username = 'fnexus.co@gmail.com';
    $mail->Password = 'fn3xu5team';
    $mail->SetFrom('fnexus.co@gmail.com');
    $mail->Subject = 'FNEXUS';
    $mail->Body = 'Somos una organización criminal que se expande como un virus con el objetivo de destruir google. Tu ya estás infectado, asume las consecuencias de apoyar a google. Nos vemos pronto.';
    $mail->AddAddress($email);

    $mail->Send();
}
