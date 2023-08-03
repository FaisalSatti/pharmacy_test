<?php

date_default_timezone_set('Asia/Karachi');

require_once "admin.php";

include "PHPMailer/PHPMailerAutoload.php";


function sendmail($to1,$subject1,$body1){
    $from = $GLOBALS['admin_email'];
    $password = $GLOBALS['admin_password'];
   // die("ok");
    $to = $to1;
    $subject = $subject1;
    $body = $body1;
    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->SMTPDebug = 0;
    $mail->Host = "smtp.gmail.com"; 
    $mail->Port = 587;
    $mail->SMTPSecure = 'tls';
//    $mail->Port = 465;
//    $mail->SMTPSecure = 'ssl';
    $mail->SMTPAuth = true;
    $mail->Username = $from;
    $mail->Password = $password;
    $mail->setFrom($from,"ASF SECURITY");
    $mail->addAddress($to,"STAFF");
    $mail->Subject = $subject;
    $mail->msgHTML("<b> $body</b>");
    $mail->isHTML(true);

    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );
    
    // echo !extension_loaded('openssl')?"Not Available":"Available";
    if(!$mail->send()){
        return "Mailer Error:".$mail->ErrorInfo;
    }
    else{
        //header('location:view_appointment?msg="Email Sent Sucessfully"');
        return "send";
    }



}




function sendfile($to1,$subject1,$body1,$file){
    $filename = "../uploads/projects/".$file;
    $from = $GLOBALS['admin_email'];
    $password = $GLOBALS['admin_password'];
    $to = $to1;
    $subject = $subject1;
    $body = $body1;
    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->addAttachment($filename);
    $mail->SMTPDebug = 0;
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;
    $mail->SMTPSecure = 'tls';
    $mail->SMTPAuth = true;
    $mail->Username = $from;
    $mail->Password = $password;
    $mail->setFrom($from,"Admin");
    $mail->addAddress($to,"client");
    $mail->Subject = $subject;
    $mail->msgHTML("<b> $body</b>");

    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );

    if(!$mail->send()){
        return "Mailer Error:".$mail->ErrorInfo;
    }
    else{
        //header('location:view_appointment?msg="Email Sent Sucessfully"');
        return "send";
    }



}



?>