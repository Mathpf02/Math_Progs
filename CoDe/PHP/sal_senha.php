<?php
session_start();

require_once "conexao.php";
require_once "funcoes.php";

//verificar se o email e tolken batem com o banco
$email = mysqli_real_escape_string($conexao, $_POST['email']);
$token = $_POST['token'];
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);

$sql = "SELECT * FROM res_code WHERE email='$email' AND token='$token'";
$resultSet = mysqli_query($conexao, $sql);
$reset = mysqli_fetch_assoc($resultSet);
if (!is_null($reset)) {
    //verificar se já está expirado
    $hoje = new DateTime();
    $dataExpiracao = new DateTime($reset['dat_inspire']);
    if ($hoje < $dataExpiracao) { //ainda é válida
        //verificar se o pedido atual já foi usado
        if ($reset['usado'] == 0) { //não foi usado
            $senhaMD5 = md5($senha);
            $sql2 = "UPDATE cad_code SET senha='$senhaMD5' WHERE email='$email'";
            $resultSet = mysqli_query($conexao, $sql2);
            if ($resultSet) { //se gravou a senha
                $sql3 = "UPDATE res_code SET usado=1 WHERE email='$email' AND token='$token'";
                $resultSet = mysqli_query($conexao, $sql3);
                if ($resultSet) { //se gravou o usado=1
                    $_SESSION['mensagem'] = "Nova senha foi redefinida com sucesso!";
                    header("Location: login.php");
                    die;
                } else { //erro ao gravar o usado=1
                    $_SESSION['mensagem'] = "Erro ao gravar a nova senha no banco de dados. Erro:" . mysqli_errno($conexao) . ": " . mysqli_error($conexao);
                }
            } else { //erro ao gravar a nova senha no banco
                $_SESSION['mensagem'] = "Erro ao gravar a nova senha no banco de dados. Erro:" . mysqli_errno($conexao) . ": " . mysqli_error($conexao);
            }
        } else { //já foi usado
            $_SESSION['mensagem'] = "Pedido de recuperação de senha já foi usado! Realize o pedido de recuperação de senha novamente se deseja alterar a senha.";
        }
    } else { //expirou o pedido de recuperação
        $_SESSION['mensagem'] = "Pedido de recuperação de senha expirado! Realize o pedido de recuperação de senha novamente";
    }
} else { //se não existe esse pedido de reset
    $_SESSION['mensagem'] = "Pedido de recuperação de senha inválido";
}

header("Location: troca_senha.php?email=$email&token=$token");

//exibir o formulário de redefinição de senha
//encaminha para o arquivo que redefine a senha
