<?php
session_start();
require_once "conexao.php";

$Matricula = mysqli_real_escape_string($conexao, $_POST['matri']);
$Nome = mysqli_real_escape_string($conexao, $_POST['nome']);
$Email = mysqli_real_escape_string($conexao, $_POST['email']);
$Curso = mysqli_real_escape_string($conexao, $_POST['curso']);
$Telefone = mysqli_real_escape_string($conexao, $_POST['fone']);
$Senha = mysqli_real_escape_string($conexao, $_POST['senha']);


$SenhaMD5 = md5($Senha);

if (isset($_FILES['perfil'])) {

    $ext = strrchr($_FILES['perfil']['name'], '.');
    $nomeImagem = md5(time()) . $ext;
    $dir = "Up_Perfil/";
    move_uploaded_file($_FILES['perfil']['tmp_name'], $dir . $nomeImagem);
}

$sql = "INSERT INTO cad_code (`matricula`, `nome`, `email`, `curso`, `fone`, `senha`, `f_perfil`)
VALUE ('$Matricula','$Nome','$Email','$Curso','$Telefone','$SenhaMD5','$nomeImagem')";
$resultSet = mysqli_query($conexao, $sql);
if ($resultSet) {
    // pegar o id gerado
    $id = mysqli_insert_id($conexao);
    // colocar na sessão
    $_SESSION['id_pessoa'] = $id;
    // redirecionar para a página principal
    header("Location: login.php");
} else {
    $_SESSION['mensagem'] = 'Erro ao salvar o usuário no banco de dados! ' .
        mysqli_errno($conexao) . ": " . mysqli_error($conexao);
    header("Location: cadastro.php");
}
