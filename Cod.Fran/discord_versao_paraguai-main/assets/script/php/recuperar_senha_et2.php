<?php 
session_start();
require_once 'conect.php';
$email = $pdo->escape_string($_POST['email']);
$token = $pdo->escape_string($_POST['token']);
$senha = password_hash($pdo->escape_string($_POST['senha']), PASSWORD_DEFAULT);

$verify = $pdo->query("SELECT * FROM list_senha_reset WHERE email='" . $email . "' AND token='" . $token . "'")->fetch_assoc();

if(!is_null($verify)) {
    $hoje = new DateTime();
    $dataExpiracao = new DateTime($verify['data_expiracao']);
    if ($hoje < $dataExpiracao) {
        if($verify['usado'] == 0) {
            $upt = $pdo->query("UPDATE usuarios SET senha='" . $senha . "' WHERE email='" . $email . "'");
            if($upt) {
                $updt_pedido = $pdo->query("UPDATE list_senha_reset SET usado=1 WHERE email='" . $email . "' AND token='" . $token . "'");
                if($updt_pedido) {
                    $_SESSION['error'] = false;
                    $_SESSION['mensagem'] = "Senha redefinida com sucesso!";
                    header("location:../../../index.php");
                    die;
                } else {
                    echo "Reinicie a página.";
                }
            } else {
                $_SESSION['error'] = true;
                $_SESSION['mensagem'] = "Erro ao redefinir a senha.";
                header('location:../../../paginas/recuperar_senha.php');
                die;
            }
        }
    } else {
        $_SESSION['mensagem'] = "O pedido de recuperar senha expirou. Solicita de novo ai, duvido.";
        $_SESSION['error'] = true;
        header('location:../../../paginas/recuperar_senha.php');
        die;
    }
} else {
    $_SESSION['error'] = true;
    $_SESSION['mensagem'] = "O pedido de refinir senha não é valido.";
    header('location:../../../paginas/recuperar_senha.php');
    die;
}