<?php
   require_once('config.php');
   require_once('session.php');
   require_once('functions.php');
   
   user_status();
   $status = $_SESSION["status"];
   pagina_proibida($status, $conn);
    
   $medico = editar_medico($conn);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Editar Médico</title>
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
                    <h1>Editar Médico</h1>
                    <div class="card">
                        <div class="card-body">
                            <form method="POST">
                            <input type="hidden" name="id" value="<?php echo $medico['id']; ?>">
                                <div class="form-group">
                                    <label for="nome">Nome:</label>
                                    <input type="text" class="form-control"  name="nome" value="<?php echo $medico['nome']; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="crm">CRM:</label>
                                    <input type="text" class="form-control"  name="crm" value="<?php echo $medico['crm']; ?>" required>
                                </div>                            
                                <div class="form-group">
                                    <label for="telefone">Telefone:</label>
                                    <input type="text" class="form-control"  name="telefone" value="<?php echo $medico['telefone']; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="especialidade">Especialidade:</label>
                                    <input type="text" class="form-control"  name="especialidade" value="<?php echo $medico['especialidade']; ?>" required>
                                </div>
                                <button type="submit" name="atualizar" class="btn btn-warning">Atualizar</button>
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