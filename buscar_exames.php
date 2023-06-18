<?php
require_once('config.php');
require_once('session.php');
require_once('funcoes_exame.php');

logout();
user_status();
$id = $_SESSION["id"];
$status = $_SESSION["status"];
$exames = getExames($conn, $id, $status);
clicarBotaoStatus($conn);
// Define os filtros iniciais vazios
$nomePaciente = "";
$nomeMedico = "";
$nomeExame = "";

$exames = filtrarExames($conn, $id, $status, $nomeExame, $nomePaciente, $nomeMedico, 'status_filtro');
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Exames</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <?php include('navbar.php'); ?>
        <div class="container-fluid">
            <div class="row">
                <?php include('navbarlateral.php'); ?>

                <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
                    <h1>Exames</h1>
                    <form method="POST" id="filtro-form" style="margin-bottom: 20px;">
                        <div class="form-row">
                            <div class="col">
                                <input type="text" name="nome_exame" class="form-control" placeholder="Nome do Exame"
                                    value="<?php echo $nomeExame; ?>">
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
                                <th>Nome do Exame</th>
                                <th>Nome do Paciente</th>
                                <th>Nome do Médico</th>
                                <th>Status</th>
                                <th>Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($exames as $exame): ?>
                            <tr class="tela-user-row">
                                <td><?php echo $exame['nome_exame']; ?></td>
                                <td><?php echo $exame['paciente_nome']; ?></td>
                                <td><?php echo $exame['medico_nome']; ?></td>
                                <td class="status-cell">
                                    <?php if ($exame['status'] == 1): ?>
                                    Pendente
                                    <?php elseif ($exame['status'] == 2): ?>
                                    Concluído
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if ($exame['status'] == 1 && $_SESSION['status'] == 2): ?>
                                    <form method="POST" style="display: inline-block;">
                                        <input type="hidden" name="id_exame" value="<?php echo $exame['id']; ?>">
                                        <button type="submit" name="alterar_status"
                                            class="btn btn-outline-success">Disponibilizar</button>
                                    </form>
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