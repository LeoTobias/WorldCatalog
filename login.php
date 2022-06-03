<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <script type="text/javascript" src="bootstrap.min.js"></script>
</head>
<body>
    <div class="container-fluid login-box">
        <div class="row">
            <div class="col-md-12 user-box">
                <h2>Login</h2>
                <form action="Banco-de-Dados/validacao.php" method="POST">
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com" autocomplete="off">
                        <label for="email">Endereço de E-mail</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" name="senha" id="senha" placeholder="senha">
                        <label for="senha">Senha</label>
                    </div>
                    <div class="form-floating mb-3">
                        <button  type="submit">Entrar</button>
                    </div>
                    <div class="form-floating mb-3">
                        <a href="cadastrarUsuario.php"  type="submit">Cadastre-se</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>