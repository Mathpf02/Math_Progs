<?php
session_start();
require_once "funcoes.php";
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>CoDe: RECUPERA</title>
    <link rel="stylesheet" href="../CSS/Prin_CoDe/St_rec.css">
</head>

<body>
    <div class="conteiner">
        <div class="esquerda">
            <div class="superior">
                <p>CoDe:</p>
                <strong>
                    <h2>RECUPERAR SENHA</h2>
                </strong>
            </div>

            <form method="POST" action="rec_senha.php" class="form">
                <div style="color: black;"><?= exibeMensagens() ?></div>
                <label for="email">E-MAIL</label>
                <input type="text" name="email"id="email"><br>

                <button type="submit">SOLICITAR RECUPERAÇÃO</button><br>
            </form>

        </div>
    </div>

</body>

</html>