<?php
require 'pdo.php';

$matricula = isset($_GET['matricula']) ? $_GET['matricula'] : NULL;
$nome = NULL;

if(!is_null($matricula)){
    $sql = "SELECT * FROM alunos WHERE matricula=$matricula";
    foreach($pdo->query($sql) as $resultado){
        $nome = $resultado['nome'];
        $matricula = is_null($nome) ? NULL : $matricula;
    }
}