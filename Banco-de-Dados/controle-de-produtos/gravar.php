<?php
require '../controleDeAcesso.php';
require '../conexao.php';

$nome                               = $_POST['produto']; //Dado inseguro
$descricao                          = $_POST['descricao'];
$ano                                = $_POST['data'];
$categoria                          = $_POST['categoria'];
// $tipo_produto                       = $_POST['tipo_produto'];
$raridade                           = $_POST['raridade'];
$arquivoEnviado                     = '';

var_dump($_FILES['imagem-produto']);

if($_FILES['imagem-produto']['error'] == 0 && $_FILES['imagem-produto']['size'] > 0){

    $mimeType = mime_content_type($_FILES['imagem-produto']['tmp_name']);

    $campos = explode('/', $mimeType);

    

    $tipo = $campos[0];
    $ext = $campos[1];

    if($tipo == 'image'){

        $arquivoEnviado = '../../assets/imagens/' . $_FILES['imagem-produto']['name'] . '_' . md5(rand(-99999, 99999) . microtime()) . '.' . $ext;

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

$tb_raridade = $bd->prepare('  INSERT INTO raridade 
                                    (nivel) 
                                VALUES 
                                    (:nivel_raridade)');

$tb_raridade->bindParam(':nivel_raridade', $raridade);

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
?>

<br><a href="cadastrar.php">Voltar</a>
<br><a href="listar.php">Ver todos os Produtos</a>