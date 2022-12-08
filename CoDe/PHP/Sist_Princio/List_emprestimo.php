<?php
session_start();
require_once "conecta.php";
$id =  $_GET['idEmprestimo'];
$sql = "SELECT * FROM emp_code WHERE id='$id'";
$result = mysqli_query($conexao, $sql);
$emprestimo = mysqli_fetch_assoc($result);

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../CSS/Seg_CoDe/St_Perfil.css">

    <title>CoDe: Perfil Usuario</title>
</head>
<header>
    <nav class="nav_bar">
        <div class="logo">
            <img src="../../IMG/1.png">
        </div>
        <div class="nav_list">
            <ul>
                <li class="nav_itens"><a href="inicio.php" class="nav_link">PROJETO</a></li>
                <li class="nav_itens"><a href="emprestimo.php" class="nav_link">EMPRESTIMO</a></li>
                <li class="nav_itens"><a href="perfil.php" class="nav_link">PERFIL</a></li>
                <li class="nav_itens"><a href="Comenta.php" class="nav_link">CONTATO</a></li>
            </ul>
        </div>
        <div class="log_button">
            <button><a href="../logout.php">SAIR</a></button>
        </div>
    </nav>
</header>
<div class="espaço"></div>

<body>
    <div class="conteiner">

        <body>
            <div class="infoEmprestimo">
                <p>

                    <img width=200 src="../Up_Documento/<?= $emprestimo['f_documento'] ?>" alt="">

                </p>
                <br><br><br>
                <ul>



                    <li>
                        <p>
                            <big> Disponibilidade Tecnológica: <?= $emprestimo['disp_Tec'] ?></big>
                        </p>
                    </li>
                    <br><br><br>
                    <li>
                        <p>
                            <big> Liberadade de utilização: <?= $emprestimo['liber_Uti'] ?></big>
                        </p>
                    </li>

                </ul>
            </div>


        </body>

</html>