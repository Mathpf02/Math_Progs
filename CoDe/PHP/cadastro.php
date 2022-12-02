<?php

use LDAP\Result;

include('conexao.php');
    $Matricula= $_POST['matri'];
    $Nome= $_POST['nome'];
    $Email= $_POST['email'];
    $Curso= $_POST['curso'];
    $Telefone= $_POST['fone'];
    $Senha= $_POST['senha'];
    $Perfil= $_POST['perfil'];


    $result = mysqli_query($conexao, 
    "INSERT INTO cad_code(matricula,nome,email,curso,fone,senha,f_perfil)
    VALUE ('$Matricula','$Nome','$Email','$Curso','$Telefone','$Senha','$Perfil')");

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
            <form method="POST" action="" class="form">
                <div class="area_form">
                    <div class="form_1">
                        <div class="area_uput">
                            <label for="matri">MATRICULA</label>
                            <input type="text" class="input_text" name="matri" id="matri"><br>
                        </div>
                        <div class="area_uput">
                            <label for="name">NOME</label>
                            <input type="text" class="input_text" name="nome" id="nome"><br>
                        </div>
                        <div class="area_uput">
                            <label for="email">E-MAIL</label>
                            <input type="email" class="input_text" name="email" id="email"><br>
                        </div>
                        <div class="area_uput">
                            <label for="curso">CURSO</label><br>
                            <div class="area_radios_area_">
                                <div class="area_radio"> <input type="radio" name="curso" id="curso">ADM</div>
                                <div class="area_radio"><input type="radio" name="curso" id="curso">INFO</div>
                                <div class="area_radio"><input type="radio" name="curso" id="curso">MSI<br></div>
                            </div>
                        </div>
                        <div class="area_uput">
                            <label for="fone">TELEFONE</label>
                            <input type="fone" class="input_text" name="fone" id="fone"><br>
                        </div>
                        <div class="area_uput">
                            <label for="senha">SENHA</label>
                            <input type="password" class="input_text" name="senha" id="senha">
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
</script>