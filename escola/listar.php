<?php
require 'pdo.php';

$resultados=$pdo->query('SELECT * FROM alunos');
$linhas = $resultados->fetchAll();

foreach($linhas as $linha){
    echo '<tr>';
    echo "<td> <a href=\"form.php?matricula={$linha['matricula']}\"> 
    {$linha['matricula']}</a></td>";
    echo "<td>{$linha['nome']}</td>";
    echo "<td> <a href=\"apagar.php?matricula={$linha['matricula']}\"> 
    Excluir</a></td>";
}