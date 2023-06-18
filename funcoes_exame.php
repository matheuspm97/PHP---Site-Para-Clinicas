<?php
require_once('config.php');
require_once('functions.php');

function getExames($conn, $id, $status) {// Função para obter exames de acordo com o status do usuário

    if ($status == 1) {
        $sql = "SELECT c.*, p.nome AS paciente_nome, m.nome AS medico_nome
                FROM exame c 
                JOIN Pessoa p ON c.id_pessoa = p.id 
                JOIN Medico m ON c.medico_resp = m.id
                WHERE c.id_pessoa = $id";
    } else if ($status == 2) {
        $sql = "SELECT c.*, p.nome AS paciente_nome, m.nome AS medico_nome
                FROM exame c 
                JOIN Pessoa p ON c.id_pessoa = p.id 
                JOIN Medico m ON c.medico_resp = m.id";
    }
    $result = mysqli_query($conn, $sql);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

function atualizarStatusExame($conn, $exame_id, $status) {// Função para atualizar o status do exame
    if ($status == "pendente") {
        $status_atualizado = 1;
    } else if ($status == "concluido") {
        $status_atualizado = 2;
    }

    $sql = "UPDATE Exame SET status = $status_atualizado WHERE id = $exame_id";
    if (mysqli_query($conn, $sql)) {
        header("Location: buscar_exames.php");
        exit();
    } else {
        echo "Erro ao atualizar status do exame: " . mysqli_error($conn);
    }
}

function clicarBotaoStatus($conn){ //verifica se botao de status foi clicado e atualiza status do exame
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['alterar_status'])) {
            $exame_id = $_POST['id_exame'];
            atualizarStatusExame($conn, $exame_id, "concluido");
        }
    }
}

Function filtrarExames($conn, $id, $status, $nomeExame, $nomePaciente, $nomeMedico, $statusFiltro){
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Verifica se o botão de filtrar foi clicado
        if (isset($_POST['filtrar'])) {
            // Obtém os valores dos filtros
            $nomePaciente = $_POST['nome_paciente'];
            $nomeMedico = $_POST['nome_medico'];
            $nomeExame = $_POST['nome_exame'];
        }
    }
    
    // Monta a query de busca com os filtros
    $sql = "SELECT c.*, p.nome AS paciente_nome, m.nome AS medico_nome
            FROM Exame c 
            JOIN Pessoa p ON c.id_pessoa = p.id 
            JOIN Medico m ON c.medico_resp = m.id";
            
    
    // Adiciona os filtros à query
    if ($status == 1) {
        $sql .= " WHERE c.id_pessoa = $id";
    }
    
    if (!empty($nomeExame)) {
        $sql .= " AND c.nome_exame LIKE '%$nomeExame%'";
    }
    
    if (!empty($nomePaciente)) {
        $sql .= " AND p.nome LIKE '%$nomePaciente%'";
    }
    if (!empty($nomeMedico)) {
        $sql .= " AND m.nome LIKE '%$nomeMedico%'";
    }
    
    // Verifica se o botão de filtrar por status foi clicado
    
    // Executa a query
    $result = mysqli_query($conn, $sql);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

?>
