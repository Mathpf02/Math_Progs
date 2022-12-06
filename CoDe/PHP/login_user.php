<?php
require_once 'conexao.php';
$matri = mysqli_real_escape_string($conexao, $_POST['matri']);
$pdo = mysqli_query($conexao, "SELECT * FROM cad_code WHERE matricula=" . $matri);
$pdo = mysqli_fetch_assoc($pdo);
if (is_null($pdo) or empty($pdo)) {
    $_SESSION['mensagem'] = 'O usuário não possui cadastro no sistema.';
    header('location: login.php');
} else {
    if (password_verify($_POST['senha'], $pdo['senha'])) {
        $_SESSION['matricula'] = $matri;
        header("location: ../HTML/Inicio.php");
        die;
    } else {
        $_SESSION['mensagem'] = 'Senha invalida.';
        header('location: login.php');
    }
}
