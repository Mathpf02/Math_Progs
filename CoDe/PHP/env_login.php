<?php
session_start();

$Matricula = $_POST['matri'];
$Senha = $_POST['senha'];
$SenhaMD5 = md5($Senha);

require_once "conexao.php";

$sql = "SELECT * FROM cad_code WHERE matricula='$Matricula'";
$resultSet = mysqli_query($conexao, $sql);
$usuario = mysqli_fetch_assoc($resultSet);
//var_dump($usuario);die;
if (is_null($usuario)) {
    $_SESSION['mensagem'] = "Usuário informado não existe";
    header("Location: login.php");
} else if ($senhaMD5 == $usuario['senha']) {
    $_SESSION['id_pessoa'] = $usuario['id_pessoa'];
    header("Location: ../HTML/Incio.html");
} else {
    $_SESSION['mensagem'] = "Senha inválida!";
    header("Location: login.php");
}
