<?php
   require_once('config.php');
   require_once('session.php');
   require_once('functions.php');
   
   user_status();
   $status = $_SESSION["status"];
   pagina_proibida($status, $conn);

   $pessoa = editar_paciente($conn);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Editar Pessoa</title>
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
                    <h1>Editar Pessoa</h1>
                    <div class="card">
                        <div class="card-body">
                            <form method="POST">
                                <div class="form-group">
                                    <label for="nome">Nome:</label>
                                    <input type="text" class="form-control" name="nome" value="<?php echo $pessoa['nome']; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="idade">Idade:</label>
                                    <input type="number" class="form-control" name="idade" value="<?php echo $pessoa['idade']; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="cpf">CPF:</label>
                                    <input type="text" class="form-control" name="cpf" value="<?php echo $pessoa['cpf']; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label>Sexo:</label>
                                    <div class="form-check">
                                    <input type="radio" class="form-check-input" name="sexo" value="M" <?php if($pessoa['sexo'] == 'M') echo 'checked'; ?> required>Masculino
                                    </div>
                                    <div class="form-check">
                                    <input type="radio" class="form-check-input" name="sexo" value="F" <?php if($pessoa['sexo'] == 'F') echo 'checked'; ?> required>Feminino
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="telefone">Telefone:</label>
                                    <input type="text" class="form-control" name="telefone" value="<?php echo $pessoa['telefone']; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">E-mail:</label>
                                    <input type="email" class="form-control" name="email" value="<?php echo $pessoa['email']; ?>" required>
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