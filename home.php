<?php
require './Banco-de-Dados/conexao.php';
require './Banco-de-Dados/controleDeAcesso.php';

$consulta = $bd->query("SELECT id, nome, descricao, ano, imagem, id_raridade, id_categoria, tipo_produto FROM produtos WHERE apagado = 0")->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="home.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-md navbar-dark bg-dark">
  <div class="container">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="#"><img src="imagens/sea-ga4dd3c763_1280.png" alt="" width="50" height="24"></a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Sobre</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Conteúdo</a>
        </li>
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Pesquise" aria-label="Search">
        <button class="btn btn-outline-primary buscar" type="submit" >Buscar</button>
      </form>
    </div>
  </div>  
</nav>
</nav>

<br>

<div class="container-md">
    <div class="row">
        <div class="col-md-2">
          <div class="accordion" id="accordionExample">
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                  Serviço do Aluno
                </button>
              </h2>
              <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  Conteúdo do acordeão.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  Documentos Acadêmenicos 
                </button>
              </h2>
              <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  Conteúdo do acordeão.
                </div>
              </div>
            </div>

            <div class="accordion-item">
              <h2 class="accordion-header" id="headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                  Informações
                </button>
              </h2>
              <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  Conteúdo do acordeão.
                </div>
              </div>
            </div>

            <div class="accordion-item">
              <h2 class="accordion-header" id="headingFour">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                  Biblioteca
                </button>
              </h2>
              <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  Conteúdo do acordeão.
                </div>
              </div>
            </div>

            <div class="accordion-item">
              <h2 class="accordion-header" id="headingFive">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                  Enade
                </button>
              </h2>
              <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  Conteúdo do acordeão.
                </div>
              </div>
            </div>

            <div class="accordion-item">
              <h2 class="accordion-header" id="headingSix">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                  Banco de Talentos
                </button>
              </h2>
              <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  Conteúdo do acordeão.
                </div>
              </div>
            </div>

            <div class="accordion-item">
              <h2 class="accordion-header" id="headingSeven">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                  Senac Carreiras
                </button>
              </h2>
              <div id="collapseSeven" class="accordion-collapse collapse" aria-labelledby="headingSeven" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  Conteúdo do acordeão.
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-8">
          <div class="row">
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img class="imagemCarrossel" src="imagens/polynesia-g4477e4e5f_1280.jpg"  alt="...">
                </div>
                <div class="carousel-item">
                  <img class="imagemCarrossel" src="imagens/sunset-gbd842d5fa_1280.jpg"  alt="...">
                </div>
                <div class="carousel-item">
                  <img class="imagemCarrossel" src="imagens/fantasy-gaeefc40d6_1280.jpg" alt="...">
                </div>
              </div>
              <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </button>
            </div>
            <div class="row">
              <br>
            </div>
            <div class="row">
              <div class="col-md-3">
                <div class="card" style="width: 12.7rem;">
                  <img src="imagens/summer-g7f5756946_1280.png" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">Título</h5>
                    <p class="card-text">Paragráfo para textos</p>
                    <a href="#" class="btn btn-primary">Botão</a>
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="card" style="width: 12.7rem;">
                  <img src="imagens/beach-g11abf6524_1280.png" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">Título</h5>
                    <p class="card-text">Paragráfos para textos</p>
                    <a href="#" class="btn btn-primary">Botão</a>
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="card" style="width: 12.7rem;">
                  <img src="imagens/sea-ga4dd3c763_1280.png" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">Título</h5>
                    <p class="card-text">Paragráfo para textos</p>
                    <a href="#" class="btn btn-primary">Botão</a>
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="card" style="width: 30.7rem;">
                  <img src="imagens/sun-gf8c1c3620_1280.png" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">Título</h5>
                    <p class="card-text">Paragráfos para textos</p>
                    <a href="#" class="btn btn-primary">Botão</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
</div>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>