<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Produto</title>
    <link rel="stylesheet" href="../bootstrap.min.css">
    <script type="text/javascript" src="../bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <form action="../Banco-de-Dados/controle-de-produtos/gravar.php" method="post">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="produto" id="produto" placeholder="Informe o produto" autocomplete="off">
                        <label label for="produto">Informe o produto</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="tipo_produto" id="tipo_produto" placeholder="Ex: Camisa, Tênis etc..." autocomplete="off">
                        <label label for="tipo_produto">Tipo do Produto</label>
                    </div>
                    <div class="form-floating mb-3">
                        <textarea class="form-control" id="descricao" name="descricao" rows="3" placeholder="Digite a descrição do Produto"></textarea>
                        <label label for="descricao">Descrição do Produto</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="date" class="form-control" name="data" id="data" placeholder="Informe a data" >
                        <label label for="data">Data de lançamento do Produto</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" name="categoria" list="opcoes_categoria" id="categoria" placeholder="Type to search..." autocomplete="off">
                        <label for="categoria" class="form-label">Categoria</label>
                        <datalist id="opcoes_categoria">
                            <option value="Life Style">
                            <option value="Esporte">
                        </datalist>
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" name="raridade" list="opcoes_raridade" id="raridade" placeholder="Escolha uma raridade" autocomplete="off">
                        <label for="raridade" class="form-label">Raridade</label>
                        <datalist id="opcoes_raridade">
                            <option value="Comum">
                            <option value="Incomum">
                            <option value="Raro">
                            <option value="Épico">
                            <option value="Lendário">
                        </datalist>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="file" class="form-control" id="imagem-produto" name="imagem-produto" placeholder="Anexar Imagem">
                        <label for="imagem-produto" class="form-label">Anexar Imagem</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input class="btn btn-primary" type="submit" value="Enviar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>