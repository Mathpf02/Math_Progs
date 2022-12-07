<?php
session_start();

require_once "funcoes.php";
require_once "conexao.php";


//verificar se o email e token batem com o banco
$email = mysqli_real_escape_string($conexao, $_GET['email']);
$token = $_GET['token'];


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
            //continua pra página
        } else { //já foi usado
            $_SESSION['mensagem'] = "Pedido de recuperação de senha já foi usado! Realize o pedido de recuperação de senha novamente se deseja alterar a senha.";
        }
    } else { //expirou o pedido de recuperação
        $_SESSION['mensagem'] = "Pedido de recuperação de senha expirado! Realize o pedido de recuperação de senha novamente";
    }
} else { //se não existe esse pedido de reset
    $_SESSION['mensagem'] = "Pedido de recuperação de senha inválido";
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>CoDe: LOGIN</title>
    <link rel="stylesheet" href="../CSS/Prin_CoDe/St_Log.css">
</head>

<body>
    <div class="conteiner">
        <div class="esquerda">
            <div class="superior">
                <p>Sistema de</p>
                <strong>
                    <h2>EMPRESTIMO</h2>
                </strong>
            </div>

            <form method="POST" action="sal_senha.php" class="form" onsubmit="return validarSenha();">
                <div style="color: black;"><?= exibeMensagens() ?></div>
                <label for="senha">SENHA</label>
                <input type="hidden" value="<?= $_GET['token'] ?>" name="token">
                <input type="hidden" value="<?= $email ?>" name="email">
                <input type="password" name="senha" id="senha" required>
                <label for="senha"> CONFIRMAR SENHA</label>
                <input type="password" name="rep_senha" id="rep_senha" required>

                <button type="submit">SALVAR</button><br>
            </form>

        </div>
        <script type="text/javascript">
            function validarSenha() {
                senha = document.getElementsByName("senha")[0].value;
                repetirSenha = document.
                getElementsByName("rep_senha")[0].value;
                if (senha == repetirSenha) {
                    document.getElementsByName("rep_senha")[0].
                    setCustomValidity('');
                    document.forms[0].submit;
                } else {
                    document.getElementsByName("rep_senha")[0].
                    setCustomValidity('As senhas não conferem!');
                    return false;
                }
            }
        </script>

</body>

</html>