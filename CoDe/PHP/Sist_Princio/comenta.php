<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../CSS/Seg_CoDe/St_Coment.css">
    <title>CoDe: COMENTA</title>
</head>

<body>
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
                <button><a href="../../logout.php">SAIR</a></button>
            </div>
        </nav>
    </header>
    <div class="espaço"></div>

    <div class="cont_comenta">
        <div class="com_titulo">
            <p>CoDe:</p>
            <h1>CONTATO</h1>
        </div>
        <div class="com_Form">
            <form action="env_comenta.php" method="post">
                <div class="area_uput">
                    <label for="name">NOME</label><br>
                    <input type="text" class="input_text" name="nome" />
                </div>
                <div class="area_uput">
                    <label for="email">E-MAIL</label><br>
                    <input type="email" id='email' class="input_text" name="email" />
                </div>
                <div class="area_uput">
                    <label for="menssage">COMENTARIO</label><br>
                    <textarea class="input_text" name="menssage" placeholder="DIGITE SUA MENSAGEM!"></textarea>
                </div>

                <div class="are_button">
                    <button type="submit" onclick="msg()">ENVIAR</button>
                </div>
            </form>
        </div>

    </div>



</body>

</html>
<script>
    function msg() {

        if (confirm('Deseja enviar está mensagem?')) {
            window.location.href = 'comenta.php';
        }
    }
</script>