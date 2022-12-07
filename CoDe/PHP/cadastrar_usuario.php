<?php

require_once "conexao.php";

$Matricula = mysqli_real_escape_string($conexao, $_POST['matri']);
$Nome = mysqli_real_escape_string($conexao, $_POST['nome']);
$Email = mysqli_real_escape_string($conexao, $_POST['email']);
$Curso = mysqli_real_escape_string($conexao, $_POST['curso']);
$Telefone = mysqli_real_escape_string($conexao, $_POST['fone']);
$Senha = mysqli_real_escape_string($conexao, $_POST['senha']);
$Perfil = mysqli_real_escape_string($conexao, $_POST['perfil']);

$SenhaMD5 = md5($Senha);

// verificar disponibilidade
/*$sql = "SELECT * FROM cad_code WHERE matricula = " . $Matricula;
if (mysqli_query($conexao, $sql)->num_rows > 0) {
    $_SESSION['mensagem'] = 'Matricula em uso';
    header('Location: ');
}*/


$sql2 = "INSERT INTO cad_code (`matricula`, `nome`, `email`, `curso`, `fone`, `senha`, `f_perfil`)
VALUE ('$Matricula','$Nome','$Email','$Curso','$Telefone','$SenhaMD5','$Perfil')";
$resultado = mysqli_query($conexao, $sql2);

if($resultado) {

    //colocar na sessão
    $_SESSION['matri'] = $Matricula;
    $_SESSION['nome'] = $Nome;

    $_SESSION['mensagem'] = "Novo usuário cadastrado com sucesso!";
    header("Location: login.php");
    
} else {
    $_SESSION['mensagem'] = 'Erro ao salvar o usuário no banco de dados! ' .
        mysqli_errno($conexao) . ": " . mysqli_error($conexao);
    header("Location: cadastro.php");
}
//puxar do formularios os inputs 
//verificar com um foreach se existe matriculas semhelantes a que foi puxada 
//criptografar a senha com passoword_hash
// password_hash($_POST['senha'], PASSWORD_DEFAULT);