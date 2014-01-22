<?php
function sendMail($para,$de,$mensagem,$assunto)
{
	//DADOS SMTP
	$smtp = "mail.dominio.com.br";
	$usuario = "contato@dominio.com.br";
	$senha = "senha";

	require_once 'smtp/smtp.php';

	$mail = new SMTP;
	$mail->Delivery('relay');
	$mail->Relay($smtp, $usuario, $senha, 25, 'login', false);
	$mail->TimeOut(10);
	$mail->Priority('high');
	$mail->From($de);
	$mail->AddTo($para);
	$mail->Html($mensagem);

	if($mail->Send($assunto))
		return true;
	else
		return false;
} ?>