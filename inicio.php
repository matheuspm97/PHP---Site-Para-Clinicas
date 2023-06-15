<?php
require_once('config.php');
require_once('session.php');
require_once('functions.php');

login();
logout();
?>



<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Página Inicial</title>
    </head>
    <style>
    .card {
        height: 100%;
    }
    </style>
    <body>
    <?php include('navbar.php'); ?>
        <br>
        <br>
        <h1 class="text-center">Selecione uma das opções abaixo:</h1>
        <br>
        <br>
        <br>


        <div class="container row mx-auto g-4">
        <?php if ($_SESSION['status'] == 2): ?>

            <div class="col-6 col-lg-3 col-md-4 col-xxl-2">
                <div class="card">
                <div class="card-body position-relative d-flex flex-column" >
                <h5 class="text-center">Novo Funcionário</h5>
                <p class="card-text">Cadastro de novos funcionários,concedendo permissão total as telas do sistema.</p>
                <a href="cadastrar_funcionario.php" class="btn btn-dark">Acessar</a>
                </div>
                </div>
            </div>

            <div class="col-6 col-lg-3 col-md-4 col-xxl-2">
                <div class="card">
                <div class="card-body position-relative d-flex flex-column" >
                <h5 class="text-center">Pacientes</h5>
                <p class="card-text">Mostra todos pacientes cadastradros no sistema, alem de permitir editar e criar novos pacientes.</p>
                <a href="listar_paciente.php" class="btn btn-dark">Acessar</a>
                </div>
                </div>
            </div>

            <div class="col-6 col-lg-3 col-md-4 col-xxl-2">
                <div class="card">
                <div class="card-body position-relative d-flex flex-column" >
                <h5 class="text-center">Médicos</h5>
                <p class="card-text">Mostra todos médicos cadastradros no sistema, alem de permitir editar e criar novos médicos.</p>
                <a href="listar_medico.php" class="btn btn-dark">Acessar</a>
                </div>
                </div>
            </div>

            <div class="col-6 col-lg-3 col-md-4 col-xxl-2">
                <div class="card">
                <div class="card-body position-relative d-flex flex-column" >
                <h5 class="text-center">Agendar Consulta</h5>
                <p class="card-text">Permite o agendamento de novas consultas, disponibilizando a mesma para o paciente.</p>
                <a href="marcar_consulta.php" class="btn btn-dark">Acessar</a>
                </div>
                </div>
            </div>

            <div class="col-6 col-lg-3 col-md-4 col-xxl-2">
                <div class="card">
                <div class="card-body position-relative d-flex flex-column" >
                <h5 class="text-center">Procedimentos</h5>
                <p class="card-text">Permite o cadastro de novos procedimentos dentro do sistema e indicar a necessidade de exame.</p>
                <a href="cadastro_procedimento.php" class="btn btn-dark">Acessar</a>
                </div>
                </div>
            </div>
            <?php endif; ?>

            <div class="col-6 col-lg-3 col-md-4 col-xxl-2">
                <div class="card">
                <div class="card-body position-relative d-flex flex-column" >
                <h5 class="text-center">Exames</h5>
                <p class="text-center">Lista todos os exames cadastrados, e se o status do mesmo, indisponivel ou concluído</p>
                <a href="buscar_exames.php" class="btn btn-dark">Acessar</a>
                </div>
                </div>
            </div>

            <div class="col-6 col-lg-3 col-md-4 col-xxl-2">
                <div class="card">
                <div class="card-body position-relative d-flex flex-column" >
                <h5 class="text-center">Consultas</h5>
                <p class="card-text">Mostra todas suas consultas dentro do sistema, permitindo cancelar uma consulta agendada.</p>
                <a href="buscar_consultas.php" class="btn btn-dark">Acessar</a>
                </div>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    </body>

</html>