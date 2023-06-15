<?php
    require_once('config.php');
    require_once('session.php');
    require_once('functions.php');
    
    logout();
    user_status();
    $status = $_SESSION["status"];
    pagina_proibida($status, $conn);

    if(isset($_POST['cadastrar'])){
        cadastrar_medico($conn, $_POST);
    }
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Cadastro de Médico</title>
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
                    <h1>Cadastro de Médico</h1>
                    <div class="card">
                        <div class="card-body">
                            <form method="POST">
                                <div class="form-group">
                                    <label for="nome">Nome:</label>
                                    <input type="text" class="form-control" id="nome" name="nome" required>
                                </div>
                                <div class="form-group">
                                    <label for="crm">CRM:</label>
                                    <input type="text" class="form-control" id="crm" name="crm" required>
                                </div>
                                <div class="form-group">
                                    <label for="telefone">Telefone:</label>
                                    <input type="text" class="form-control" id="telefone" name="telefone" required>
                                </div>
                                <div class="form-group">
                                    <label for="especialidade">Especialidade:</label>
                                    <input type="text" class="form-control" id="especialidade" name="especialidade"
                                        required>
                                </div>
                                <button type="submit" name="cadastrar" class="btn btn-primary">Cadastrar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
