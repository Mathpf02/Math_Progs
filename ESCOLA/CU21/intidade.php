<?php
require 'pdo.php';
require 'funcao.php';
$tipo = isset($_GET ['tipo']) ? $_GET ['tipo']:null;
$nome_C = getChave($tipo);
$chave = isset($_GET['chave']) ? $_GET['chave']:null;
$nome = '';

if(is_null($chave)) {
    $sql_= $pdo-> query("SELECT * FROM $tipo WHERE $nome_C=$chave");
    $nome = $sql_-> fetchColumn(1);
}