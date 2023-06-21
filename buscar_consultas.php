<?php
require_once('config.php');
require_once('session.php');
require_once('funcoes_consulta.php');

logout();
user_status();
$id = $_SESSION["id"];
$status = $_SESSION["status"];
$consultas = getConsultas($conn, $id, $status);
clicarBotaoStatus($conn);
// Define os filtros iniciais vazios
$nomePaciente = "";
$nomeMedico = "";
$dataConsulta="";

$consultas = filtrarConsultas($conn, $id, $status, $nomePaciente, $nomeMedico, 'status_filtro', $dataConsulta);
?>

<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Consultas</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="style.css">
    </head>

    <body>
        <?php include('navbar.php'); ?>
        <div class="container-fluid">
            <div class="row">
                <?php include('navbarlateral.php'); ?>

                <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
                    <h1>Consultas Cadastradas</h1>
                    <form method="POST" style="margin-bottom: 20px;">
                        <div class="form-row">
                            <div class="col">
                                <input type="date" name="data_consulta" class="form-control"
                                    value="<?php echo $horario; ?>">
                            </div>
                            <div class="col">
                                <input type="text" name="nome_paciente" class="form-control"
                                    placeholder="Nome do Paciente" value="<?php echo $nomePaciente; ?>">
                            </div>
                            <div class="col">
                                <input type="text" name="nome_medico" class="form-control" placeholder="Nome do Médico"
                                    value="<?php echo $nomeMedico; ?>">
                            </div>
                            <div class="col">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" role="switch" id="filter_btn">
                                    <label class="form-check-label" for="filter_btn">
                                        <span class="slider text-center" id="slider_text">off</span>
                                    </label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="d-flex">
                                    <button type="submit" name="filtrar" class="btn btn-primary">Filtrar</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Data</th>
                                <th>Paciente</th>
                                <th>Médico</th>
                                <th>Status</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($consultas as $consulta): ?>
                            <tr class="tela-user-row">
                                <td><?php echo date('d/m/Y H:i', strtotime($consulta['horario'])); ?></td>
                                <td><?php echo $consulta['paciente_nome']; ?></td>
                                <td><?php echo $consulta['medico_nome']; ?></td>
                                <td class="status-cell">
                                    <?php if ($consulta['status'] == 1): ?>
                                    Agendada
                                    <?php elseif ($consulta['status'] == 0): ?>
                                    Cancelada
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if ($consulta['status'] == 1 && $_SESSION['status'] == 1): ?>
                                    <form method="POST" style="display: inline-block;">
                                        <input type="hidden" name="consulta_id" value="<?php echo $consulta['id']; ?>">
                                        <button type="submit" name="cancelar_consulta"
                                            class="btn btn-outline-danger">Cancelar</button>
                                    </form>
                                    <?php elseif ($_SESSION['status'] == 2): ?>
                                    <?php if ($consulta['status'] == 1): ?>
                                    <form method="POST" style="display: inline-block;">
                                        <input type="hidden" name="consulta_id" value="<?php echo $consulta['id']; ?>">
                                        <button type="submit" name="cancelar_consulta"
                                            class="btn btn-outline-danger">Cancelar</button>
                                    </form>
                                    <?php else: ?>
                                    <form method="POST" style="display: inline-block;">
                                        <input type="hidden" name="consulta_id" value="<?php echo $consulta['id']; ?>">
                                        <button type="submit" name="reativar_consulta"
                                            class="btn btn-outline-primary">Reativar</button>
                                    </form>
                                    <?php endif; ?>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </main>
            </div>
        </div>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

        <script src="./script.js"></script>
    </body>

</html>