<?php
require '../controleDeAcesso.php';
require_once '../conexao.php';

$id                                 = preg_replace('/\D/', '', $_POST['id']); //Usando expressão regular para tratar o dado evitando SQL Injection;
$nome                               = $_POST['produto']; //Dado inseguro
$descricao                          = $_POST['descricao'];
$ano                                = $_POST['data'];
$categoria                          = $_POST['categoria'];
$tipo_produto                       = $_POST['tipo_produto'];
$raridade                           = $_POST['raridade'];

#atualiza o registro
if(isset($_POST['produto'])){ 

    $arquivoEnviado = '';

    if($_FILES['imagem-produto']['error'] == 0 && $_FILES['imagem-produto']['size'] > 0){

        $mimeType = mime_content_type($_FILES['imagem-produto']['tmp_name']);

        $campos = explode('/', $mimeType);

        $tipo = $campos[0];
        $ext = $campos[1];

        if($tipo == 'image'){

            $arquivoEnviado = '../../assets/imagens' . $_FILES['imagem-produto']['name'] . '_' . md5(rand(-99999, 99999) . microtime()) . '.' . $ext;

            move_uploaded_file($_FILES['imagem-produto']['tmp_name'], 
                                "$arquivoEnviado");
        }else{
            echo "Só é possível enviar tipo de arquivo de imagens";
        }
    }

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
            echo 'Valor inválido, selecione uma opção';
            exit();
    }

    switch($categoria){
        case 'Life Style':
            $categoria = 1;
            break;
        case 'Esporte':
            $categoria = 2;
            break;
        default:
            echo 'Valor inválido, selecione uma opção';
            exit();
    }

    $tb_produtos = $bd->prepare('   UPDATE produtos 
                                    SET nome = :nome, descricao = :descricao, tipo_produto = :tipo, ano = :ano, imagem = :imagem, id_raridade = :raridade, id_categoria= :categoria 
                                    WHERE id = :id');
    $tb_produtos->bindParam(':nome', $nome);
    $tb_produtos->bindParam(':descricao', $descricao);
    $tb_produtos->bindParam(':ano', $ano);
    $tb_produtos->bindParam(':imagem', $arquivoEnviado);
    $tb_produtos->bindParam(':raridade', $raridade);
    $tb_produtos->bindParam(':categoria', $categoria); 
    $tb_produtos->bindParam(':tipo', $tipo_produto); 
    $tb_produtos->bindParam(':id', $id);

    if($tb_produtos->execute()){

        echo "Tarefa atualizada com sucesso!";
    }else{
        echo "Erro ao atualizar a tarefa";
    }
}# FIM ATUALIZA REGISTRO

?> 
<br><a href="listar.php">Ver todos os Produtos</a>