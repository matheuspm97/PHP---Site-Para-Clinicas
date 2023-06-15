<?php
require_once('config.php');
require_once('session.php');
require_once('functions.php');

logout();
user_status();
$status = $_SESSION["status"];
pagina_proibida($status, $conn);

processar_formulario($conn);
$medicos = buscar_medicos($conn);
$pacientes = buscar_pacientes($conn);
$procedimentos = buscar_procedimentos($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Marcar Consulta</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<?php include('navbar.php'); ?>
<div class="container-fluid">
        <div class="row">
        <?php include('navbarlateral.php'); ?>

            <div class="col-md-9">
                <div class="container mt-4">
                    <h1>Marcar Consulta</h1>
                    <?php if(isset($_SESSION['msg-success'])) {?>
                    <div class="alert alert-success" role="alert">
                    <?php echo $_SESSION['msg-success'];
                        unset ($_SESSION['msg-success'])?>
                        <?php } ?>
                        </div>
                        
                        <?php if(isset($_SESSION['msg-warning'])) {?>
                    <div class="alert alert-warning" role="alert">
                    <?php echo $_SESSION['msg-warning'];
                        unset ($_SESSION['msg-warning'])?>
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
                            <label for="medico">Médico:</label>
                            <select class="form-control" id="medico" name="medico">
                                <?php foreach ($medicos as $medico): ?>
                                    <option value="<?php echo $medico['id']; ?>"><?php echo $medico['nome']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="paciente">CPF do Paciente:</label>
                            <input type="text" class="form-control" id="paciente" name="paciente">
                        </div>
                        <div class="form-group">
                            <label for="horario">Horário:</label>
                            <input type="datetime-local" class="form-control" id="horario" name="horario">
                        </div>
                        <div class="form-group">
                            <label for="procedimento">Procedimento:</label>
                            <select class="form-control" id="procedimento" name="procedimento">
                                <?php foreach ($procedimentos as $procedimento): ?>
                                    <option value="<?php echo $procedimento['id']; ?>"><?php echo $procedimento['nome_procd']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
    <label for="exame">Exame:</label>
    <textarea type="text" class="form-control" id="nome_exame" name="nome_exame"></textarea>
</div>

                        <div class="form-group">
                            <label for="motivo">Motivo:</label>
                            <textarea class="form-control" id="motivo" name="motivo"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Marcar Consulta</button>
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


</div>
</div>
</div>
</body>
</html>