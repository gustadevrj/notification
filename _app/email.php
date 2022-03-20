<?php

namespace Notification;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Email{

	private $mail = \stdClass::class;

	public function __construct($smtpDebug, $host, $user, $pass, $smtpSecure, $port, $setFromEmail, $setFromName){
		//$email = new PHPMailer;
		$this->mail = new PHPMailer(true);

		//Server settings
		$this->mail->SMTPDebug = $smtpDebug;//2;//SMTP::DEBUG_SERVER;                      //Enable verbose debug output
		$this->mail->isSMTP();                                            //Send using SMTP
		$this->mail->Host       = $host;//'smtp.example.com';                     //Set the SMTP server to send through
		$this->mail->SMTPAuth   = true;                                   //Enable SMTP authentication
		$this->mail->Username   = $user;//'user@example.com';                     //SMTP username
		$this->mail->Password   = $pass;//'secret';                               //SMTP password
		$this->mail->SMTPSecure = $smtpSecure;//PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
		$this->mail->Port       = $port;//465;

		//
		$this->mail->CharSet = "utf-8";
		$this->mail->setLanguage("br");

		//
		$this->mail->isHTML(true);

		//
		//$this->mail->setFrom('from@example.com', 'Mailer');
		$this->mail->setFrom($setFromEmail, $setFromName);
	}

	public function sendMail($subject, $body, $replyEmail, $replyName, $addressEmail, $addressName){
		$this->mail->Subject = (string)$subject;
		$this->mail->Body = $body;

		$this->mail->addReplyTo($replyEmail, $replyName);
		$this->mail->addAddress($addressEmail, $addressName);

		try{
			$this->mail->send();
		} catch (Exception $e){
			echo("<br>Erro ao Enviar o Enviar:" . $this->mail->ErrorInfo . "<br>" . $e->getMessage() . "<br>");
		}

		//echo("Email Enviado!");
	}
}
?>