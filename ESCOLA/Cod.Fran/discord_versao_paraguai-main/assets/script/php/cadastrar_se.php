<?php
session_start();
require_once 'Usuario.php';
$user = new Usuario();
$pdo = $user->pdo;
$nome = $pdo->escape_string($_POST['nome']);
$email = $pdo->escape_string($_POST['email']);
$telefone = $pdo->escape_string($_POST['tel']);
$senha = $pdo->escape_string($_POST['senha']);
$senha_C = $pdo->escape_string($_POST['senhaC']);
$img = $_FILES['imagem_u']['name'];
$seguir = true;
if ($senha  != $senha_C || ($senha == '' || $senha_C == '')) {
    $_SESSION['error'] = true;
    $_SESSION['mensagem'] = 'As senha não são iguais';
    header('../../../paginas/cadastrar_se.php');
    $seguir = false;
}
if ($nome == '') {
    $_SESSION['error'] = true;
    $_SESSION['mensagem'] = "Campo obrigatório faltando";
    header('../../../paginas/cadastrar_se.php');
    $seguir = false;
}
if ($telefone == '') {
    $_SESSION['error'] = true;
    $_SESSION['mensagem'] = "Campo obrigatório faltando";
    header('../../../paginas/cadastrar_se.php');
    $seguir = false;
}
if ($email == '') {
    $_SESSION['error'] = true;
    $_SESSION['mensagem'] = "Campo obrigatório faltando";
    header('../../../paginas/cadastrar_se.php');
    $seguir = false;
}
if ($img == '') {
    $_SESSION['error'] = true;
    $_SESSION['mensagem'] = "Campo obrigatório faltando";
    header('../../../paginas/cadastrar_se.php');
    $seguir = false;
}
if ($seguir) {
    $senha_l = $senha;
    $senha = password_hash($pdo->escape_string($_POST['senha']), PASSWORD_DEFAULT);
    var_dump(getimagesize($_FILES['imagem_u']['tmp_name']));
    
    
    $up = true;
    $local = '../../imgs_users/';
    if (getimagesize($_FILES['imagem_u']['tmp_name']) == false) {
        $up = false;
        $_SESSION['mensagem'] = 'O arquivo inserido não é uma imagem.';
        $_SESSION['error'] = true;
        header('location: ../../../paginas/cadastrar_se.php');
        die;
    } else {
        $extensao = explode("/", getimagesize($_FILES['imagem_u']['tmp_name'])['mime'])[1];
    }
    $novoNome = bin2hex(random_bytes(20)) . '.' . $extensao;
    if ($_FILES['imagem_u']['size'] > 20971520) {
        $up = false;
        $_SESSION['mensagem'] = 'Por favor insira uma imagem menor que 20MB.';
        $_SESSION['error'] = true;
        header('location: ../../../paginas/cadastrar_se.php');
        die;
    }
    if (getimagesize($_FILES['imagem_u']['tmp_name'])[2] != IMAGETYPE_JPEG && getimagesize($_FILES['imagem_u']['tmp_name'])[2] != IMAGETYPE_JPEG2000 && getimagesize($_FILES['imagem_u']['tmp_name'])[2] != IMAGETYPE_PNG && getimagesize($_FILES['imagem_u']['tmp_name'])[2] != IMAGETYPE_BMP &&  getimagesize($_FILES['imagem_u']['tmp_name'])[2] != IMAGETYPE_GIF) {
        $up = false;
        $_SESSION['mensagem'] = 'O sistema aceita apenas formato gif, png, jpeg, jpg e jfif para solicitação de jogos.';
        $_SESSION['error'] = true;
        header('location: ../../../paginas/cadastrar_se.php');
        die;
    }
    if ($up  && $user->creat_user($nome, $email, $telefone, $novoNome,  $senha)) {
        if (move_uploaded_file($_FILES['imagem_u']['tmp_name'], $local . $novoNome)) {
            if ($user->login($email, $senha_l)) {
                header('location: ../../../paginas/inicial.php');
            } else {
                header('location: ../../../paginas/cadastrar_se.php');
            }
        } else {
            $_SESSION['error'] = true;
            $_SESSION['mensagem'] = 'Não foi possivel cadastrar a imagem.';
            if ($user->login($email, $senha_l)) {
                header('location: ../../../paginas/inicial.php');
            } else {
                header('location: ../../../paginas/cadastrar_se.php');
            }
        }
    } else {
        header('location: ../../../paginas/cadastrar_se.php');
    }
} else {
    header('location: ../../../paginas/cadastrar_se.php');
    die;
}
// $senha = password_hash($pdo->escape_string($_POST['senha']), PASSWORD_DEFAULT);
