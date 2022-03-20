<?php

namespace Notification;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Email{

	private $mail = \stdClass::class;

	public function __construct(){
		//$email = new PHPMailer;
		$this->mail = new PHPMailer(true);

		//Server settings
		$this->mail->SMTPDebug = 2;//SMTP::DEBUG_SERVER;                      //Enable verbose debug output
		$this->mail->isSMTP();                                            //Send using SMTP
		$this->mail->Host       = 'smtp.example.com';                     //Set the SMTP server to send through
		$this->mail->SMTPAuth   = true;                                   //Enable SMTP authentication
		$this->mail->Username   = 'user@example.com';                     //SMTP username
		$this->mail->Password   = 'secret';                               //SMTP password
		$this->mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
		$this->mail->Port       = 465;

		//
		$this->mail->CharSet = "utf-8";
		$this->mail->setLanguage("br");

		//
		$this->mail->isHTML(true);

		//
		$this->mail->setFrom('from@example.com', 'Mailer');
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