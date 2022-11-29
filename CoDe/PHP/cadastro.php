<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Cadastro-CODE</title>
    <link rel="stylesheet" href="../CSS/St_Cad.css">
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
                <div class = "form_1">
                    <label for="matri">MATRICULA</label>
                    <input type="text" name="matri" id="matri"><br>

                    <label for="name">NOME</label>
                    <input type="text" name="nome" id="nome"><br>

                    <label for="email">E-MAIL</label>
                    <input type="email" name="email" id="email"><br>

                    <label for="curso">CURSO</label><br>
                    <input type="radio" name="curso" id="curso">ADM
                    <input type="radio" name="curso" id="curso">INFO
                    <input type="radio" name="curso" id="curso">MSI<br>

                    <label for="fone">TELEFONE</label>
                    <input type="fone" name="fone" id="fone"><br>

                    <label for="senha">SENHA</label>
                    <input type="password" name="senha" id="senha">
                </div>

                <div class="form_2">
                    <input type="file" id="f_perfil"><br>
                    <label for="perfil">PERFIL</label>
                    <p>Selecione uma foto de perfil.</p>
                </div>

                <button type="reset">VOLTAR</button>
                <button type="submit">ENTRAR</button><br>


            </form>
        </div>

    </div>
</body>

</html>