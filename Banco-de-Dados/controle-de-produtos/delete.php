<?php

require_once '../conexao.php';


$id = preg_replace('/\D/','', $_POST['id']);

$delete = $bd->exec("   UPDATE produtos
                        SET apagado = 1 
                        WHERE id = $id");

//SOFT DELETE

if($delete)
    echo 'Produto foi para lixeira com sucesso!';
else
    echo 'Não foi possivel apagar a tarefa';

echo "<br><br><a href='listar.php'>Voltar</a>";