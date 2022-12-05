<?php 
session_start();
require_once 'Usuario.php';
$user_ = new Usuario();
$img_user = $user_->getImg($_SESSION['id_user_']);
if($user_->remove_user() AND unlink("../../imgs_users/".$img_user)) {
    if($user_->logout()) {
        session_start();
        $_SESSION['mensagem'] = "Conta deletada com sucesso.";
        $_SESSION['error'] = true;
        header('location:../../../index.php');
    } else {
        header('location:../../../index.php');
    }
} else {
    header('location:../../../index.php');
}