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

$consultas = filtrarConsultas($conn, $id, $status, $nomePaciente, $nomeMedico, 'status_filtro');
?>

<!DOCTYPE html>
<html>

<head>
    <title>Consultas Cadastradas</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
    table {
        border-collapse: collapse;
        width: 100%;
    }

    th,
    td {
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }
    </style>
</head>

<body>
<?php include('navbar.php'); ?>
    <div class="container-fluid">
        <div class="row">
            <!-- Código do menu lateral omitido por brevidade -->
            <?php include('navbarlateral.php'); ?>

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
                <h1>Consultas Cadastradas</h1>
                <form method="POST" style="margin-bottom: 20px;">
                    <div class="form-row">
                        <div class="col">
                            <input type="text" name="nome_paciente" class="form-control" placeholder="Nome do Paciente"
                                value="<?php echo $nomePaciente; ?>">
                        </div>
                        <div class="col">
                            <input type="text" name="nome_medico" class="form-control" placeholder="Nome do Médico"
                                value="<?php echo $nomeMedico; ?>">
                        </div>
                        <div class="filter-btn-container">
                            <button id="filter-btn" class="btn" type="button" data-toggle="collapse"
                                data-target="#filter-options" aria-expanded="false" aria-controls="filter-options">
                                <span> Status</span>
                            </button>
                            <div id="filter-options" class="collapse">
                                <form method="POST">
                                    <div class="form-group">
                                        <select class="form-control" name="status_filtro" id="status_filtro">
                                            <option value="todo">Todos</option>
                                            <option value="agendada">Agendadas</option>
                                        </select>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col">
                            <button type="submit" name="filtrar" class="btn btn-primary">Filtrar</button>
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
                        <tr>
                            <td><?php echo date('d/m/Y H:i', strtotime($consulta['horario'])); ?></td>
                            <td><?php echo $consulta['paciente_nome']; ?></td>
                            <td><?php echo $consulta['medico_nome']; ?></td>
                            <td>
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

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>