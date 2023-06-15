<?php
// functions.php
require_once('config.php');


function login() {      // Verifica se o usuário está logado
    if (!isset($_SESSION['email'])) {
        header('Location: login.php');
        exit();
    }
}
function logout() {     // Verifica se o Botão de logout foi clicado
    if (isset($_POST['logout'])) {
        session_destroy();
        header('Location: login.php');
        exit();
    }
}

function user_status(){     //Verifica o status do usuario
    if (!isset($_SESSION["id"]) || !isset($_SESSION["status"])) {
    header("Location: login.php");
    exit;
}
}

function pagina_proibida($status, $conn) {      //Se staus user for =1 não tem acesso as telas de cadastro
    if ($status == 1) {
        header("Location: inicio.php");
        exit();
    }
    $sql = "SELECT * FROM pessoa";
    $result = mysqli_query($conn, $sql);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

function cadastrar_funcionario($conn, $dados) {
    $nome = mysqli_real_escape_string($conn, $dados['nome']);
    $idade = mysqli_real_escape_string($conn, $dados['idade']);
    $cpf = mysqli_real_escape_string($conn, $dados['cpf']);
    $sexo = mysqli_real_escape_string($conn, $dados['sexo']);
    $telefone = mysqli_real_escape_string($conn, $dados['telefone']);
    $email = mysqli_real_escape_string($conn, $dados['email']);
    $senha = mysqli_real_escape_string($conn, $dados['senha']);

        $sql = "INSERT INTO Pessoa (nome, idade, cpf, sexo, telefone, email, senha, status) 
                VALUES ('$nome', $idade, '$cpf', '$sexo', '$telefone', '$email', '$senha', 2)";
        
        if(mysqli_query($conn, $sql)){
            echo "<script>alert('Funcionario cadastrado com sucesso!');</script>";
            header('Location: inicio.php');
            exit();
        } else{
            echo "<script>alert('Erro ao cadastrar funcionario: ". mysqli_error($conn) ."');</script>";
        }
    }

function cadastrar_paciente($conn, $dados) {
        $nome = mysqli_real_escape_string($conn, $_POST['nome']);
        $idade = mysqli_real_escape_string($conn, $_POST['idade']);
        $cpf = mysqli_real_escape_string($conn, $_POST['cpf']);
        $sexo = mysqli_real_escape_string($conn, $_POST['sexo']);
        $telefone = mysqli_real_escape_string($conn, $_POST['telefone']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $senha = mysqli_real_escape_string($conn, $_POST['senha']);

        $sql = "INSERT INTO Pessoa (nome, idade, cpf, sexo, telefone, email, senha, status) 
                VALUES ('$nome', $idade, '$cpf', '$sexo', '$telefone', '$email', '$senha', 1)";
        
        if(mysqli_query($conn, $sql)){
            $_SESSION['msg-success']='Paciente cadastrado com sucesso!';
            header('Location: listar_paciente.php');
            exit();
        } else{
            $_SESSION['msg-danger']='Erro ao cadastrar paciente!';
        }
    }

function cadastrar_medico($conn, $dados){
    $nome = mysqli_real_escape_string($conn, $_POST['nome']);
    $crm = mysqli_real_escape_string($conn, $_POST['crm']);
    $telefone = mysqli_real_escape_string($conn, $_POST['telefone']);
    $especialidade = mysqli_real_escape_string($conn, $_POST['especialidade']);

    $sql = "INSERT INTO Medico (nome, crm, telefone, especialidade) 
            VALUES ('$nome', '$crm', '$telefone', '$especialidade')";
        
        if(mysqli_query($conn, $sql)){
        $mensagem = 'Médico salvo com sucesso!';
        header('Location: listar_medico.php');
        exit();
        } else{
            $mensagem = 'Erro ao salvar médico: ' . mysqli_error($conn);
        }
}

function cadastrar_procedimento($conn, $dados){
    $nome_procedimento = mysqli_real_escape_string($conn, $_POST['nome_procedimento']);
    $exame = mysqli_real_escape_string($conn, $_POST['exame']);

    $sql = "INSERT INTO Procedimento (nome_procd, exame) 
            VALUES ('$nome_procedimento', $exame)";
    
    if(mysqli_query($conn, $sql)){
        $_SESSION['msg-success']= 'Procedimento salvo com sucesso!';
        header('Location: cadastro_procedimento.php');
        exit();
    } else{
        $_SESSION['msg-danger']=  'Erro ao salvar procedimento: ' . mysqli_error($conn);
    } 
}

function editar_medico($conn) {
    if(isset($_POST['atualizar'])){
        $id = mysqli_real_escape_string($conn, $_POST['id']);
        $nome = mysqli_real_escape_string($conn, $_POST['nome']);
        $crm = mysqli_real_escape_string($conn, $_POST['crm']);
        $telefone = mysqli_real_escape_string($conn, $_POST['telefone']);
        $especialidade = mysqli_real_escape_string($conn, $_POST['especialidade']);

        $sql = "UPDATE Medico SET nome = '$nome', crm = '$crm', telefone = '$telefone', especialidade = '$especialidade' WHERE id = $id";

        if(mysqli_query($conn, $sql)){
            echo "<script>alert('Médico atualizado com sucesso!');</script>";
            header('Location: listar_medico.php');
            exit();
        } else{
            echo "<script>alert('Erro ao atualizar médico: ". mysqli_error($conn) ."');</script>";
        }
    } elseif(isset($_GET['id'])){
        $id = mysqli_real_escape_string($conn, $_GET['id']);

        $sql = "SELECT * FROM Medico WHERE id = $id";
        $result = mysqli_query($conn, $sql);
        $medico = mysqli_fetch_assoc($result);

        return $medico;
    } else{
        header('Location: listar_medico.php');
        exit();
    }
}

function editar_paciente($conn){
    if(isset($_GET['id'])){
        $id = mysqli_real_escape_string($conn, $_GET['id']);

        $sql = "SELECT * FROM Pessoa WHERE id = '$id'";
        $result = mysqli_query($conn, $sql);
        $pessoa = mysqli_fetch_assoc($result);

        if(!$pessoa){
            echo "<script>alert('Pessoa não encontrada!');</script>";
            header('Location: listar_pessoa.php');
            exit();
        }

        if(isset($_POST['atualizar'])){
            $nome = mysqli_real_escape_string($conn, $_POST['nome']);
            $idade = mysqli_real_escape_string($conn, $_POST['idade']);
            $cpf = mysqli_real_escape_string($conn, $_POST['cpf']);
            $sexo = mysqli_real_escape_string($conn, $_POST['sexo']);
            $telefone = mysqli_real_escape_string($conn, $_POST['telefone']);
            $email = mysqli_real_escape_string($conn, $_POST['email']);

            $sql = "UPDATE Pessoa SET nome = '$nome', idade = $idade, cpf = '$cpf', sexo = '$sexo', telefone = '$telefone', email = '$email' WHERE id = '$id'";

            if(mysqli_query($conn, $sql)){
                echo "<script>alert('Pessoa atualizada com sucesso!');</script>";
                header('Location: listar_paciente.php');
                exit();
            } else{
                echo "<script>alert('Erro ao atualizar pessoa: ". mysqli_error($conn) ."');</script>";
            }
        }

        return $pessoa;
    } else{
        header('Location: listar_paciente.php');
        exit();
    }
}

function buscar_medicos_filtrados($conn, $filterNome, $filterCrm, $filterEspecialidade) {
    $whereClause = "1";
    if (!empty($filterNome)) {
        $whereClause .= " AND nome LIKE '%$filterNome%'";
    }
    if (!empty($filterCrm)) {
        $whereClause .= " AND crm LIKE '%$filterCrm%'";
    }
    if (!empty($filterEspecialidade)) {
        $whereClause .= " AND especialidade LIKE '%$filterEspecialidade%'";
    }

    $sql = "SELECT * FROM Medico WHERE $whereClause";
    $result = mysqli_query($conn, $sql);
    $medicos = mysqli_fetch_all($result, MYSQLI_ASSOC);

    return $medicos;
}

function buscar_pacientes($conn) {
    $sql = "SELECT * FROM Pessoa WHERE status = 1 ORDER BY nome";
    $result = mysqli_query($conn, $sql);
    $pacientes = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $pacientes;
}

function buscar_pacientes_filtrados($conn, $filterId, $filterNome, $filterCpf) {
    $whereClause = "status = 1";
    if (!empty($filterId)) {
        $whereClause .= " AND id = '$filterId'";
    }
    if (!empty($filterNome)) {
        $whereClause .= " AND nome LIKE '%$filterNome%'";
    }
    if (!empty($filterCpf)) {
        $whereClause .= " AND cpf LIKE '%$filterCpf%'";
    }

    $sql = "SELECT * FROM Pessoa WHERE $whereClause";
    $result = mysqli_query($conn, $sql);
    $pessoas = mysqli_fetch_all($result, MYSQLI_ASSOC);

    return $pessoas;
}

function buscar_paciente_por_cpf($conn, $cpf) {
    $sql = "SELECT * FROM Pessoa WHERE cpf = '$cpf' AND status = 1";
    $result = mysqli_query($conn, $sql);
    $paciente = mysqli_fetch_assoc($result);
    return $paciente;
}

function marcar_consulta($conn, $medico_id, $paciente_id, $horario, $procedimento, $motivo, $nome_exame) {
    $sql = "INSERT INTO Consulta (medico_id, paciente_id, horario, procedimento, motivo) VALUES ('$medico_id', '$paciente_id', '$horario', '$procedimento', '$motivo')";
    if (mysqli_query($conn, $sql)) {
        $_SESSION['msg-success'] = "Consulta marcada com sucesso";
        $sql = "INSERT INTO Exame (nome_exame, id_pessoa, medico_resp) VALUES ('$nome_exame','$paciente_id','$medico_id')";
            
            if (mysqli_query($conn, $sql)) {
                $_SESSION['msg-success'].= " e exame criado com sucesso!"; 
            } else {
                $_SESSION['msg-danger']= "Erro ao marcar exame: " . mysqli_error($conn);
            }
        } else {
            $_SESSION['msg-danger']= "Erro ao marcar consulta: " . mysqli_error($conn);
        }
        header('Location: buscar_consultas.php');
    } 

function cancelarConsulta($conn, $consulta_id) {
    $sql = "UPDATE Consulta SET status = 'cancelada' WHERE id = $consulta_id";
    mysqli_query($conn, $sql);
    }
    
function reativarConsulta($conn, $consulta_id) {
    $sql = "UPDATE Consulta SET status = 1 WHERE id = $consulta_id";
    mysqli_query($conn, $sql);
    }

function processar_formulario($conn) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $medico_id = $_POST['medico'];
    $paciente_cpf = $_POST['paciente'];
    $horario = $_POST['horario'];
    $procedimento = $_POST['procedimento'];
    $nome_exame = $_POST['nome_exame'];
    $motivo = $_POST['motivo'];
    
    $paciente = buscar_paciente_por_cpf($conn, $paciente_cpf);
    if ($paciente) {
    $paciente_id = $paciente['id'];
    marcar_consulta($conn, $medico_id, $paciente_id, $horario, $procedimento, $motivo, $nome_exame);
    } else {
    header('Location: marcar_consulta.php');
    return $_SESSION['msg-warning'] = "Paciente não encontrado.";
    }
    }
    }


function buscar_medicos($conn) {
    $sql = "SELECT * FROM Medico";
    $result = mysqli_query($conn, $sql);
    $medicos = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $medicos;
    }
    
function buscar_procedimentos($conn) {
    $sql = "SELECT * FROM Procedimento";
    $result = mysqli_query($conn, $sql);
    $procedimentos = array();
    while ($row = mysqli_fetch_assoc($result)) {
    $procedimentos[] = $row;
    }
    return $procedimentos;
    }
?> 