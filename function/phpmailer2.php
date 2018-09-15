<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require ("../webroot/PHPMailer-master/src/Exception.php");
require ("../webroot/PHPMailer-master/src/PHPMailer.php");
require ("../webroot/PHPMailer-master/src/SMTP.php");


$mail = new PHPMailer(true);                              // Passing `true` enables exceptions

$message = 'Bonjour,<br /><br />
 
Pour rénitialiser votre code, veuillez cliquer sur le lien ci dessous
ou copier/coller votre code dans le navigateur internet.<br />

Voici votre code ' . $code_recu . ' <br />
 
http://localhost:8080/camagrunew/view/indexView.php?page=password_recup&section=code<br /><br />
 
 
---------------
Ceci est un mail automatique, Merci de ne pas y répondre.';

try {
    //Server settings
   // $mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();                                        // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';                         // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                                 // Enable SMTP authentication
    $mail->Username = 'maildevprojet@gmail.com';            // SMTP username
    $mail->Password = 'Bonjour123';                         // SMTP password
    $mail->SMTPSecure = 'tls';                              // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                      // TCP port to connect to

    //Recipients
    $mail->setFrom('from@example.com', 'Mailer');
    $mail->addAddress($mail_recup);           // Add a recipient $email
    $mail->addAddress('RickAndMorty@camagru.com');          // Name is optional
    $mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    //Content
    $mail->isHTML(true);                                    // Set email format to HTML
    $mail->Subject = 'Vous avez un nouveau commentaire';
    $mail->Body    = $message;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
   // echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
}
?>