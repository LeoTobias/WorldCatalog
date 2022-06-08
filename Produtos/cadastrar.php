<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Produto</title>
    <link rel="stylesheet" href="../css/formProduto.css">
    <link rel="stylesheet" href="../bootstrap.min.css">
    <script type="text/javascript" src="../bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h2>Cadastrar Produto</h2>
                <form action="../Banco-de-Dados/controle-de-produtos/gravar.php" method="post" enctype="multipart/form-data">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="produto" id="produto" placeholder="Informe o produto" autocomplete="off">
                        <label label for="produto">Informe o produto</label>
                    </div>
                    <!-- <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="tipo_produto" id="tipo_produto" placeholder="Ex: Camisa, Tênis etc..." autocomplete="off">
                        <label label for="tipo_produto">Tipo do Produto</label>
                    </div> -->
                    <div class="form-floating mb-3">
                        <textarea class="form-control text-area" id="descricao" name="descricao" rows="3" placeholder="Digite a descrição do Produto"></textarea>
                        <label label for="descricao">Descrição do Produto</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="date" class="form-control" name="data" id="data" placeholder="Informe a data" >
                        <label label for="data">Data de lançamento do Produto</label>
                    </div>
                    <div class="form-floating mb-3">
                        <select class="form-select" id="opcoes_categoria" name="categoria">
                            <option selected >Selecione uma opção</option>
                            <option value="Life Style">Life Style</option>
                            <option value="Esporte">Esporte</option>
                        </select>
                        <label for="categoria">Categoria</label>
                    </div>
                    <div class="form-floating mb-3">
                        <select class="form-select" id="opcoes_raridade" name="raridade">
                            <option selected >Selecione uma opção</option>
                            <option value="Comum">Comum</option>
                            <option value="Incomum">Incomum</option>
                            <option value="Raro">Raro</option>
                            <option value="Épico">Épico</option>
                            <option value="Lendário">Lendário</option>
                        </select>
                        <label for="raridade" class="form-label">Raridade</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="file" class="form-control" id="imagem-produto" name="imagem-produto" placeholder="Anexar Imagem">
                        <label for="imagem-produto" class="form-label">Anexar Imagem</label>
                    </div>
                    <div class="form-floating mb-3">
                        <a href="../BizPage/home.php" class="btn btn-primary">Voltar</a>
                        <input name="btn_cadastrar" class="btn btn-success" type="submit" value="Enviar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>