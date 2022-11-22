<?php 
session_start();
require_once 'Usuario.php';
$user = new Usuario();
if(!is_null($_POST)) {
    $email = $user->pdo->escape_string($_POST['email']);
    $senha = $user->pdo->escape_string($_POST['pass']);
    if($user->login($email, $senha)) {
        header('location:../../../paginas/inicial.php');
        die;
    } else {
        header('location:../../../');
        die;
    }
}