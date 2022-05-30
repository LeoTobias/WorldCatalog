<?php

require_once '../conexao.php';

$id = $_POST['id'];

$stmt = $bd->prepare("DELETE FROM produtos WHERE id = :id");
$stmt->bindParam(':id', $id);

if( $stmt->execute() ){
    echo 'tarefa Deletada com sucesso';
}else{
    echo 'erro ao deletar a tarefa';
}