<?php
session_start();
require_once "../conexao.php";

$Perg_1 = mysqli_real_escape_string($conexao, $_POST['Perg_1']);
$Perg_2 = mysqli_real_escape_string($conexao, $_POST['Perg_2']);

if (isset($_FILES['documento'])) {

    $ext = strrchr($_FILES['documento']['name'], '.');
    $F_Documento = md5(time()) . $ext;
    $dir = "Up_Documento/";
    move_uploaded_file($_FILES['documento']['tmp_name'], $dir . $F_Documento);
}

$sql = "INSERT INTO `emp_code`(`disp_Tec`, `liber_Uti`, `f_documento`) 
VALUES ('$Perg_1','$Perg_2','$F_Documento')";
$resultSet = mysqli_query($conexao, $sql);
if ($resultSet) {
    // pegar o id gerado
    $id = mysqli_insert_id($conexao);
    // colocar na sessão
    $_SESSION['id_pessoa'] = $id;
    // redirecionar para a página principal
    header("Location: inicio.php");
} else {
    $_SESSION['mensagem'] = 'Erro ao salvar o usuário no banco de dados! ' .
        mysqli_errno($conexao) . ": " . mysqli_error($conexao);
    header("Location: emprestimo.php");
}