<?php
    require_once('config.php');
    require_once('session.php');
    require_once('functions.php');
    
    logout();
    user_status();
    $status = $_SESSION["status"];
    pagina_proibida($status, $conn);
    
    $filterId = isset($_GET['id']) ? $_GET['id'] : '';
    $filterNome = isset($_GET['nome']) ? $_GET['nome'] : '';
    $filterCpf = isset($_GET['cpf']) ? $_GET['cpf'] : '';
    
    // Chame a função buscar_pacientes_filtrados passando os filtros como argumentos
    $pessoas = buscar_pacientes_filtrados($conn, $filterId, $filterNome, $filterCpf);
    
    ?>
    
    <!DOCTYPE html>
<html>
<head>
    <title>Listar Pacientes</title>
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
                    <h1>Listar Pacientes</h1>
                    <?php if(isset($_SESSION['msg-success'])) {?>
                    <div class="alert alert-success" role="alert">
                    <?php echo $_SESSION['msg-success'];
                        unset ($_SESSION['msg-success'])?>
                        </div>
                        <?php } ?>
                    
                    <form class="form-inline mb-3">
                        <div class="form-group mr-2">
                            <input type="text" class="form-control" name="id" placeholder="ID" value="<?php echo $filterId; ?>">
                        </div>
                        <div class="form-group mr-2">
                            <input type="text" class="form-control" name="nome" placeholder="Nome" value="<?php echo $filterNome; ?>">
                        </div>
                        <div class="form-group mr-2">
                            <input type="text" class="form-control" name="cpf" placeholder="CPF" value="<?php echo $filterCpf; ?>">
                        </div>
                        <button type="submit" class="btn btn-primary">Filtrar</button>
                        <div>
                        <div class="col-md-9">
                        <a href="cadastrar_paciente.php" class="btn btn-success">Novo</a>
    </div>
    </div>
                    </form>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nome</th>
                                <th>CPF</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($pessoas as $pessoa): ?>
                                <tr>
                                    <td><?php echo $pessoa['id']; ?></td>
                                    <td><?php echo $pessoa['nome']; ?></td>
                                    <td><?php echo $pessoa['cpf']; ?></td>
                                    <td>
                                        <a href="editar_paciente.php?id=<?php echo $pessoa['id']; ?>" class="btn btn-outline-warning">Editar</a>
                                    </td>
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

