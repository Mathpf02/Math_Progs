<?php
session_start();
require_once 'Usuario.php';
$user_ = new Usuario();
$user_ant = $user_->pdo->query("SELECT * FROM usuarios WHERE id=".$_SESSION['id_user_'])->fetch_assoc();
if (isset($_POST['nome'])) {
    $nome = $user_->pdo->escape_string($_POST['nome']);
} else {
    $nome = null;
}
if (isset($_POST['email'])) {
    $email = $user_->pdo->escape_string($_POST['email']);
} else {
    $email = null;
}
if (isset($_POST['telefone'])) {
    $telefone = $user_->pdo->escape_string($_POST['telefone']);
} else {
    $telefone = null;
}
if (isset($_POST['senha_a'])) {
    $senha = $_POST['senha_n'];
    $senha_atual = $_POST['senha_a'];
} else {
    $senha = null;
    $senha_atual = null;
}
if (isset($_FILES['img'])) {
    //colocar o upload de arquivo
    $up = true;
    $local = '../../imgs_users/';
    if (getimagesize($_FILES['img']['tmp_name']) == false) {
        $up = false;
        $_SESSION['mensagem'] = 'O arquivo inserido não é uma imagem.';
        $_SESSION['error'] = true;
        header('location:../../../paginas/inicial.php');
        die;
    } else {
        $extensao = explode("/", getimagesize($_FILES['img']['tmp_name'])['mime'])[1];
    }
    $novoNome = bin2hex(random_bytes(20)) . '.' . $extensao;
    if ($_FILES['img']['size'] > 20971520) {
        $up = false;
        $_SESSION['mensagem'] = 'Por favor insira uma imagem menor que 20MB.';
        $_SESSION['error'] = true;
        header('location:../../../paginas/inicial.php');
        die;
    }
    if (getimagesize($_FILES['img']['tmp_name'])[2] != IMAGETYPE_JPEG && getimagesize($_FILES['img']['tmp_name'])[2] != IMAGETYPE_JPEG2000 && getimagesize($_FILES['img']['tmp_name'])[2] != IMAGETYPE_PNG && getimagesize($_FILES['img']['tmp_name'])[2] != IMAGETYPE_BMP &&  getimagesize($_FILES['img']['tmp_name'])[2] != IMAGETYPE_GIF) {
        $up = false;
        $_SESSION['mensagem'] = 'O sistema aceita apenas formato gif, png, jpeg, jpg e jfif para solicitação de jogos.';
        $_SESSION['error'] = true;
        header('location:../../../paginas/inicial.php');
        die;
    }
    $upload = true;
} else {
    $imagem = null;
    $upload = false;
}
if ($upload) {
    //colocar uma verificação diferente
    
    if (unlink($local . $user_ant['img']) AND move_uploaded_file($_FILES['img']['tmp_name'], $local . $novoNome) AND $user_->user_edit($nome, $senha, $senha_atual, $email, $telefone, $novoNome)) {
        
        header('location:../../../paginas/inicial.php');
    } else {
        $_SESSION['mensagem'] .= "<br>Não foi possivel cadastrar a imagem.";
        $_SESSION['error'] = true;
        header('location:../../../paginas/inicial.php');
    }
} elseif ($user_->user_edit($nome, $senha, $senha_atual, $email, $telefone, $imagem)) {
    header('location:../../../paginas/inicial.php');
} else {
    header('location:../../../paginas/inicial.php');
}
