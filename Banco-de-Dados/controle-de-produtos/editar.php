<?php
require '../controleDeAcesso.php';
require_once '../conexao.php';

$id                                 = preg_replace('/\D/', '', $_POST['id']); //Usando expressão regular para tratar o dado evitando SQL Injection;

#atualiza o registro
if(isset($_POST['produto'])){ 

    $arquivoEnviado = '';

    if($_FILES['figura']['error'] == 0 && $_FILES['figura']['size'] > 0){

        $mimeType = mime_content_type($_FILES['figura']['tmp_name']);

        $campos = explode('/', $mimeType);

        $tipo = $campos[0];
        $ext = $campos[1];

        if($tipo == 'image'){

            $arquivoEnviado = '../assets/imagens/' . $_FILES['figura']['name'] . '_' . md5(rand(-99999, 99999) . microtime()) . '.' . $ext;

            move_uploaded_file($_FILES['figura']['tmp_name'], 
                                "$arquivoEnviado");
        }else{
            echo "Só é possível enviar tipo de arquivo de imagens";
        }
    }

    $tb_produtos = $bd->prepare('   UPDATE produtos 
                                    SET nome = :nome, descricao = :descricao, tipo_produto = :tipo, ano = :ano, imagem = :imagem, id_raridade = :raridade, id_categoria= :categoria 
                                    WHERE id = :id');
    $tb_produtos->bindParam(':nome', $produto['nome']);
    $tb_produtos->bindParam(':descricao', $produto['descricao']);
    $tb_produtos->bindParam(':ano', $produto['ano']);
    $tb_produtos->bindParam(':imagem', $arquivoEnviado);
    $tb_produtos->bindParam(':raridade', $raridades['id']);
    $tb_produtos->bindParam(':categoria', $categorias['categoria']); 
    $tb_produtos->bindParam(':tipo', $produto['tipo_produto']); 
    $tb_produtos->bindParam(':id', $id);

    if($tb_produtos->execute()){

        echo "Tarefa atualizada com sucesso!";
    }else{
        echo "Erro ao atualizar a tarefa";
    }
}# FIM ATUALIZA REGISTRO

$tb_produtos = $bd->query("SELECT nome, tipo_produto, descricao, ano, imagem FROM produtos WHERE id = $id"); // ->query Serve para o select
$tb_produtos->execute();
$produto = $tb_produtos->fetch(PDO::FETCH_ASSOC);

$tb_categoria = $bd->query("SELECT categoria FROM categoria_produto WHERE id = $id");
$tb_categoria->execute();
$categorias = $tb_categoria->fetch(PDO::FETCH_ASSOC);

$tb_raridade = $bd->query("SELECT nivel FROM raridade WHERE id = $id");
$tb_raridade->execute();
$raridades = $tb_raridade->fetch(PDO::FETCH_ASSOC);

$img = 'N/D';

if(!empty($produto['imagem'])){
    if(is_file($produto['imagem'])){
        $img = "<img src='{$produto['imagem']}'>";
    }
}

echo "  <form method='post'>
            <div class='form-floating mb-3'>
                <input type='text' class='form-control' name='produto' id='produto' value='{$produto['nome']}' placeholder='Informe o produto' autocomplete='off'>
                <label label for='produto'>Informe o produto</label>
            </div>
            <div class='form-floating mb-3'>
                <input type='text' class='form-control' name='tipo_produto' id='tipo_produto' value='{$produto['tipo_produto']}' placeholder='Ex: Camisa, Tênis etc...' autocomplete='off'>
                <label label for='tipo_produto'>Tipo do Produto</label>
            </div>
            <div class='form-floating mb-3'>
                <textarea class='form-control' id='descricao' name='descricao' rows='3' value='{$produto['descricao']}' placeholder='Digite a descrição do Produto'></textarea>
                <label label for='descricao'>Descrição do Produto</label>
            </div>
            <div class='form-floating mb-3'>
                <input type='date' class='form-control' name='data' id='data' value='{$produto['ano']}' placeholder='Informe a data' >
                <label label for='data'>Data de lançamento do Produto</label>
            </div>
            <div class='form-floating mb-3'>
                <input type='file' class='form-control' id='figura' name='figura' placeholder='Anexar Imagem'>
                <label for='figura' class='form-label'>Anexar Imagem</label>
            </div>
            <div class='form-floating mb-3'>
                <input class='form-control' name='categoria' list='opcoes_categoria' id='categoria' value='{$categorias['categoria']}' placeholder='Type to search...'>
                <label for='categoria' class='form-label'>Categoria</label>
                <datalist id='opcoes_categoria'>
                    <option value='Life Style'>
                    <option value='Esporte'>
                </datalist>
            </div>
            <div class='form-floating mb-3'>
                <input class='form-control' name='raridade' list='opcoes_raridade' id='raridade' value='{$raridades['nivel']}' placeholder='Escolha uma raridade'>
                <label for='raridade' class='form-label'>Raridade</label>
                <datalist id='opcoes_raridade'>
                    <option value='Comum'>
                    <option value='Incomum'>
                    <option value='Raro'>
                    <option value='Épico'>
                    <option value='Lendário'>
                </datalist>
            </div>
            <div class='form-floating mb-3'>
                <input type='hidden' name='id' value='$id'><br>
            </div>
            <div class='form-floating mb-3'>
                <input type='submit' value='Enviar'>
            </div>
        </form> <a href='../controle-de-produtos/listar.php'>Voltar</a>";