<?php
   require_once('config.php');
   require_once('session.php');
   require_once('functions.php');
   
   logout();
   user_status();
   $status = $_SESSION["status"];
   pagina_proibida($status, $conn);

   if(isset($_POST['cadastrar'])){
    cadastrar_procedimento($conn, $_POST);
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Cadastro de Procedimento</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
<?php include('navbar.php'); ?>
    <div class="container-fluid">
        <div class="row">
        <?php include('navbarlateral.php'); ?>

            <div class="col-md-9">
                <div class="container mt-4">
                    <h1>Cadastro de Procedimento</h1>

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


                    <form method="POST">
                        <div class="form-group">
                            <label for="nome_procedimento">Nome do Procedimento:</label>
                            <input type="text" class="form-control" id="nome_procedimento" name="nome_procedimento"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="exame">Exame:</label>
                            <select class="form-control" id="exame" name="exame" required>
                                <option value="1">Sim</option>
                                <option value="0">Não</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary" name="cadastrar">Cadastrar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>