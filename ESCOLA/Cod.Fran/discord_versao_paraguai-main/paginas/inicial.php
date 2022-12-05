<?php
require_once '../assets/script/php/Usuario.php';
session_start();
$user = new Usuario();
if ($user->verify_login() == false) {
    header('location: ../index.php');
}
$id = $_SESSION['id_user_'];
function error()
{
    if (isset($_SESSION['error'])) {
        if ($_SESSION['error']) {
?>
            <div class="error">
                <span class="erro"><?= $_SESSION['mensagem'] ?></span>
            </div>
        <?php
        } else {
        ?>
            <div class="error">
                <span class="not_erro"><?= $_SESSION['mensagem'] ?></span>
            </div>
<?php
        }
        unset($_SESSION['mensagem']);
        unset($_SESSION['error']);
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/style/inicial/style.css">
    <title>Inicial | DVP (discord versão paraguai)</title>
</head>

<body>
    <div class="area_p">
        <div class="menu_r">
            <div class="menu_">
                <div class="title_menu">
                    CONFIGURAÇÕES DE USUÁRIO
                </div>
                <a href="" class="opt_menu active">
                    Minha conta
                </a>
                <hr>
                <a href="../assets/script/php/logout.php" class="opt_menu exit_img">
                    Sair
                </a>
                <div class="fotter_menu">
                    ...
                </div>
            </div>
        </div>
        <div class="area_perfil">
            <?= error() ?>
            <div class="container">
                <div class="area_edit">
                    <div class="edit_tiltle">
                        Minha conta
                    </div>
                    <div class="area_perfil_info">
                        <div class="banner_default">
                        </div>
                        <div class="perfil_info">
                            <div class="pefil_img">
                                <div class="img_" style="background-image:url(../assets/imgs_users/<?= $user->getImg($id) ?>)"></div>
                            </div>
                            <div class="pefil_nome_info">
                                <?= $user->getNome($id, true) ?>
                            </div>
                            <div class="button_perfil_info">
                                <a href="">Editar perfil de usuário</a>
                                <div class="area_modal_img">
                                    <div class="modal_alter" style="display: none;opacity:0;">
                                        <div class="exit_modal exit_"></div>
                                        <form method="POST" enctype="multipart/form-data" action="../assets/script/php/atualizar.php">
                                            <div class="moda_">
                                                <div class="area_h">
                                                    <div class="modal_exit exit_"></div>
                                                </div>

                                                <div class="title_modal">
                                                    MUDANÇA DE FOTO DE USUÁRIO
                                                </div>
                                                <div class="des_generica">
                                                    Insira um novo foto de usuário
                                                </div>
                                                <div class="area_input">
                                                    <div class="input_area">
                                                        <div class="title_input">
                                                            FOTO DE USUÁRIO
                                                        </div>
                                                        <div class="input_a">
                                                            <input required type="file"  name="img">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="area_botao">
                                                    <a href="" class="button_modal exit_">Cancelar</a>
                                                    <button class="button_modal">Pronto</button>
                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="area_sub_edit">
                            <div class="opt_edit_info_area">
                                <div class='title_edit_info_area'>
                                    <div class="title_edit_info">
                                        NOME DE USUÁRIO
                                    </div>
                                    <div class="nome_user nome">
                                        <?= $user->getNome($id, true) ?>
                                        <div class="modal_alter" style="display: none;opacity:0;">
                                            <div class="exit_modal exit_"></div>
                                            <form method="POST" action="../assets/script/php/atualizar.php">
                                                <div class="moda_">
                                                    <div class="area_h">
                                                        <div class="modal_exit exit_"></div>
                                                    </div>

                                                    <div class="title_modal">
                                                        MUDANÇA DE NOME DO USUÁRIO
                                                    </div>
                                                    <div class="des_generica">
                                                        Insira um novo telefone de usuário
                                                    </div>
                                                    <div class="area_input">
                                                        <div class="input_area">
                                                            <div class="title_input">
                                                                NOME DE USUÁRIO
                                                            </div>
                                                            <div class="input_a">
                                                                <input value="<?= $user->getNome($id) ?>" required type="text" class="input_e" name="nome">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="area_botao">
                                                        <a href="" class="button_modal exit_">Cancelar</a>
                                                        <button class="button_modal">Pronto</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="area_button_edit_sub nome_button">
                                    <a class="" class="button_edit">
                                        Editar
                                    </a>
                                </div>
                            </div>
                            <div class="opt_edit_info_area">
                                <div class='title_edit_info_area'>
                                    <div class="title_edit_info">
                                        E-MAIL
                                    </div>
                                    <div class="nome_user email">
                                        <?= $user->getEmail($id, true) ?>
                                        <div class="modal_alter" style="display: none;opacity:0;">
                                            <div class="exit_modal exit_"></div>
                                            <form method="POST" action="../assets/script/php/atualizar.php">
                                                <div class="moda_">
                                                    <div class="area_h">
                                                        <div class="modal_exit exit_"></div>
                                                    </div>

                                                    <div class="title_modal">
                                                        MUDANÇA DE E-MAIL DO USUÁRIO
                                                    </div>
                                                    <div class="des_generica">
                                                        Insira um novo e-mail de usuário
                                                    </div>
                                                    <div class="area_input">
                                                        <div class="input_area">
                                                            <div class="title_input">
                                                                E-MAIL DE USUÁRIO
                                                            </div>
                                                            <div class="input_a">
                                                                <input value="<?= $user->getEmail($id) ?>" required type="email" class="input_e" name="email">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="area_botao">
                                                        <a href="" class="button_modal exit_">Cancelar</a>
                                                        <button class="button_modal">Pronto</button>
                                                    </div>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                                <div class="area_button_edit_sub email_button">
                                    <a class="" class="button_edit">
                                        Editar
                                    </a>
                                </div>
                            </div>
                            <div class="opt_edit_info_area">
                                <div class='title_edit_info_area'>
                                    <div class="title_edit_info">
                                        TELEFONE
                                    </div>
                                    <div class="nome_user tel">
                                        <?= $user->getTel($id, true) ?>
                                        <div class="modal_alter" style="display: none;opacity:0;">
                                            <div class="exit_modal exit_"></div>
                                            <form method="POST" action="../assets/script/php/atualizar.php">
                                                <div class="moda_">
                                                    <div class="area_h">
                                                        <div class="modal_exit exit_"></div>
                                                    </div>

                                                    <div class="title_modal">
                                                        MUDANÇA DE TELEFONE DO USUÁRIO
                                                    </div>
                                                    <div class="des_generica">
                                                        Insira um novo telefone de usuário
                                                    </div>
                                                    <div class="area_input">
                                                        <div class="input_area">
                                                            <div class="title_input">
                                                                TELEFONE DE USUÁRIO
                                                            </div>
                                                            <div class="input_a">
                                                                <input value="<?= $user->getTel($id) ?>" required type="text" class="input_e" name="telefone">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="area_botao">
                                                        <a href="" class="button_modal exit_">Cancelar</a>
                                                        <button class="button_modal">Pronto</button>
                                                    </div>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                                <div class="area_button_edit_sub telefone_button">
                                    <a class="" class="button_edit">
                                        Editar
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="divisor_">
                    <div class="edit_tiltle title_baixo">
                        Senha e autentificação
                    </div>
                    <div class="area_button_senha">
                        <a href="">Mudar Senha</a>
                    </div>
                    <div class="modal_senha">
                        <div class="modal_alter" style="display: none;opacity:0;">
                            <div class="exit_modal exit_"></div>
                            <form method="POST" action="../assets/script/php/atualizar.php">
                                <div class="moda_">
                                    <div class="area_h">
                                        <div class="modal_exit exit_"></div>
                                    </div>

                                    <div class="title_modal">
                                        MUDANÇA DE SENHA DO USUÁRIO
                                    </div>
                                    <div class="des_generica">
                                        Insira um novo telefone de usuário
                                    </div>
                                    <div class="area_input">
                                        <div class="input_area">
                                            <div class="title_input">
                                                SENHA ATUAL
                                            </div>
                                            <div class="input_a">
                                                <input required type="password" autocomplete="off" class="input_e" name="senha_a">
                                            </div>
                                        </div>
                                        <div class="input_area">
                                            <div class="title_input">
                                                NOVA SENHA
                                            </div>
                                            <div class="input_a">
                                                <input required type="password" autocomplete="off" class="input_e" name="senha_n">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="area_botao senha_area">
                                        <a href="" class="button_modal exit_">Cancelar</a>
                                        <button class="button_modal">Pronto</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                    <hr class="divisor_">
                    <div class="edit_tiltle title_baixo title_ultra_baixo">
                        Remoção de conta
                    </div>
                    <div class="edit_tiltle desc">
                        Excluir sua conta é irreversível
                    </div>
                    <div class="area_button_senha remove">
                        <a href="">Excluir perfil</a>
                    </div>
                </div>
                <div class="area_button">
                    <div class="button_exit">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="../assets/script/javascript/show_modal.js"></script>
</body>

</html>