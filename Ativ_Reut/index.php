<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Cadastro de Alunos</h1>
    <a href="form.php"> Incluir Alunos</a>

    <TABLE>
        <Thead>
            <tr>
                <th>Matricula</th>
                <th>Nome</th>
            </tr>
        </thead>
    </TABLE>
    <tbody>
        <?php require 'listar.php'?>
    </tbody>
</body>

</html>