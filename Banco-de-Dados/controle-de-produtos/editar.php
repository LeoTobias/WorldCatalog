<?php
require '../controleDeAcesso.php';
require_once '../conexao.php';

$id                                 = preg_replace('/\D/', '', $_POST['id']); //Usando expressão regular para tratar o dado evitando SQL Injection;

$tb_produtos = $bd->query("SELECT nome, tipo_produto, descricao, ano, imagem FROM produtos WHERE id = $id"); // ->query Serve para o select
$tb_produtos->execute();
$produto = $tb_produtos->fetch(PDO::FETCH_ASSOC);

$img = 'N/D';

if(!empty($produto['imagem'])){
    if(is_file($produto['imagem'])){
        $img = "<img src='{$produto['imagem']}'>";
    }
}

echo "  <form action='update.php' method='post' enctype='multipart/form-data'>
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
                <input type='file' class='form-control' id='imagem-produto' name='imagem-produto' placeholder='Anexar Imagem'>
                <label for='imagem-produto' class='form-label'>Anexar Imagem</label>
            </div>
            <div class='form-floating mb-3'>
                <input class='form-control' name='categoria' list='opcoes_categoria' id='categoria' placeholder='Type to search...' autocomplete='off'>
                <label for='categoria' class='form-label'>Categoria</label>
                <datalist id='opcoes_categoria'>
                    <option value='Life Style'>
                    <option value='Esporte'>
                </datalist>
            </div>
            <div class='form-floating mb-3'>
                <input class='form-control' name='raridade' list='opcoes_raridade' id='raridade' placeholder='Escolha uma raridade' autocomplete='off'>
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
                <input type='submit' value='Atualizar'>
            </div>
        </form> <a href='../controle-de-produtos/listar.php'>Voltar</a>";