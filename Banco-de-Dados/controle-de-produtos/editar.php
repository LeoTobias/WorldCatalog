<?php
require '../Banco-de-Dados/controleDeAcesso.php';
require_once '../Banco-de-Dados/conexao.php';

$id = preg_replace('/\D/', '', $_POST['id']); //Usando expressão regular para tratar o dado evitando SQL Injection;

$tb_produtos = $bd->query("     SELECT produtos.id, nome, tipo_produto, descricao, ano, imagem, raridade.nivel, categoria_produto.categoria
                                FROM produtos 
                                inner join raridade on raridade.id = produtos.id_raridade 
                                inner join categoria_produto on categoria_produto.id = produtos.id_categoria 
                                WHERE produtos.id = $id"); // ->query Serve para o select
$tb_produtos->execute();
$produto = $tb_produtos->fetch(PDO::FETCH_ASSOC);

$img = 'N/D';

if(!empty($produto['imagem'])){
    if(is_file($produto['imagem'])){
        $img = "<img src='{$produto['imagem']}'>";
    }
}
?>