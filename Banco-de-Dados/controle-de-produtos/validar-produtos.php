<?php

require_once '../conexao.php';

$nome = '';
$descricao = '';
$ano = '';
$categoria = '';
$raridade = '';

if(isset($_POST['btn_cadastrar']) ){
    $nome               = $_POST['produto'];
    $descricao          = $_POST['descricao'];
    $ano                = $_POST['data'];
    $categoria          = $_POST['categoria'];
    $raridade           = $_POST['raridade'];


    //ARRAY DE ERROS
    $erros = [];

    //LIMPEZA E VALIDAÇÃO
    if(!empty($nome)){
        $nome =  htmlspecialchars($nome, ENT_COMPAT, 'UTF-8');     
    }else{$erros["NOME"] = "Preencha o campo";}

    if(!empty($raridade)){

            switch($raridade){
                case 'Comum':
                    $raridade = 1;
                    break;
                case 'Incomum':
                    $raridade = 2;
                    break;
                case 'Raro':
                    $raridade = 3;
                    break;
                case 'Épico':
                    $raridade = 4;
                    break;
                case 'Lendário':
                    $raridade = 5;
                    break;
                default:
                    $erros["raridade"] = "Insira um valor valido no campo";
                    exit();
            }
        }

    else{$erros["RARIDADE"] = "Preencha o campo";}
   

    if(!empty($categoria)){
        switch($categoria){
            case 'Life Style':
                $categoria = 1;
                break;
            case 'Esporte':
                $categoria = 2;
                break;
            default:
                $erros["CATEGORIA"] = "Insira um valor valido no campo";  
                exit();
        }

    }else{$erros["CATEGORIA"] = "Preencha o campo";}

    if (!empty($descricao)){
        $descricao = htmlspecialchars($descricao, ENT_COMPAT, 'UTF-8');

    }else{$erros["DESCRICAO"] = "Preencha o campo";}

        
    if(empty($erros)){
        if($_FILES['imagem-produto']['error'] == 0 && $_FILES['imagem-produto']['size'] > 0){
            $mimeType = mime_content_type($_FILES['imagem-produto']['tmp_name']);
            $campos = explode('/', $mimeType);
            $tipo = $campos[0];
            $ext = $campos[1];        
            if($tipo == 'image'){
    
                $arquivoEnviado = '../../assets/imagens/' . $_FILES['imagem-produto']['name'] . '_' . md5(rand(-99999, 99999) . microtime()) . '.' . $ext;
        
                move_uploaded_file($_FILES['imagem-produto']['tmp_name'], 
                                    "$arquivoEnviado");
        
            }else { $erros["IMAGEM"]  = 'So é permitido o upload de imagem';} 
        }
    }else{$erros['IMAGEM'] = 'Preencha o campo';}



    if(empty($erros)){
                   
        $tb_raridade = $bd->prepare('  INSERT INTO raridade 
                                            (nivel) 
                                        VALUES 
                                            (:nivel_raridade)');
                                                        
        $tb_raridade->bindParam(':nivel_raridade', $raridade);

        $tb_categoria = $bd->prepare('  INSERT INTO categoria_produto
                                            (categoria) 
                                        VALUES 
                                            (:categoria)');

        $tb_categoria->bindParam(':categoria', $categoria);

        $tb_produtos = $bd->prepare('  INSERT INTO produtos
                            (nome, descricao, ano, imagem, id_raridade, id_categoria)
                        VALUES
                            (:nome, :descricao, :ano, :imagem, :raridade, :categoria)');

        $tb_produtos->bindParam(':nome', $nome);
        $tb_produtos->bindParam(':descricao', $descricao);
        $tb_produtos->bindParam(':ano', $ano);
        $tb_produtos->bindParam(':imagem', $arquivoEnviado);
        $tb_produtos->bindParam(':raridade', $raridade);
        $tb_produtos->bindParam(':categoria', $categoria); 
        // $tb_produtos->bindParam(':tipo', $tipo_produto); 

        if( $tb_produtos->execute() ){
            echo "$nome inserido com sucesso!";
        }else{
            echo "Problema na gravação da nova tarefa $nome";
        }
    }
    foreach ($erros as $campo => $erro) {
        echo "<p>$erro $campo </p>";
    }
}
