<?php
session_start();

echo '<meta charset="UTF-8">';
include "conecta.php";
$id= $_SESSION['matricula'];
$nome=$_POST['nome'];
$email=$_POST['email'];
$curso=$_POST['curso'];
$fone=$_POST['fone'];

$sql= "UPDATE cad_code SET nome='$nome', email='$email',curso='$curso',fone='$fone' WHERE matricula=$id";
$resultado= mysqli_query($conexao,$sql);
if (isset($_FILES['foto'])) {

    $ext = strrchr($_FILES['foto']['name'], '.');
    $nomeImagem = md5(time()) . $ext;
    $dir = "../Up_Perfil/";
    move_uploaded_file($_FILES['foto']['tmp_name'], $dir . $nomeImagem);
}
if($_FILES['foto']['error'] == 0){
$sql = "UPDATE `cad_code` SET nome='$nome', email='$email',curso='$curso',fone='$fone',f_perfil='$nomeImagem' WHERE matricula='$id'";
}else{
    $sql = "UPDATE `cad_code` SET nome='$nome', email='$email',curso='$curso',fone='$fone' WHERE matricula='$id'";
}

$resultado = mysqli_query($conexao,$sql);

mysqli_close($conexao);

if($resultado){
    header("Location:inicio.php");

}

/*
$imagem_antiga = mysqli_real_escape_string($conexao,$_POST['imagem_antiga']);

    if(isset($_FILES['imagem'])){

        $ext = strrchr($_FILES['imagem']['name'], '.');
        $nome = md5(time()).$ext;
        $dir = "imgs/";
    
        move_uploaded_file($_FILES['imagem']['tmp_name'], $dir.$nome);
    
    }
    if($ext != ""){
    
        $imagem = $dir.$nome;

        if($imagem_antiga != "imgs/sem-imagem.png"){unlink($imagem_antiga);}
    
    } else {
    
        $imagem = $imagem_antiga;
    
    } */
?>