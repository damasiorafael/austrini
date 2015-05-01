<?php
    include("../inc/config.php");

    header('Content-Type: text/html; charset=utf-8');
    
    $acao   = $_REQUEST['acao'];
    $id     = $_REQUEST['id'];

    function deletaArquivo($id){
        $sqlConsulta    = "SELECT arquivo FROM trabalhe WHERE id = $id";
        $resultConsulta = consulta_db($sqlConsulta);
        while($consulta = mysql_fetch_object($resultConsulta)){
            $arquivo = "../uploads/".$consulta->arquivo;
            if (unlink($arquivo)){
                return true;
            } else {
                return false;
            }
        }
    }

    function deletaItem($id){
        if(deletaArquivo($id)){
            $sqlDelete = "DELETE FROM trabalhe WHERE id = $id";
            if(deleta_db($sqlDelete)){
                return true;
            } else {
                return false;
            }
        }
    }
    
    if($acao == "delete"){
        if(deletaItem($id)){
            echo "<script type='text/javascript'>alert('Operação realizada com sucesso!'); window.location = 'trabalhe-conosco.php';</script>";
        } else {
            echo "<script type='text/javascript'>alert('Erro ao deletar o arquivo!'); history.back();</script>";
        }
    }
?>