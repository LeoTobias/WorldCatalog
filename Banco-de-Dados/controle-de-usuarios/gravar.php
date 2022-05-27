<?php 
require_once '../conexao.php';

$nome                   = $_POST['nome'];
$email                  = $_POST['email'];
$senha                  = $_POST['senha'];
$confirmacao_senha      = $_POST['confirmacao_senha'];

if($senha != $confirmacao_senha){
    echo "  Senhas não são iguais. Tente novamente <br>
            <a href='/Usuarios/cadastrar.php'></a>";
    exit();
}

$senha = password_hash($senha, PASSWORD_DEFAULT);

$stmt = $bd->prepare('  INSERT INTO usuarios
                            (nome, email, senha)
                        VALUES
                            (:nome, :email, :senha)');

$stmt->bindParam(':nome', $nome);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':senha', $senha);

if( $stmt->execute() ) {
    echo "Gravado com sucesso!"; // Estilizar mensagem 
}else{
    echo "Problema ao gravar $nome"; // Estilizar mensagem
}

header('location: ../../login.php');

exit();
