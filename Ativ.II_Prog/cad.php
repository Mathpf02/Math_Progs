<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cad.Site</title>
</head>

<body>
    <div class="Tel_cad">
        <div class="Tel_img">
            <img src="" alt="CADASTRO">
        </div>

        <div class="Tel_form">
            <form action="" method="POST">
                NOME:<input type="text" id="f_nome" name="nome" placeholder="Digite seu nome" maxlength="200"><br>
                E-MAIL: <input type="email" id="f_email" name="email" placeholder="Digite seu email"
                    maxlength="200"><br>
                TELEFONE: <input type="tel" id="f_fone" name="fone" placeholder="(**) *****-****" maxlength="16"
                    pattern="[0-9] {2}- [0-9] {5}- [0-9] {4} "><br>
                SENHA: <input type="text" id="f_senha" name="senha" placeholder="Digite sua senha" minlength="8"><br>
                CONFIRMAR SENHA: <input type="text" id="f_email" name="conf_s" placeholder="Repita sua senha"
                    minlength="8"><br>
                IMAGEM DE PERFIL: <input type="file" id="f_foto" name="perfil" accept="image/*"
                    placeholder="Selecione sua foto de perfil"><br>
                <input type="reset" value="CANCELAR" oneclick="msg()"> <input type="submit" value="CADASTRAR">
            </form>
        </div>

    </div>
</body>

</html>