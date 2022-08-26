<?php
    use PHPMailer\PHPMailer\PHPMailer;
    $email=$_POST['email'];
    if(isset($_POST['submit'])){
        require 'vendor/autoload.php';
        require 'credential.php';
   
        $mail = new PHPMailer;
        $mail->isSMTP();
        $mail->SMTPDebug = 4;
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 587;
        $mail->SMTPsecure='tls';
        $mail->SMTPAuth = true;
        $mail->Username = EMAIL;
        $mail->Password = PASS;
        $mail->setFrom(EMAIL, 'piyasha');
        //    $mail->addReplyTo('test@hostinger-tutorials.com', 'Your Name');
        $mail->addAddress($email);
        $mail->Subject = 'Testing PHPMailer';

        $mail->msgHTML(file_get_contents('message.html'), __DIR__);
        $mail->Body = 'Thank you for your submission';
        //$mail->addAttachment('test.txt');
        if (!$mail->send()) {
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            echo 'The email message was sent.';
        }
    }
?>