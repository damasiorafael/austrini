<?php
    include("../inc/config.php");

    header('Content-Type: text/html; charset=utf-8');
    
    $acao   = $_REQUEST['acao'];
    $id     = $_REQUEST['id'];

    function deletaItem($id){
        $sqlDelete = "DELETE FROM tenha_loja WHERE id = $id";
        if(deleta_db($sqlDelete)){
            return true;
        } else {
            return false;
        }
    }
    
    if($acao == "delete"){
        if(deletaItem($id)){
            echo "<script type='text/javascript'>alert('Operação realizada com sucesso!'); window.location = 'tenha-loja.php';</script>";
        } else {
            echo "<script type='text/javascript'>alert('Erro ao deletar o arquivo!'); history.back();</script>";
        }
    }
?>