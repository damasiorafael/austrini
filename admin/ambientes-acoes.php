<?php
    include("../inc/config.php");

    header('Content-Type: text/html; charset=utf-8');
    
    $acao   = $_REQUEST['acao'];
    $id     = $_REQUEST['id'];
    $nome   = $_REQUEST['nome'];
        
    $arrayImagens   = $_FILES['imagem'];
    
    function insere($nome_atual, $nome, $nota){
        $sqlInsere = "INSERT INTO ambientes (nome, imagem, data) VALUES ('$nome', '$nome_atual', NOW());";
        return insert_db($sqlInsere);
    }

    function edita($nome_atual, $id, $nome, $nota){
        $sqlEdita = "UPDATE ambientes SET nome = '$nome',  imagem = '$nome_atual', data = NOW() WHERE id = $id;";
        return edita_db($sqlEdita);
    }

    function deletaArquivo($id){
        $sqlConsulta    = "SELECT imagem FROM ambientes WHERE id = $id";
        $resultConsulta = consulta_db($sqlConsulta);
        while($consulta = mysql_fetch_object($resultConsulta)){
            $arquivo = "../uploads/".$consulta->imagem;
            if (unlink($arquivo)){
                return true;
            } else {
                return false;
            }
        }
    }

    function deletaItem($id){
        if(deletaArquivo($id)){
            $sqlDelete = "DELETE FROM ambientes WHERE id = $id";
            if(deleta_db($sqlDelete)){
                return true;
            } else {
                return false;
            }
        }
    }
    
    function uploadImg($arrayImagens, $id, $acao, $nome, $nota){

        $pasta = "../uploads/";
    
        /* formatos de imagem permitidos */
        $permitidos = array(".jpg",".jpeg",".gif",".png", ".bmp");
        
        //FAZ O UPLOAD DAS IMAGENS ENQUANTO EXISTIREM
        $nome_imagem    = $arrayImagens['name'];
        $tamanho_imagem = $arrayImagens['size'];
            
        /* pega a extensão do arquivo */
        $ext = strtolower(strrchr($nome_imagem,"."));

        /* converte o tamanho para KB */
        $tamanho = round($tamanho_imagem / 1024);
            
        /*  verifica se a extensão está entre as extensões permitidas */
        if(in_array($ext,$permitidos)){
            //testa o tamanho em pixels da imagem
            if($tamanho < 2048){ //se imagem for até 500KB envia
                $nome_atual = md5(uniqid(time())).$ext; //nome que dará a imagem
                $tmp = $arrayImagens['tmp_name']; //caminho temporário da imagem

                if($acao == "edit" && $id != ""){
                    /* se enviar a foto, insere o nome da foto no banco de dados */
                    if(move_uploaded_file($tmp,$pasta.$nome_atual)){
                        deletaArquivo($id);
                        //ACAO PARA EDITAR NO BANCO
                        edita($nome_atual, $id, $nome);
                    }
                } else if($acao == "" && $id == ""){
                    if(move_uploaded_file($tmp,$pasta.$nome_atual)){
                        //ACAO PARA SALVAR NO BANCO
                        insere($nome_atual, $nome);
                    }
                } else {
                    //Falha no UPLOAD;
                    echo "<script type='text/javascript'>alert('Falha ao enviar!'); history.back();</script>";
                    exit();
                }
            } else {
                //Falha no tamanho da imagem em pixels
                echo "<script type='text/javascript'>alert('A imagem deve ser de no máximo 500KB!'); history.back();</script>";
                exit();
            }
        } /*else {
            //echo "Somente são aceitos arquivos do tipo Imagem";
            echo "<script type='text/javascript'>alert('Somente são aceitos arquivos do tipo Imagem!'); //history.back();</script>";
            */
        echo "<script type='text/javascript'>alert('Operação realizada com sucesso!'); window.location = 'ambientes.php';</script>";
        exit();
    }
    
    if($acao == ""){
        uploadImg($arrayImagens, $id, $acao, $nome);
    } else if($acao == "edit"){
        uploadImg($arrayImagens, $id, $acao, $nome);
    } else if($acao == "delete"){
        if(deletaItem($id)){
            echo "<script type='text/javascript'>alert('Operação realizada com sucesso!'); window.location = 'ambientes.php';</script>";
        } else {
            echo "<script type='text/javascript'>alert('Erro ao deletar o arquivo!'); history.back();</script>";
        }
    }
?>