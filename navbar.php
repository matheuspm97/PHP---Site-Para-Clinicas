<style>
  .email-text {
  font-weight: bold; /* Define o texto em negrito */
  margin-right: 8px
  }
</style>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
	<title>Clínica Médica</title>
<body>
<nav class="navbar navbar-expand-md navbar-dark" style="background-color: #09325e;">
  <div class="container-fluid m-0">
    <a class="navbar-brand" href="index.php"><h1 class="m-0"><img class=" d-block" src="./images/navbarnovo.png" alt="imagem pricipal"></h1></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link active m-0" aria-current="page" href="inicio.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link m-0" href="#">Notícias</a>
        </li>
        <li class="nav-item">
          <a class="nav-link m-0" href="#">Contato</a>
        </li>
        <li class="nav-item">
          <a class="nav-link m-0" href="#">Locais</a>
        </li>
      </ul>
      <?php if (isset($_SESSION['email'])): ?>
      <form class="d-flex" method="POST" action="">
      <span class="navbar-text email-text" style="color: #fff;">Olá, <?php echo $_SESSION['nome']; ?>!</span>
      <button class="btn btn-outline-light" type="submit" name="logout">Encerrar</button>
      </form>
      <?php else: ?>
      <form class="d-flex" role="login">
       <a href="login.php" class="btn btn-outline-info" type="submit">Entrar</a>
      </form>
      <?php endif; ?>
    </div>
  </div>
</nav>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>