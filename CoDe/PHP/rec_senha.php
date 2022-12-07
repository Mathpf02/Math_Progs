<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

require_once "conexao.php";

$email = mysqli_real_escape_string($conexao, $_POST['email']);

$sql = "SELECT * FROM cad_code WHERE email='$email'";
$resultSet = mysqli_query($conexao, $sql);
$usuario = mysqli_fetch_assoc($resultSet);
if (!is_null($usuario)) { // caso o email exista no banco de dados
    $token = bin2hex(random_bytes(50));
    $dat_inspire = new DateTime();
    $dat_inspire->add(new DateInterval("P1D"));

    // gravar a data de expiração e o token no banco
    $sql = "INSERT INTO res_code VALUES ('$email', '$token', \"" . $dat_inspire->format('Y-m-d H:i:s') . "\", 0)";
    $gravou = mysqli_query($conexao, $sql);

    if ($gravou) {

        // enviar o email de resetar senha pro magrão

        $mail = new PHPMailer(true);
        try {
            // configurações para o envio do email
            $mail->CharSet = 'UTF-8';
            $mail->Encoding = 'base64';
            $mail->setLanguage('br');
            //$mail->SMTPDebug = SMTP::DEBUG_SERVER;
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'matheus.2019322700@aluno.iffar.edu.br';
            $mail->Password = 'uwnkagarlypiuyuz';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            //quem vai enviar o email

            $mail->setFrom('matheus.2019322700@aluno.iffar.edu.br', 'Recuperar Senha');
            $mail->addAddress($email); //Add a recipient
            $mail->addReplyTo('matheus.2019322700@aluno.iffar.edu.br', 'Recuperar Senha');

            //conteúdo do email

            $mail->isHTML(true); //Set email format to HTML
            $mail->Subject = 'Redefinir a sua senha no sistema de perfil';
            $mail->Body = "Olá! <br>"
                . "<br>"
                . "Você solicitou a redefinição da sua senha. <br>"
                . "Para redefinir a sua senha clique neste <a href=\"" . filter_input(INPUT_SERVER, 'SERVER_NAME')
                . "/Math_Progs/CoDe/PHP/troca_senha.php?email=" . $email . "&token=" . $token . "\">link</a>.<br>"
                . "Este link só funcionará uma única vez, e expirará em um dia. <br>"
                . "<br>"
                . "Obrigado!";

            $mail->smtpConnect([
                'ssl' => [
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                ]
            ]);

            if ($mail->send()) {
                $_SESSION['mensagem'] = 'Mensagem enviada com sucesso!';
            } else {
                $_SESSION['mensagem'] = 'Erro ao enviar a mensagem.';
            }
        } catch (Exception $e) {
            $_SESSION['mensagem'] = "A mensagem não pode ser enviada. Erro: {$mail->ErrorInfo}";
        }
    } else {
        $_SESSION['mensagem'] = "Erro ao gravar no banco de dados.<br>" .
            mysqli_error($conexao);
    }
} else { // caso o email não exista no banco de dados

    $_SESSION['mensagem'] = "Email informado inexistente!";
}
header("Location: recuperar.php");
