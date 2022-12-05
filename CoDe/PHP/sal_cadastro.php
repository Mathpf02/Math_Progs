<?php
session_start();
require_once "conexao.php";

$Matricula = $_POST['matri'];
$nome = $_POST['nome'];
$Email= $_POST['email'];
$Curso = $_POST['curso'];
$Fone = $_POST['fone'];
$senha = $_POST['senha'];
$F_perfil = $_POST['perfil'];

$senhaMD5 = md5($senha);

$sql = "INSERT INTO cad_code(matricula, nome, email, curso, fone, senha, f_perfil) " .
    "VALUES ('$Matricula', '$Nome', '$Email', '$Curso', '$F_perfil','$senhaMD5', '$F_perfil')";
$resultSet = mysqli_query($conexao, $sql);
if ($resultSet) {
    // pegar o id gerado
    $id = mysqli_insert_id($conexao);
    // colocar na sessão
    $_SESSION['id_pessoa'] = $id;
    // redirecionar para a página principal
    header("Location: inicio.html");
} else {
    $_SESSION['mensagem'] = 'Erro ao salvar o usuário no banco de dados! ' .
        mysqli_errno($conexao) . ": " . mysqli_error($conexao);
    header("Location: cadastro.php");
}
