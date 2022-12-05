<?php
require 'pdo.php'

$nome = isset ($_POST['nome']) ? $_POST['nome']:NULL;
$matricula = isset ($_POST['matricula']) ? $_POST ['matricula'] : NULL;

if (!is_null($nome)) {
     $sql = "INSERT INTO demonios(nome) VALUE ('$nome')";
    if (!empty($matricula)){
         $sql = "UPDATE demonios SET nome='$nome' WHERE matricula='$matricula";
    }
    if(!pdo->exec($sql)){
         echo "NÃO HÁ CADASTRO!";
         exit();
    }
}
header('location:index.php');
?>