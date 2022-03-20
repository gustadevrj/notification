<?php

require __DIR__ . "/../lib_ext/autoload.php";

//
//<nome do vendor(desenvolvedor)>\<nome da biblioteca>\<metodo chamado>;
//use PHPMailer\PHPMailer\PHPMailer;

use Notification\Email;

//$email = new PHPMailer;

//var_dump($email);


//$novoEmail = new Notification\Email\sendMail;
//$novoEmail = new Email\sendMail;


$smtpDebug = 2;
$host = "smtp.example.com";
$user = "user@example.com";
$pass = "secret";
$smtpSecure = "tls";
$port = "465";
$setFromEmail = "from@example.com";
$setFromName = "Mailer";


$novoEmail = new Email($smtpDebug, $host, $user, $pass, $smtpSecure, $port, $setFromEmail, $setFromName);

//$novoEmail->sendMail();

$novoEmail->sendMail("Assunto de Teste", "<p>Esse é um <b>Email de Teste</b>!</p>", "contato@teste.com", "Contato", "atendimento@teste.com", "Atendimento");

var_dump($novoEmail);

?>