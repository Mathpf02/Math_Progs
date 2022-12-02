<?php
session_start();

require_once "funcoes.php";

// verificar se o email e token batem com banco
$email = $_GET['email'];
$token = $_GET['token'];

require_once "conexao.php";

$sql = "SELECT * FROM password_reset WHERE "
    . "email='$email' AND token='$token'";
$resultSet = mysqli_query($conexao, $sql);
$reset = mysqli_fetch_assoc($resultSet);
if (!is_null($reset)) {
    // verificar se jah está expirado
    $hoje = new DateTime();
    $dataExpiracao = new DateTime($reset['data_expiracao']);
    if ($hoje < $dataExpiracao) { // ainda é válida

        // continua...
    } else { // expirou o pedido de recuperação
        $_SESSION['mensagem'] = "Pedido de recuperação de senha expirado! "
            . "Realize o pedido de recuperação de senha novamente.";
    }
} else { // se não existe esse pedido de reset
    $_SESSION['mensagem'] = "Pedido de recuperação de senha inválido!";
}
// exibir o formulario de redefinição de senha
// encaminha para o arquivo que redefine a senha
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

            <form method="POST" action="" class="form" onsubmit="return validarSenha();">
            <div style="color: red;"><?= exibeMensagens() ?></div>
                <label for="senha">SENHA</label>
                <input type="password" name="email" id="senha" required>
                <label for="senha"> CONFIRMAR SENHA</label>
                <input type="password" name="rep_senha" id="rep_senha" required>

                <button type="submit"  href="../HTML/Inicio.html">SALVAR</button><br>
            </form>

    </div>
    <script type="text/javascript">
        function validarSenha() {
            senha = document.getElementsByName("senha")[0].value;
            repetirSenha = document.
            getElementsByName("repetirSenha")[0].value;
            if (senha == repetirSenha) {
                document.getElementsByName("repetirSenha")[0].
                setCustomValidity('');
                document.forms[0].submit;
            } else {
                document.getElementsByName("repetirSenha")[0].
                setCustomValidity('As senhas não conferem!');
                return false;
            }
        }
    </script>

</body>
</html>