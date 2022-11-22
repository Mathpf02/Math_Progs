<?php require 'aluno.php';?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Inclusão de Alunos</title>
</head>
<body>
    <form method="POST" action="gravar.php">
        Nome <input type="text" name="nome" value="<?=$nome?>" autofocus="autofocus">
        <input type="hidden" name="matricula" value="<?=$matricula?>">
        <input type="submit" value="Gravar">
    </form>
</body>
</html>