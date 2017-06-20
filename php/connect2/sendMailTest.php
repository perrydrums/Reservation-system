<?php
require("../vendor/vendor/phpmailer/phpmailer/PHPMailerAutoload.php");
include("../snippets/mailTemplate.php");

$m = new PHPMailer;

$m->isSMTP();
$m->SMTPAuth = true;
//$m->SMTPDebug = 2;


//Variables found in php/connect.php

$m->Host = 'smtp.gmail.com';
$m->Port = 465;
$m->Username = $mailUsername;
$m->Password = $mailPassword;
$m->SMTPSecure = 'ssl';

$m->From = $mailFrom;
$m->FromName = $mailFromName;
$m->addAddress('psperryjanssen@gmail.com', 'Perry Janssen');
$m->addAddress($email, $firstName.' '.$lastName);
$m->addCustomHeader( 'In-Reply-To', $replyToMail);

$m->Subject = 'Les gepland!';
//$emailMessage found in snippets/smailTemplate.php
$m->Body = $emailMessage;
$m->AltBody = 'U heeft een proefles gepland bij drumschool Leon van der Geest. (Zet HTML-mail aan om het hele bericht te zien)';

$m->send();