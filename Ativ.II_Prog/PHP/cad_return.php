<?php
include "conect.php"; 
$nome= $_POST['f_nome'];
$tele= $_POST['f_fone'];
$senha= $_POST['f_senha'];
$foto= $_POST['f_perf'];

$sql = "INSERT INTO 'usuario'('nome','fone','senha','perfil')
 VALUE ('$nome','$tele','$senha','$foto')";

if(mysqli_query($con,$sql)){
    "$nome cadastrado com sucesso!";
}else {
    echo"$nome não cadastro corretamente!";
}

?>



<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <div class="corp">
        <div class="corp_form">
            <form action="" method="post">
                nome: <input type="text" id="nome" name="f_nome" maxlength="200" placeholder="" required> <br>
                telefone <input type="text" id="fone" name="f_fone" maxlength="15" placeholder="(**) *****-****"><br>
                senha: <input type="text" id="senha" name="f_senha" minlength="8" placeholder=""><br>
                foto de perfil: <input type="file" id="perf" name="f_perf" accept="image/*"><br>
                <div class="r_botton">
                    <a class="d_p" onclick="msg()">CANCELAR</a>
                </div>
                <input type="submit" value="CADASTRAR">
            </form>
        </div>


    </div>
    <script>
    function msg() {

        if (confirm('Deseja confirmar o cancelamento?')) {
            window.location.href = 'log.php';
        }
        /*else {
                       document.querySelector('.d_p').preventDefault();
                   }*/
    }
    </script>
</body>

</html>