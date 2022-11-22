<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

require_once "conect.php";
header('location:../../../paginas/recuperar_senha.php');
$email = $pdo->escape_string($_POST['email']);

$sql_user = $pdo->query("SELECT * FROM usuarios WHERE email='$email'")->fetch_assoc();
if (!is_null($sql_user)) {
    $token = bin2hex(random_bytes(50));
    $data_expiracao = new DateTime();
    $data_expiracao->add(new DateInterval("P1D"));
    $sql_g = $pdo->query("INSERT INTO list_senha_reset VALUES ('$email', '$token', \"" . $data_expiracao->format('Y-m-d H:i:s') . "\", 0)");


    if ($sql_g) {
        $mail = new PHPMailer(true);
        try {
            $mail->CharSet = 'UTF-8';
            $mail->Encoding = 'base64';
            $mail->setLanguage('br');
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'luis.2020316527@aluno.iffar.edu.br';
            $mail->Password = 'ywypkflgiduqdorv';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            $mail->setFrom('luis.2020316527@aluno.iffar.edu.br', 'Recuperar Senha');
            $mail->addAddress($email);
            $mail->addReplyTo('luis.2020316527@aluno.iffar.edu.br', 'Recuperar Senha');


            $mail->isHTML(true);
            $mail->Subject = "Pedido de redefinição de senha do DVP";
            $mail->Body = "Olá," . $sql_user['nome'] . "<br><br>"
                . "<a style='display:inline-block;text-align:center; font-size: 20px; margin: auto;border-radius: 5px; padding:20px;background-color: #5865F2; color:#fff; text-decoration: none;' href=\""
                . filter_input(INPUT_SERVER, 'SERVER_NAME')
                . "/discord_versao_paraguai/paginas/redefinir.php?email=" . $email . "&token="
                . $token . "\">Clique aqui para redefinir sua senha</a>";
                    
            if ($mail->send()) {
                $_SESSION['error'] = false;
                $_SESSION['mensagem'] = 'Mensagem enviada com sucesso!';
            } else {
                $_SESSION['error'] = true;
                $_SESSION['mensagem'] = 'Erro ao enviar a mensagem.';
            }
        } catch (Exception $e) {
            $_SESSION['error'] = true;
            $_SESSION['mensagem'] = "A mensagem não pode ser enviada. "
                . "Erro: {$mail->ErrorInfo}";
        }
    } else {
        $_SESSION['error'] = true;
        $_SESSION['mensagem'] = "Erro ao gravar no banco de dados.<br>";
    }
} else {
    $_SESSION['error'] = true;
    $_SESSION['mensagem'] = "Email informado inexistente!";
}

