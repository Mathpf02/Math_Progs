<?php  require 'demonios.php'?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="gravar.php" method="POST">
       NOME:<input type="text" nome="" value ="<?=nome?>" placeholder="Digite o seu nome" autofocus> <br>
       MATRICULA: <input type="hidden" nome="matricula" value="<?=matricula?>" placeholder="Digite a sua matricula"> <br>
       <input type="submit" value="CADASTRAR">


    </form>
</body>
</html>