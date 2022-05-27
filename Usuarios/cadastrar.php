<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="../bootstrap.min.css">
    <script type="text/javascript" src="../bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <form action="../Banco-de-Dados/controle-de-usuarios/gravar.php" method="post">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="nome" id="nome" placeholder="Digite seu nome" autocomplete="off">
                        <label label for="nome">Nome</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com" autocomplete="off">
                        <label label for="email">Endereço de E-mail</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" name="senha" id="senha" placeholder="Digite uma senha" autocomplete="off">
                        <label label for="senha">Senha</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" name="confirmacao_senha" id="confirmacao_senha" placeholder="Digite sua senha novamente" autocomplete="off">
                        <label label for="confirmacao_senha">Confirmação de Senha</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="submit" value="Cadastrar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>