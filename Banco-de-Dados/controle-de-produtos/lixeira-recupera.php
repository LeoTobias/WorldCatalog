<?php

require_once '../conexao.php';

$id = $_POST['id'];

$stmt = $bd->prepare("UPDATE produtos SET apagado = 0 WHERE id = :id");
$stmt->bindParam(':id', $id);

if( $stmt->execute() ){
    echo 'tarefa Recuperada com sucesso';
}else{
    echo 'erro ao Recuperar a tarefa';
}