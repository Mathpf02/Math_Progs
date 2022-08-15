<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>CoDe-Cadastro</title>
</head>

<body>
    <h1> DADOS DE CADASTRO </h1>
    <?php
    filter_input_array(INPUT_POST, FILTER_DEFAULT);
    if (!empty($dados['cad.Use'])) {
        var_dump($dados);
        $query_user = "INSERT INTO cad_Usuario (matricula, nome, email, curso, fone, senha)
         VALUE ('" . $dados['matricula'] . "',  '" . $dados['nome'] . "', '" . $dados['email'] . "',
          '" . $dados['curso'] . "',  '" . $dados['fone'] . "',  '" . $dados['senha'] . "')";
        $cad_Usuario = $conn->prepare($query_user);
        $cad_Usuario->execute();
    }
    ?>
    <form name="cad_Usuario" method="POST" action=" ">
        <label> Matricula: </label>
        <input type="text" name="matricula" id="matricula" placeholder="Matricula"><br><br>

        <label> Nome: </label>
        <input type="text" name="nome" id="nome" placeholder="Nome Completo"><br><br>

        <label> E-mail: </label>
        <input type="text" name="email" id="email" placeholder="Seu-mail"><br><br>

        <label> Curso: </label>
        <input type="text" name="curso" id="curso" placeholder="INFO, ADM ou MSI"><br><br>

        <label> Telefone: </label>
        <input type="text" name="fone" id="fone" placeholder=" (**) * ****-****"><br><br>

        <label> Senha: </label>
        <input type="text" name="senha" id="senha" placeholder="Senha"><br><br>

        <input type="reset" value="CANCELAR">
        <input type="submit" value="CADASTRAR" name="cad.Use">
    </form>
</body>

</html>