<?php
session_start();

// if (!isset($_SESSION['id_pessoa'])) {
//     $_SESSION['mensagem'] = "Você deve primeiro realizar o login.";
//     header("Location: index.php");
// }
require_once "../funcoes.php";
require_once "../conexao.php";
if (isset($_GET['id'])) {
    $idPessoa = mysqli_real_escape_string($conexao, $_GET['id']);
    $sql = "SELECT * FROM emp_code WHERE id = $idPessoa";
    $resultSet = mysqli_query($conexao, $sql);
    $pessoa = mysqli_fetch_assoc($resultSet);
    $matricula = $pessoa['matri'];
    $nome = $pessoa['nome'];
    $email = $pessoa['email'];
} else {
    $matricula = null;
    $nome = null;
    $email = null;
    $telefone = null;
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>CoDe: EMPRESTIMO</title>
    <link rel="stylesheet" href="../../CSS/Seg_CoDe/St_Emp.css">
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
                <button><a href="../logout.php">SAIR</a></button>
            </div>
        </nav>
    </header>
    <div class="espaço"></div>

    <div class="conteiner">

        <div class="superior">
            <p>Sistema de</p>
            <strong>
                <h2>EMPRESTIMO</h2>
            </strong>
        </div>

        <div class="P_form">
            <form method="POST" action="env_emprestimo.php" class="form">
                <div class="area_form">
                    <div class="form_1">
                        <div class="area_uput">
                            <label for="Perg_1">DISPÕES DE EQUIPAMENTO TECNOLÓGICO:</label><br>
                            <div class="area_radios_area_">
                                <div class="area_radio"> <input type="radio" name="Perg_1" value="SIM" id="Perg1_sim">SIM</div>
                                <div class="area_radio"><input type="radio" name="Perg_1" id="Perg1_não">NÃO</div>
                            </div>
                        </div>

                        <div class="area_uput">
                            <label for="Perg_2">TENS LIBERDADE DE UTILIZAÇÃO:</label><br>
                            <div class="area_radios_area_">
                                <div class="area_radio"> <input type="radio" name="Perg_2" id="Perg2_sim">SIM</div>
                                <div class="area_radio"><input type="radio" name="Perg_2" id="Perg2_não">NÃO</div>
                                <div class="area_radio"><input type="radio" name="Perg_2" id="Perg2_ntp">NÃO TEM EQUIP<br></div>
                            </div>
                        </div>
                    </div>

                    <div class="form_2">
                        <label for="documento">
                            <img id="f_documento" src="../../IMG/doc_code.png">
                            <input type="file" id='documento' name="documento" style="display:none;"> <br>
                            DECLARAÇÃO DE VÍNCULO
                            <p>Selecione uma cópia da sua declaração de vinculo na Instituição.</p>
                        </label>

                    </div>
                </div>
                <div class="are_button">
                    <button type="reset" onclick="msg()">CANCELAR</button>
                    <button type="submit">CONFIRMAR</button>
                </div>

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

        if (confirm('Deseja confirmar o cancelamento?')) {
            window.location.href = 'inicio.php';
        }
    }
</script>