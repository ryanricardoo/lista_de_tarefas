<?php
session_start();
include 'conexao.php';
if(isset($_SESSION['cliente_id'])) {
    $cliente_id = $_SESSION['cliente_id'];
    $query = "SELECT id, email, empresa FROM atores WHERE id = ?";
    $stmt = mysqli_prepare($conexao, $query);
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $cliente_id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        if (mysqli_stmt_num_rows($stmt) > 0) {
            mysqli_stmt_bind_result($stmt, $id, $email, $empresa);
            mysqli_stmt_fetch($stmt);

            $perfil_info = array(
                'id' => $id,
                'email' => $email,
                'empresa' => $empresa
            );
            echo json_encode($perfil_info);
        } else {
            echo "Cliente não encontrado.";
        }
    } else {
        echo "Erro na preparação da consulta.";
    }
} else {
    echo "Cliente não autenticado.";
}
?>
