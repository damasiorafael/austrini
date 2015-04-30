<?php
    include("../inc/config.php");

    header('Content-Type: text/html; charset=utf-8');
    
    $acao   = $_REQUEST['acao'];
    $id     = $_REQUEST['id'];
        
    $arrayImagens   = $_FILES['imagem'];
    
    function insere($nome_atual){
        $sqlInsere = "INSERT INTO galerias (imagem, data) VALUES ('$nome_atual', NOW());";
        return insert_db($sqlInsere);
    }
    
    function deletePortfolio($id){
        $sqlDelete = "DELETE FROM `portfolio` WHERE `id_portfolio` = $id";
        if(deleta_db($sqlDelete)){
            $sqlDeleteImagens = "DELETE FROM `portfolio_imagens` WHERE `id_portfolio` = $id";
            $sqlDelete              = "DELETE FROM `portfolio_imagens` WHERE `id_imagem` = $id_imagem";
            
            $sqlConsultaImagens     = "SELECT `imagem` FROM `portfolio_imagens` WHERE `id_portfolio` = $id";
            $resultConsultaImagens  = consulta_db($sqlConsultaImagens);
            while($consultaImagens = mysql_fetch_object($resultConsultaImagens)){
                $arquivo = "../uploads/".$consultaImagens->imagem;
            }
            if(deleta_db($sqlDeleteImagens)){
                if (unlink($arquivo)){
                    //echo "sucesso";
                } else {
                    //echo ("Erro ao deletar $arquivo");
                }
            }
        } else {
            //echo "erro";
        }
    }
    
    function uploadImg($arrayImagens){
        $pasta = "../uploads/";
    
        /* formatos de imagem permitidos */
        $permitidos = array(".jpg",".jpeg",".gif",".png", ".bmp");
        
        //FAZ O UPLOAD DAS IMAGENS ENQUANTO EXISTIREM
        $nome_imagem    = $arrayImagens['name'];
        $tamanho_imagem = $arrayImagens['size'];

        list($largura, $altura) = getimagesize($arrayImagens['tmp_name']);
            
        /* pega a extensão do arquivo */
        $ext = strtolower(strrchr($nome_imagem,"."));

        /* converte o tamanho para KB */
        $tamanho = round($tamanho_imagem / 2048);
            
        /*  verifica se a extensão está entre as extensões permitidas */
        if(in_array($ext,$permitidos)){
            //testa as dimensoes da imagem
            if($largura == 1920 && $altura == 880){
                //testa o tamanho em pixels da imagem
                if($tamanho < 2048){ //se imagem for até 2MB envia
                    $nome_atual = md5(uniqid(time())).$ext; //nome que dará a imagem
                    $tmp = $arrayImagens['tmp_name']; //caminho temporário da imagem
                    
                    /* se enviar a foto, insere o nome da foto no banco de dados */
                    if(move_uploaded_file($tmp,$pasta.$nome_atual)){
                        //mysql_query("INSERT INTO fotos (foto) VALUES (".$nome_atual.")");
                        //ACAO PARA SALVAR NO BANCO
                        insere($nome_atual);
                    } else {
                        //Falha no UPLOAD;
                        echo "<script type='text/javascript'>alert('Falha ao enviar!'); history.back();</script>";
                        exit();
                    }
                } else {
                    //Falha no tamanho da imagem em pixels
                    echo "<script type='text/javascript'>alert('A imagem deve ser de no máximo 2MB!'); history.back();</script>";
                    exit();
                }
            } else {
                //Falha na largura e/ou altura da imagem
                echo "<script type='text/javascript'>alert('As dimensões da imagem estão incorretas!'); history.back();</script>";
                exit();
            }
        } /*else {
            //echo "Somente são aceitos arquivos do tipo Imagem";
            echo "<script type='text/javascript'>alert('Somente são aceitos arquivos do tipo Imagem!'); //history.back();</script>";
            */
        echo "<script type='text/javascript'>alert('Cadastro efetuado com sucesso!'); window.location = 'banners.php';</script>";
        exit();
    }
    
    if($acao == ""){
        uploadImg($arrayImagens);
    } else if($acao == "edit"){
        $id             = $_REQUEST["id"];
        $tmp            = $_FILES['img_teste_'.$id_imagem]['tmp_name'];
        $nome_imagem    = $_FILES['img_teste_'.$id_imagem]['name'];
        $tamanho_imagem = $_FILES['img_teste_'.$id_imagem]['size'];
        
        $pasta = "../uploads/";
        
        /* formatos de imagem permitidos */
        $permitidos = array(".jpg",".jpeg",".gif",".png", ".bmp");
        
        /* pega a extensão do arquivo */
        $ext = strtolower(strrchr($nome_imagem,"."));
        
        /*  verifica se a extensão está entre as extensões permitidas */
        if(in_array($ext,$permitidos)){
            /* converte o tamanho para KB */
            $tamanho = round($tamanho_imagem / 2048);
            if($tamanho < 2048){ //se imagem for até 1MB envia
                $nome_atual = md5(uniqid(time())).$ext; //nome que dará a imagem
                
                /* se enviar a foto, insere o nome da foto no banco de dados */
                if(move_uploaded_file($tmp,$pasta.$nome_atual)){
                    $sqlEdit = "UPDATE portfolio_imagens SET imagem='$nome_atual' WHERE id_imagem=$id_imagem";
                    if(edita_db($sqlEdit)){
                        echo "<img width='80' rel='57' src='../uploads/$nome_atual'>";
                    }
                    //inserePortfolioImagens($ultimoId, $nome_atual);
                } else {
                    //echo "Falha ao enviar";
                    echo "<script type='text/javascript'>alert('Falha ao enviar!'); history.back();</script>";
                }
            } else {
                //echo "A imagem deve ser de no máximo 2MB";
                echo "<script type='text/javascript'>alert('A imagem deve ser de no máximo 2MB!'); history.back();</script>";
            }
        }
    } else if($acao == "deleta_imagem"){
        $id_imagem              = $_REQUEST["id_imagem"];
        $sqlDelete              = "DELETE FROM `portfolio_imagens` WHERE `id_imagem` = $id_imagem";
        $sqlConsultaImagens     = "SELECT `imagem` FROM `portfolio_imagens` WHERE `id_imagem` = $id_imagem";
        $resultConsultaImagens  = consulta_db($sqlConsultaImagens);
        while($consultaImagens = mysql_fetch_object($resultConsultaImagens)){
            $arquivo = "../uploads/".$consultaImagens->imagem;
        }
        if(deleta_db($sqlDelete)){
            if (unlink($arquivo)){
                echo "sucesso";
            } else {
                echo ("Erro ao deletar $arquivo");
            }
        }
    } /*else if($acao == "add_nova_image"){
        $id_portfolio       = $_REQUEST["id_portfolio"];
        $id_controle        = $_REQUEST["id_controle"];
        $tmp                = $_FILES["add_nova_image_".$id_controle]["tmp_name"];
        $nome_imagem        = $_FILES["add_nova_image_".$id_controle]["name"];
        $tamanho_imagem     = $_FILES["add_nova_image_".$id_controle]["size"];
        
        $pasta = "../uploads/";
        
        /* formatos de imagem permitidos */
        //$permitidos = array(".jpg",".jpeg",".gif",".png", ".bmp");
        
        /* pega a extensão do arquivo */
        //$ext = strtolower(strrchr($nome_imagem,"."));
        
        /*  verifica se a extensão está entre as extensões permitidas */
        /*if(in_array($ext,$permitidos)){
            /* converte o tamanho para KB */
            /*$tamanho = round($tamanho_imagem / 2048);
            if($tamanho < 2048){ //se imagem for até 1MB envia
                $nome_atual = md5(uniqid(time())).$ext; //nome que dará a imagem
                
                /* se enviar a foto, insere o nome da foto no banco de dados */
                /*if(move_uploaded_file($tmp,$pasta.$nome_atual)){
                    $sqlEdit = "INSERT INTO portfolio_imagens (id_portfolio, imagem) VALUES ($id_portfolio, '$nome_atual');";
                    if(edita_db($sqlEdit)){
                        echo "<img width='80' rel='57' src='../uploads/$nome_atual'>";
                    }
                    //inserePortfolioImagens($ultimoId, $nome_atual);
                } else {
                    //echo "Falha ao enviar";
                    echo "<script type='text/javascript'>alert('Falha ao enviar!'); history.back();</script>";
                }
            } else {
                //echo "A imagem deve ser de no máximo 2MB";
                echo "<script type='text/javascript'>alert('A imagem deve ser de no máximo 2MB!'); history.back();</script>";
            }
        }
    }*/
?>