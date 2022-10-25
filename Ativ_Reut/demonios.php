<?php
require 'pdo.php';

$matricula = isset ($_POST['matricula']) ? $_POST ['matricula'] : NULL;
$nome = $_POST['nome'];
if(is_null ($matricula)){
    $sql_demonios = "SELECT*FROM alunos WHERE matricula=" . matricula;
    foreach($ndo->query($sql_demonios) as $res_demonios){
        $nome = $res_demonios['nome'];
        $matricula = is_null ($nome) ? NULL : $matricula;
    }
}