<?php
//header("Content-Type: text/html; charset=utf8",true);
session_start();
//error_reporting(E_ALL);
error_reporting(E_ERROR);

/*if($_SERVER['SERVER_NAME'] == "localhost"){
	$host 	= "localhost";
	$user	= "root";
	$pass	= "";
	$bd		= "austrini";
} else {
	$host 	= "austrini.com.br";
	$user	= "austrini_site";
	$pass	= "@us#12#trini";
	$bd		= "austrini_site";
}*/

if($_SERVER['SERVER_NAME'] == "localhost"){
	$host 	= "localhost";
	$user	= "root";
	$pass	= "";
	$bd		= "austrini";
} else {
	$host 	= "rafaeldamasio.com";
	$user	= "austrini";
	$pass	= "@us#12#trini";
	$bd		= "austrini_site";
}


//$con = mysql_pconnect('localhost','root','');
//$db = mysql_select_db('construpaver');

$con = mysql_connect($host,$user,$pass);
$db = mysql_select_db($bd);

function protecao($string){

  // Passando a primeira letra pra Maiúsculo e o restante pra minúsculo 
  //$string = strtolower($string);
  
  // Verificando alguns elementos que não podem ser passado por POST e nem por GET, e trocando eles por vazio... 
  $string = str_replace("select", "", $string);
  $string = str_replace("delete", "", $string);
  $string = str_replace("create", "", $string);
  $string = str_replace("drop", "", $string);
  $string = str_replace("update", "", $string);
  $string = str_replace("drop table", "", $string);
  $string = str_replace("show table", "", $string);
  $string = str_replace("applet", "", $string);
  $string = str_replace("object", "", $string);
  $string = str_replace("'", "", $string);
  $string = str_replace("#", "", $string);
  $string = str_replace("=", "", $string);
  $string = str_replace("--", "", $string);
  $string = str_replace("-", "", $string);
  $string = str_replace(";", "", $string);
  $string = str_replace("*", "", $string);
  $string = strip_tags($string);
 
  return $string;
}

function consulta_db($sql){
	return mysql_query($sql);
}

function insert_db($sql){
	return mysql_query($sql);
}

function edita_db($sql){
	return mysql_query($sql);
}

function deleta_db($sql){
	return mysql_query($sql);
}

function formata_data($data){
	$data = explode(" ", $data);

	$data1 = $data[0]; // DATA (xxxx-xx-xx)
	$data2 = $data[1]; // HORA (xx:xx:xx)
	
	$data1 = explode("-", $data1);
	$dia = $data1[2]; // Retorna o dia
	$mes = $data1[1]; // Retorna o mês
	$ano = $data1[0]; // Retorna o ano
	
	$data = $dia . "/" . $mes . "/" . $ano . " às " . $data2;
	return $data;
}

function formata_data_austrini($data){
	$data = explode("/", $data);

	$data1 = $data[0]; // DATA (xxxx-xx-xx)
	$data2 = $data[1]; // HORA (xx:xx:xx)
	
	if($data2 == "01"){
		$data2 = "jan";
	} else if($data2 == "02"){
		$data2 = "fev";
	} else if($data2 == "03"){
		$data2 = "mar";
	} else if($data2 == "04"){
		$data2 = "abr";
	} else if($data2 == "05"){
		$data2 = "mai";
	} else if($data2 == "06"){
		$data2 = "jun";
	} else if($data2 == "07"){
		$data2 = "jul";
	} else if($data2 == "08"){
		$data2 = "ago";
	} else if($data2 == "09"){
		$data2 = "set";
	} else if($data2 == "10"){
		$data2 = "out";
	} else if($data2 == "11"){
		$data2 = "nov";
	} else if($data2 == "12"){
		$data2 = "dez";
	}
	
	$data = $data1." ".$data2;
	return $data;
}

function montaArray($data, $separador){
	$data = explode($separador, $data);
	return $data;
}

?>