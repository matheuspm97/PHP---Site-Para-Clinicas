<?php
    require_once('config.php');
    require_once('session.php');
    require_once('functions.php');
    
    logout();
    user_status();
    $status = $_SESSION["status"];
    pagina_proibida($status, $conn);

    $filterNome = isset($_GET['nome']) ? $_GET['nome'] : '';
    $filterCrm = isset($_GET['crm']) ? $_GET['crm'] : '';
    $filterEspecialidade = isset($_GET['especialidade']) ? $_GET['especialidade'] : '';
    // Chame a função buscar_medicos_filtrados passando os filtros como argumentos
    $medicos = buscar_medicos_filtrados($conn, $filterNome, $filterCrm, $filterEspecialidade);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Médicos</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<?php include('navbar.php'); ?>
    <div class="container-fluid">
        <div class="row">
        <?php include('navbarlateral.php'); ?>

            <!-- Content Area -->
            <div class="col-md-9">
                <div class="container mt-5">
                <h1>Lista de Médicos</h1>

<form method="GET" class="mb-3">
    <div class="form-row">
        <div class="col">
            <input type="text" class="form-control" name="nome" placeholder="Nome" value="<?php echo $filterNome; ?>">
        </div>
        <div class="col">
            <input type="text" class="form-control" name="crm" placeholder="CRM" value="<?php echo $filterCrm; ?>">
        </div>
        <div class="col">
            <input type="text" class="form-control" name="especialidade" placeholder="Especialidade" value="<?php echo $filterEspecialidade; ?>">
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-primary">Filtrar</button>
</div>
            <div class="col-auto">
                        <a href="cadastrar_medico.php" class="btn btn-success">Novo</a>
    </div>
    </div>
        
    </div>
</form>

<table class="table">
    <thead>
        <tr>
            <th>Nome</th>
            <th>CRM</th>
            <th>Telefone</th>
            <th>Especialidade</th>
            <th>Ação</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($medicos as $medico): ?>
        <tr>
            <td><?php echo $medico['nome']; ?></td>
            <td><?php echo $medico['crm']; ?></td>
            <td><?php echo $medico['telefone']; ?></td>
            <td><?php echo $medico['especialidade']; ?></td>
            <td><a href="editar_medico.php?id=<?php echo $medico['id']; ?>" class="btn btn-outline-warning">Editar</a></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</div>
</div>
</div>
</div>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

