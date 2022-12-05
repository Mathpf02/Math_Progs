<?php 
    require_once "Usuario.php";
    session_start();
    $user = new Usuario();
    $user->logout();
    header('location: ../../../');
    die;
?>