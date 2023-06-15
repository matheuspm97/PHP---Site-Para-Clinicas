<?php
require_once('config.php');
require_once('functions.php');

session_start();
logout();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Clínica Médica</title>
</head>
<body>
<?php include('navbar.php'); ?>


<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2" class=""></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3" class=""></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item  active">
        <a href="inicio.php">
          <img class="img-fluid d-md-none" src="./images/slide_1_cell.png" alt="imagem pricipal">
          <img class="img-fluid d-none d-md-block d-xl-none" src="./images/slide_1-1.png" alt="imagem pricipal">
          <img class="img-fluid d-none d-xl-block" src="./images/slide_1.png" alt="imagem pricipal">
        </a>
          <div class="carousel-caption d-none d-md-block">
          </div>
        </div>
        <div class="carousel-item">
        <a href="buscar_consultas.php">
        <img class="img-fluid d-md-none" src="./images/slide_2_cell.png" alt="Consultas">
          <img class="img-fluid d-none d-md-block d-xl-none" src="./images/slide_2_tablet.png" alt="consultas">
          <img class="img-fluid d-none d-xl-block" src="./images/slide_2.png" alt="consultas">
        </a>
          <div class="carousel-caption d-none d-md-block">
          </div>
        </div>
        <div class="carousel-item">
        <a href="buscar_exames.php">
        <img class="img-fluid d-md-none" src="./images/slide_3_cell.png" alt="exames">
          <img class="img-fluid d-none d-md-block d-xl-none" src="./images/slide_3_tablet.png" alt="exames">
          <img class="img-fluid d-none d-xl-block" src="./images/slide_3.png" alt="exames">
        </a>
          <div class="carousel-caption d-none d-md-block">
          </div>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
	<h1>....</h1>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>