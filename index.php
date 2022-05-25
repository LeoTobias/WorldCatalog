<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <script type="text/javascript" src="bootstrap.min.js"></script>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form action="Banco-de-Dados/validacao.php" method="POST">
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com" autocomplete="off">
                        <label label for="email">Endereço de E-mail</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" name="senha" id="senha" placeholder="senha">
                        <label for="senha">Senha</label>
                    </div>
                    <div class="form-floating mb-3">
                        <button class="btn btn-primary" type="submit">Entrar</button>
                    </div>
                    <div class="form-floating mb-3">
                        <a href="cadastrarUsuario.php" class="btn btn-primary" type="submit">Cadastre-se</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>