<?php
require 'conexao.php';

$Matricula = mysqli_query($conexao, $_POST['matri']);
$Nome = mysqli_query($conexao, $_POST['nome']);
$Email = mysqli_query($conexao, $_POST['email']);
$Curso = mysqli_query($conexao, $_POST['curso']);
$Telefone = mysqli_query($conexao, $_POST['fone']);
$Senha = mysqli_query($conexao, $_POST['senha']);
$Perfil = mysqli_query($conexao, $_POST['perfil']);

$SenhaMD5 = md5($Senha);

// verificar disponibilidade
$sql = "SELECT * FROM cad_code where `matricula`=" . $Matricula;
if (mysqli_query($conexao, $sql)->num_rows > 0) {
    $_SESSION['mensagem'] = 'matricula em uso';
    header('Location: ');
}


$sql = "INSERT INTO cad_code (`matricula`, `nome`, `email`, `curso`, `fone`, `senha`, `f_perfil`)
VALUE ('$Matricula','$Nome','$Email','$Curso','$Telefone','$SenhaMD5','$Perfil')";

$verif = mysqli_query($conexao, $sql);

if (mysqli_query($conexao, $sql)) {
}
//puxar do formularios os inputs 
//verificar com um foreach se existe matriculas semhelantes a que foi puxada 
//criptografar a senha com passoword_hash
// password_hash($_POST['senha'], PASSWORD_DEFAULT);