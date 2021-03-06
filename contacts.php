<?php

include_once("inc/config.php");

// Configuration
$email_site = "damasio_damasio@hotmail.com";
$usuario = "damasio.rafael@gmail.com";
$senha = "Damasio.8560";

// Datamail
$nome      	= protecao($_POST['nome']);
$email   	= stripslashes( protecao($_POST['email']) );
$cidade  	= protecao($_POST['cidade']);
$telefone 	= strtolower( protecao($_POST['telefone']) );
$mensagem  	= stripslashes( nl2br( protecao($_POST['mensagem']) ) );

function insereContato($nome, $email, $cidade, $telefone, $mensagem){
	$sqlInsereContato = "INSERT INTO contatos (nome, email, cidade, telefone, mensagem, data) VALUES ('$nome', '$email', '$cidade', '$telefone', '$mensagem', NOW());";
	//exit();
	return insert_db($sqlInsereContato);
}

// Field Control
if ( empty( $nome ) || empty( $email ) || empty( $telefone ) || empty( $mensagem ) || empty( $cidade )){
	print( 'Por favor, preencha todos os campos.' );
	exit;
}

// Email Control
if ( !preg_match( "/^[a-z0-9_\.\-]+@[a-z0-9\-\.]+\.[a-z]{2,4}$/", $email ) ){
	print( 'Por favor, informe um e-mail válido.' );
	exit;
}


/*********************************** A PARTIR DAQUI NAO ALTERAR ************************************/
include_once("inc/phpmailer/class.phpmailer.php");

$To = $email_site;
$Subject = utf8_decode("Mensagem através do site");
$bodyMensagem = "";
$bodyMensagem .= "<strong>Nome:</strong> ".utf8_encode($nome)." <br />";
$bodyMensagem .= "<strong>E-mail:</strong> $email <br />";
$bodyMensagem .= "<strong>Cidade:</strong> ".utf8_encode($cidade)." <br />";
$bodyMensagem .= "<strong>Telefone:</strong> ".$telefone." <br />";
$bodyMensagem .= "<strong>Mensagem:</strong> ".utf8_encode($mensagem);
$Message = $bodyMensagem;

$Host = "smtp.gmail.com";
$Username = $usuario;
$Password = $senha;
$Port = 587;

$mail = new PHPMailer();
$body = $Message;
//$mail->IsHtml(); // telling the class to use HTML
$mail->Host = $Host; // SMTP server
$mail->SMTPDebug = 1; // enables SMTP debug information (for testing)
// 1 = errors and messages
// 2 = messages only
$mail->SMTPAuth = true; // enable SMTP authentication
$mail->SMTPSecure = "tls";	// SSL REQUERIDO pelo GMail
$mail->Port = $Port; // set the SMTP port for the service server
$mail->Username = $Username; // account username
$mail->Password = $Password; // account password

$mail->SetFrom($usuario, $email);
$mail->Subject = $Subject;
$mail->MsgHTML($body);
$mail->AddAddress($To);

//echo $body;

if(insereContato($nome, $email, $cidade, $telefone, $mensagem)){
	echo "<script type='text/javascript'>alert('Mensagem enviada com sucesso!'); window.location = 'index.php';</script>";
	//echo 'sucesso';
	exit();
	if(!$mail->Send()){
		echo 'Erro ao enviar e-mail: '. print($mail->ErrorInfo);
	} else {
		echo 'sucesso';
	}
} else {
	echo "<script type='text/javascript'>alert('Mensagem enviada com sucesso!'); history.back();</script>";
}

?>