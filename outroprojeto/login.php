<?php
require 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = $_POST["login"];
    $senha = $_POST["senha"];
    $verificar = "SELECT email, senha FROM atores WHERE email = ? AND senha = ?";
    $stmt = mysqli_prepare($conexao, $verificar);
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ss", $login, $senha);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        if (mysqli_stmt_num_rows($stmt) > 0) {
            header("Location: index.html");
            exit();
        } else {
            header("Location: login.html");
            exit();
        }
    } else {
        echo "Erro na preparação da consulta.";
    }
}
?>
