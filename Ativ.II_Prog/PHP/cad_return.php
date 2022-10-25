<?php
include "conect.php";
$nome = $_POST['f_nome'];
$tele = $_POST['f_fone'];
$senha = $_POST['f_senha'];
$foto = $_FILES['f_perf']['name'];

$sql = "INSERT INTO 'usuario'('nome','fone','senha','perfil')
 VALUE ('$nome','$tele','$senha','$foto')";

if (mysqli_query($con, $sql)) {
    "$nome cadastrado com sucesso!";
} else {
    echo "$nome não cadastro corretamente!";
}
