<?php
   require_once('config.php');
   require_once('session.php');
   require_once('functions.php');
   
   logout();
   user_status();
   $status = $_SESSION["status"];
   pagina_proibida($status, $conn);
   
   if(isset($_POST['cadastrar'])){
    cadastrar_paciente ($conn, $_POST);
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Cadastro de Pacientes</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
<?php include('navbar.php'); ?>
    <div class="container-fluid">
        <div class="row">
            <!-- Side Menu -->
            <?php include('navbarlateral.php'); ?>

            <!-- Content Area -->
            <div class="col-md-9">
                <div class="container mt-5">
                    <h1>Cadastro de Pacientes</h1>
                    <?php if(isset($_SESSION['msg-success'])) {?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $_SESSION['msg-success'];
                        unset ($_SESSION['msg-success'])?>
                    </div>
                    <?php } ?>


                    <?php if(isset($_SESSION['msg-danger'])) {?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $_SESSION['msg-danger'];
                        unset ($_SESSION['msg-danger'])?>
                    </div>
                    <?php } ?>
                    <div class="card">
                        <div class="card-body">
                            <form method="POST">
                                <div class="form-group">
                                    <label for="nome">Nome:</label>
                                    <input type="text" class="form-control" id="nome" name="nome" required>
                                </div>
                                <div class="form-group">
                                    <label for="idade">Idade:</label>
                                    <input type="number" class="form-control" id="idade" name="idade" required>
                                </div>
                                <div class="form-group">
                                    <label for="cpf">CPF:</label>
                                    <input type="text" class="form-control" id="cpf" name="cpf" required>
                                </div>
                                <div class="form-group">
                                    <label>Sexo:</label>
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" id="sexoM" name="sexo" value="M"
                                            required>
                                        <label class="form-check-label" for="sexoM">Masculino</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" id="sexoF" name="sexo" value="F"
                                            required>
                                        <label class="form-check-label" for="sexoF">Feminino</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="telefone">Telefone:</label>
                                    <input type="text" class="form-control" id="telefone" name="telefone" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">E-mail:</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>
                                <div class="form-group">
                                    <label for="senha">Senha:</label>
                                    <input type="password" class="form-control" id="senha" name="senha" required>
                                </div>
                                <button type="submit" name="cadastrar" class="btn btn-primary">Cadastrar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>