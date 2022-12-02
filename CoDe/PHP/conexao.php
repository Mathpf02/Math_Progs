<?php
$host = "localhost"; // 127.0.0.1
$user = "root";
$pass = "";
$database = "code";
$conexao = mysqli_connect($host, $user, $pass, $database);

if ($conexao == false) {
    die("Erro ao conectar ao banco de dados. " . 
        "Erro: " . mysqli_connect_error());
}







