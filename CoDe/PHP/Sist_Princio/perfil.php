<?php
session_start();
require_once "conecta.php";
$id = $_SESSION['matricula'];
$sql = "SELECT * FROM cad_code WHERE matricula='$id'";
$result = mysqli_query($conexao, $sql);
$pessoa = mysqli_fetch_assoc($result);
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
                <li class="nav_itens"><a href="List_emprestimo.php" class="nav_link">LISTA DE EMPRESTIMO</a></li>
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

        <div class="superior">
            <p>Sistema de</p>
            <strong>
                <h2>PERFIL</h2>
            </strong>
        </div>

        <div class="P_form">
            <form method="POST" enctype="multipart/form-data" action="alt_perfil.php" class="form"
                onsubmit="return validarSenha();">
                <div class="area_form">
                    <div class="form_1">
                        <div class="area_uput">
                            <label for="name">NOME</label><br>
                            <input type="text" class="input_text" name="nome" id="nome"
                                value="<?= $pessoa['nome'] ?>"><br>
                        </div>
                        <div class="area_uput">
                            <label for="email">E-MAIL</label><br>
                            <input type="email" class="input_text" name="email" id="email"
                                value="<?= $pessoa['email'] ?>"><br>
                        </div>
                        <div class="area_uput">
                            <label for="curso">CURSO ATUAL:
                                <?= strtoupper(explode('_', $pessoa['curso'])[1]) ?></label><br>
                            <div class="area_radios_area_">
                                <div class="area_radio"> <input type="radio" name="curso" id="curso_adm"
                                        value="curso_adm">ADM</div>
                                <div class="area_radio"><input type="radio" name="curso" id="curso_info"
                                        value="curso_info">INFO</div>
                                <div class="area_radio"><input type="radio" name="curso" id="curso_msi"
                                        value="curso_msi">MSI<br></div>
                            </div>
                        </div>
                        <div class="area_uput">
                            <label for="fone">TELEFONE</label><br>
                            <input type="fone" class="input_text" name="fone" id="fone"
                                value="<?= $pessoa['fone'] ?>"><br>
                        </div>
                    </div>
                    <div class="form_2">
                        <label for="foto">

                            <?php if ($pessoa['f_perfil'] == "") { ?>
                            <img id="f_perfil" src="../../IMG/up_code.png">

                            <?php } else {
                            ?>
                            <img width="90%" src="../Up_Perfil/<?= $pessoa['f_perfil'] ?>" alt="">

                            <?php } ?>

                            <input type="file" name="perfil" id="foto" style='display:none'><br>
                            FOTO DE PERFIL
                            <p>Selecione uma foto para substituir.</p>
                        </label>
                    </div>
                </div>
                <div class="are_button">
                    <button type="submit" onclick="msg()">SALVAR</button>
                </div>
                <a href="excluir.php" onclick="msg()"> Excluir Perfil</a>

            </form>
        </div>

    </div>

</body>

</html>
<script>
document.querySelector('#perfil').addEventListener('change', () => {
    alert('Sua foto foi selecionada corretamente.');
})

function msg() {

    if (confirm('Deseja confirmar a edição?')) {
        window.location.href = 'inicio.php';
    }
}

function msg(Apaga) {

    if (confirm('Deseja confirmar a exclusão do seu Perfil?')) {
        window.location.href = 'inicio.php';
    }
}
</script>