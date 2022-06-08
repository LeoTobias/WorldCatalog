<?php

require_once '../conexao.php';

$lifeStyle = $bd->query('SELECT produtos.id, nome, descricao, ano, imagem, raridade.nivel, id_categoria, tipo_produto FROM produtos inner join raridade on raridade.id = produtos.id_raridade  WHERE apagado = 1 AND id_categoria = 1')->fetchAll();
$esporte = $bd->query("SELECT produtos.id, nome, descricao, ano, imagem, raridade.nivel, id_categoria, tipo_produto FROM produtos inner join raridade on raridade.id = produtos.id_raridade WHERE apagado = 1 AND id_categoria = 2")->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>WordCatalog</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../../BizPage/assets/img/favicon.png" rel="icon">
  <link href="../../BizPage/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="../../BizPage/https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../../BizPage/assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="../../BizPage/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="../../BizPage/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../../BizPage/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../../BizPage/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../../BizPage/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../../BizPage/assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: BizPage - v5.8.0
  * Template URL: https://bootstrapmade.com/bizpage-bootstrap-business-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<form method="post">
    <section id="portfolio" class="section-bg">
      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h3 class="section-title">Lixeira</h3>
        </header>

        <div class="row" data-aos="fade-up" data-aos-delay="100">
      <div class=" col-lg-12">
          <ul id="portfolio-flters">
            <li data-filter=".filter-style">Life Style</li>
            <li data-filter=".filter-esporte">Esportes</li>
          </ul>
        </div>
      </div>

      <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">

      <?php foreach($lifeStyle as $linha):
        $img = 'N/D';
        if(!empty($linha['imagem'])){
            if(is_file($linha['imagem'])){
                $img = "<img src='{$linha['imagem']}' width='250px;' height='250px;'>";
            }
        } 
        ?>
                <div class="col-lg-4 col-md-6 portfolio-item filter-esporte">
                <div class="portfolio-wrap">
                    <figure style='background-color: #F7F7F7; display: flex; flex-direction: column; align-items:center;'>
                        <?php echo $img; ?>
                        <button class="link-preview" name="id" formaction="lixeira-recupera.php" value = "<?php echo $linha['id'] ?>"><i class="bi bi-check-circle-fill"></i></button>
                        <button class="link-details" name="id" formaction="lixeira-apaga.php" value = "<?php echo $linha['id']; ?>"><i class="bi bi-x-circle-fill"></i></button>
                    </figure>

                    <div class="portfolio-info">
                        <h4><?php echo $linha['nome']; ?></h4>
                        <p>Data de Lançamento: <?php echo $linha['ano']; ?></p>
                        <p style="word-wrap: break-word;">Raridade: <?php echo $linha['nivel'];?></p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

        <?php foreach($esporte as $produtos):
        $img = 'N/D';
        if(!empty($produtos['imagem'])){
            if(is_file($produtos['imagem'])){
                $img = "<img src='{$produtos['imagem']}' width='250px;' height='250px;'>";
            }
        } 
        ?>
                <div class="col-lg-4 col-md-6 portfolio-item filter-style">
                <div class="portfolio-wrap">
                    <figure style='background-color: #F7F7F7; display: flex; flex-direction: column; align-items:center;'>
                        <?php echo $img; ?>
                        <button class="link-preview" name="id" formaction="lixeira-recupera.php" value = "<?php echo $linha['id'] ?>"><i class="bi bi-check-circle-fill"></i></button>
                        <button class="link-details" name="id" formaction="lixeira-apaga.php" value = "<?php echo $linha['id']; ?>"><i class="bi bi-x-circle-fill"></i></button>
                    </figure>

                    <div class="portfolio-info">
                        <h4><?php echo $produtos['nome']; ?></h4>
                        <p>Data de Lançamento: <?php echo $produtos['ano']; ?></p>
                        <p style="word-wrap: break-word;">Raridade: <?php echo $produtos['nivel'];?></p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
      </div>
    </section>

<!-- ======= Footer ======= -->
<footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-info">
            <h3>WC</h3>
            <p>Somos uma empresa que visa facilitar os nossos usuários a encontrarem seus produtos preferidos de forma fácil e acessível.</p>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Links Úteis</h4>
            <ul>
              <li><i class="bi bi-chevron-right"></i> <a href="../../BizPage/home.php">Home</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="../../BizPage/home.php">Sobre nós</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Produtos</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-contact">
            <h4>Contact Us</h4>
            <p>
              Avenida Barro Branco, 1025 <br>
              São Paulo, SP<br>
              Brasil <br>
              <strong>Celular:</strong> +55 (11) 95785-5892<br>
              <strong>E-mail:</strong> worldcatalog@colecionaveis.com<br>
            </p>

            <div class="social-links">
              <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
              <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
              <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
              <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
            </div>

          </div>

          <div class="col-lg-3 col-md-6 footer-newsletter">
            <h4>Our Newsletter</h4>
            <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna veniam enim veniam illum dolore legam minim quorum culpa amet magna export quem marada parida nodela caramase seza.</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>
          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong>Leonardo Tobias e Dantoni Paiva</strong>. All Rights Reserved
      </div>
    </div>
</footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <!-- Uncomment below i you want to use a preloader -->
  <!-- <div id="preloader"></div> -->

  <!-- Vendor JS Files -->
  <script src="../../BizPage/assets/vendor/purecounter/purecounter.js"></script>
  <script src="../../BizPage/assets/vendor/aos/aos.js"></script>
  <script src="../../BizPage/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../../BizPage/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="../../BizPage/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="../../BizPage/assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="../../BizPage/assets/vendor/waypoints/noframework.waypoints.js"></script>

  <!-- Template Main JS File -->
  <script src="../../BizPage/assets/js/main.js"></script>

</body>

</html>