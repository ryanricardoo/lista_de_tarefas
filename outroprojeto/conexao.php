<?php

$hostname = "localhost";
$user = "root";
$pass = "";
$dbname = "projeto_web";

$conexao = new mysqli($hostname, $user, $pass, $dbname);
if(!$conexao){
	die("Houve Erro: ".mysqli_connect_error());
	}
?>