<?php
require 'pdo.php';

$nome = isset($_POST['nome'])?$_POST['nome']:NULL;
$matricula = isset($_POST['matricula'])?$_POST['matricula']:NULL;

if(!is_null($nome)){
    $sql = "INSERT INTO alunos (nome) values ('$nome')";
    if(!empty($matricula)){
        $sql = "UPDATE alunos SET nome='$nome' WHERE matricula=$matricula";   
    }
    if(!$pdo->exec($sql)){
        echo 'Não conseguiu gravar o registro';
        exit();
    }
}
header('Location:index.php');