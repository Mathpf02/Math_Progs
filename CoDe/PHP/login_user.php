<?php
session_start();

$matricula = $_POST['matri'];
$senha = $_POST['senha'];
$senhaMD5 = md5($senha);

require_once "conexao.php";

$sql = "SELECT * FROM cad_code WHERE matricula='$matricula'";
$resultSet = mysqli_query($conexao, $sql);
$usuario = mysqli_fetch_assoc($resultSet);
//var_dump($usuario);die;
if (is_null($usuario)) {
    $_SESSION['mensagem'] = "Usuário informado não existe";
    header("Location: login.php");
} else if ($senhaMD5 == $usuario['senha']) {
    $_SESSION['matricula'] = $usuario['matricula'];
    header("Location: Sist_Princio/inicio.php");
} else {
    $_SESSION['mensagem'] = "Senha inválida!";
    header("Location: login.php");
}