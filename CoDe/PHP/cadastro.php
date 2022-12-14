<?php
session_start();

// if (!isset($_SESSION['id_pessoa'])) {
//     $_SESSION['mensagem'] = "Você deve primeiro realizar o login.";
//     header("Location: index.php");
// }
require_once "funcoes.php";
require_once "conexao.php";
if (isset($_GET['id'])) {
    $idPessoa = mysqli_real_escape_string($conexao, $_GET['id']);
    $sql = "SELECT * FROM cad_code WHERE matri = $idPessoa";
    $resultSet = mysqli_query($conexao, $sql);
    $pessoa = mysqli_fetch_assoc($resultSet);
    $matricula = $pessoa['matri'];
    $nome = $pessoa['nome'];
    $email = $pessoa['email'];
    $telefone = $pessoa['fone'];
} else {
    $matricula = null;
    $nome = null;
    $email = null;
    $telefone = null;
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>CoDe: Cadastro</title>
    <link rel="stylesheet" href="../CSS/Prin_CoDe/St_cad.css">
</head>

<body>
    <div class="conteiner">

        <div class="superior">
            <p>Sistema de</p>
            <strong>
                <h2>CADASTRO</h2>
            </strong>
        </div>

        <div class="P_form">
            <form enctype="multipart/form-data" method="POST" action="env_cadastrar.php" class="form" onsubmit="return validarSenha();">
                <div style="color: black;"><?= exibeMensagens() ?></div>
                <div class="area_form">
                    <div class="form_1">
                        <div class="area_uput">
                            <label for="matri">MATRICULA</label>
                            <input type="text" class="input_text" name="matri" id="matri" value="<?= $matricula ?>"><br>
                        </div>
                        <div class="area_uput">
                            <label for="name">NOME</label>
                            <input type="text" class="input_text" name="nome" id="nome" value="<?= $nome  ?>"><br>
                        </div>
                        <div class="area_uput">
                            <label for="email">E-MAIL</label>
                            <input type="email" class="input_text" name="email" id="email" value="<?= $email ?>"><br>
                        </div>
                        <div class="area_uput">
                            <label for="curso">CURSO</label><br>
                            <div class="area_radios_area_">
                                <div class="area_radio"> <input type="radio" name="curso" id="curso_adm" value="curso_adm">ADM</div>
                                <div class="area_radio"><input type="radio" name="curso" id="curso_info" value="curso_info">INFO</div>
                                <div class="area_radio"><input type="radio" name="curso" id="curso_msi" value="curso_msi">MSI<br></div>
                            </div>
                        </div>
                        <div class="area_uput">
                            <label for="fone">TELEFONE</label>
                            <input type="fone" class="input_text" name="fone" id="fone" value="<?= $telefone  ?>"><br>
                        </div>
                        <div class="area_uput">
                            <label for="senha">SENHA</label>
                            <input type="password" class="input_text" name="senha" id="senha">
                            <label for="senha"> CONFIRMAR SENHA</label>
                            <input type="password" class="input_text" name="rep_senha" id="rep_senha" onblur="validarSenha()">
                        </div>
                    </div>

                    <div class="form_2">
                        <label for="perfil">
                            <img id="f_perfil" src="../IMG/up_code.png">
                            <input type="file" id='perfil' name="perfil" style="display:none;"> <br>
                            PERFIL</label>
                        <p>Selecione uma foto de perfil.</p>
                    </div>
                </div>
                <div class="are_button">
                    <button type="reset" onclick="msg()">VOLTAR</button>
                    <button type="submit">CADASTRAR</button>
                </div>

            </form>
        </div>

    </div>
</body>

</html>
<script>
    document.querySelector('#perfil').addEventListener('change', () => {
        alert('Sua foto foi selecionada corretamente.');
    })

    function msg() {

        if (confirm('Deseja confirmar o cancelamento?')) {
            window.location.href = '../PHP/login.php';
        }
    }

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
            setCustomValidity('As senhas não conferem');
            return false;
        }
    }
</script>