<?php
require_once('config.php');
require_once('functions.php');

function getConsultas($conn, $id, $status) {
    if ($status == 1) {
        $sql = "SELECT c.*, p.nome AS paciente_nome, m.nome AS medico_nome 
                FROM Consulta c 
                JOIN Pessoa p ON c.paciente_id = p.id 
                JOIN Medico m ON c.medico_id = m.id
                WHERE c.paciente_id = $id";
    } else if ($status == 2) {
        $sql = "SELECT c.*, p.nome AS paciente_nome, m.nome AS medico_nome 
                FROM Consulta c 
                JOIN Pessoa p ON c.paciente_id = p.id 
                JOIN Medico m ON c.medico_id = m.id";
    }
    
    $result = mysqli_query($conn, $sql);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

function atualizarStatusConsulta($conn, $consulta_id, $status) {        // Função para atualizar o status da consulta
    if ($status == "cancelada") {
        $status_atualizado = 0;
    } else if ($status == "reativar") {
        $status_atualizado = 1;
    }

    $sql = "UPDATE Consulta SET status = $status_atualizado WHERE id = $consulta_id";
    if (mysqli_query($conn, $sql)) {
        header("Location: buscar_consultas.php");
        exit();
    } else {
        echo "Erro ao atualizar status da consulta: " . mysqli_error($conn);
    }
}

function clicarBotaoStatus($conn){ //verifica se botao de status foi clicado e atualiza status da consulta
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['cancelar_consulta'])) {
            $consulta_id = $_POST['consulta_id'];
            atualizarStatusConsulta($conn, $consulta_id, "cancelada");
        } elseif (isset($_POST['reativar_consulta'])) {
            $consulta_id = $_POST['consulta_id'];
            atualizarStatusConsulta($conn, $consulta_id, "reativar");
        }
    }
}

Function filtrarConsultas($conn, $id, $status, $nomePaciente, $nomeMedico, $statusFiltro){
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Verifica se o botão de filtrar foi clicado
    if (isset($_POST['filtrar'])) {
        // Obtém os valores dos filtros
        $nomePaciente = $_POST['nome_paciente'];
        $nomeMedico = $_POST['nome_medico'];
    }
}

// Monta a query de busca com os filtros
    $sql = "SELECT c.*, p.nome AS paciente_nome, m.nome AS medico_nome
        FROM Consulta c 
        JOIN Pessoa p ON c.paciente_id = p.id 
        JOIN Medico m ON c.medico_id = m.id";

    if ($status == 1) {
    $sql .= " WHERE c.paciente_id = $id";
    }

    if (!empty($nomePaciente)) {
    $sql .= " AND p.nome LIKE '%$nomePaciente%'";
    }
    if (!empty($nomeMedico)) {
    $sql .= " AND m.nome LIKE '%$nomeMedico%'";
    }

    // Verifica se o botão de filtrar por status foi clicado
    /*if (isset($_POST['filtrar'])) {
    $statusFiltro = $_POST['status_filtro'];
    if ($statusFiltro == 'agendada') {
        $sql .= " AND c.status = 1";
    }
    }*/
    $result = mysqli_query($conn, $sql);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}
?>
