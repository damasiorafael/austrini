<?php

include_once("inc/config.php");

// Configuration
$email_site = "damasio_damasio@hotmail.com";
$usuario = "damasio.rafael@gmail.com";
$senha = "Damasio.8560";

// Datamail
$nome      		= protecao($_POST['nome']);
$email   		= stripslashes( protecao($_POST['email']) );
$arrayArquivos 	= $_FILES['arquivo'];

function insereCurriculo($nome, $email, $arquivo){
	$sqlInsereContato = "INSERT INTO trabalhe (nome, email, arquivo, data) VALUES ('$nome', '$email', '$arquivo', NOW());";
	//exit();
	if(insert_db($sqlInsereContato)){
		return true;
	} else {
		return false;
	}
}

// Field Control
if(!isset($arrayArquivos)){
	if ( empty( $nome ) || empty( $email )){
		print( 'Por favor, preencha todos os campos.' );
		exit;
	}
}

// Email Control
if ( !preg_match( "/^[a-z0-9_\.\-]+@[a-z0-9\-\.]+\.[a-z]{2,4}$/", $email ) ){
	print( 'Por favor, informe um e-mail válido.' );
	exit;
}

function uploadImg($nome, $email, $arrayArquivos){
	
    $pasta = "uploads/";
    
    //FAZ O UPLOAD DAS IMAGENS ENQUANTO EXISTIREM
    $nome_arquivos  	= $arrayArquivos['name'];
    $tamanho_arquivos	= $arrayArquivos['size'];

    /* pega a extensão do arquivo */
    $ext = strtolower(strrchr($nome_arquivos,"."));
        
    /* converte o tamanho para KB */
    $tamanho = round($tamanho_arquivos / 1024);
	if($tamanho < 1024){ //se o arquivo for até 1MB envia
        $nome_atual = md5(uniqid(time())).$ext; //nome que dará ao arquivo
        $tmp = $arrayArquivos['tmp_name']; //caminho temporário do arquivo
        if(move_uploaded_file($tmp,$pasta.$nome_atual)){
        	//ACAO PARA SALVAR NO BANCO
        	return insereCurriculo($nome, $email, $nome_atual);
        } else {
        	//Falha no UPLOAD;
        	echo "<script type='text/javascript'>alert('Falha ao enviar!'); history.back();</script>";
        	exit();
        }
    } else {
        //Falha no tamanho do arquivo
        echo "<script type='text/javascript'>alert('O arquivo deve ter no máximo 1MB!'); history.back();</script>";
        exit();
    }
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

if(uploadImg($nome, $email, $arrayArquivos)){
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