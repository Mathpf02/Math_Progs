<?php
require 'pdo.php';

$matricula = (integer) (isset($_GET['matricula'])?$_GET['matricula']:NULL);

$pdo->exec("DELETE FROM alunos WHERE matricula=$matricula");

header('Location:index.php');