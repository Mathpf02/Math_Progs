<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Alunos</title>
</head>
<body>
    <h1>Cadastro de Alunos</h1>
    <a href="form.php">Incluir aluno</a>
    <table>
        <thead>
            <tr>
                <th>Matrícula</th>
                <th>Nome</th>
            </tr>
        </thead>
        <tbody>
            <?php require 'listar.php' ?>
        </tbody>
    </table>
</body>
</html>