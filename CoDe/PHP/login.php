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

            <form method="POST" action="env_login.php" class="form">
                <label for="email">E-MAIL OU MATRICULA</label>
                <input type="text" id="email"><br>

                <label for="senha">SENHA</label>
                <input type="password" id="senha">

                <span class="esquecer">
                    <a href=""> Esqueceu sua senha? </a><br>
                </span>

                <button type="submit"  href="../HTML/Inicio.html">ENTRAR</button><br>
                <span class="Cadastrar">
                    Precisando de uma conta? <a href="cadastro.php"> <strong>Registre-se</strong> </a>
                </span>
            </form>

        </div>
        <div class="direita">
            <img src="../IMG/qrcode_TCC.jpg" alt="">
            <h2>Leia o meu TCC</h2>
            <p>Escaneie isto com o <b>Google Leans
                atráves da câmera do celular</b> para
                ler o poder ler o documento.</p>
        </div>

    </div>

</body>

</html>