<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require '../PHPMailer-master/src/Exception.php';
require '../PHPMailer-master/src/PHPMailer.php';
require '../PHPMailer-master/src/SMTP.php';

require_once "../conexao.php";

$nome = $_POST['nome'];
$comenta = $_POST['menssage'];

$email = mysqli_real_escape_string($conexao, $_POST['email']);

$sql = "SELECT * FROM cad_code WHERE email='$email'";
$resultSet = mysqli_query($conexao, $sql);
$usuario = mysqli_fetch_assoc($resultSet);
if (!is_null($usuario)) { // caso o email exista no banco de dados
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

        $mail->setFrom('matheus.2019322700@aluno.iffar.edu.br', 'Contato CoDe');
        $mail->addAddress($email); //Add a recipient
        $mail->addReplyTo('matheus.2019322700@aluno.iffar.edu.br', 'Contato CoDe');

        //conteúdo do email

        $mail->isHTML(true); //Set email format to HTML
        $mail->Subject = 'Mensagem de um usuario do sistema CoDe:Construção e Desenvolvimento!';
        $mail->Body = "Olá! <br>"
            . "<br>"
            . "Sou o usuario " . $nome . " e meu e-mail para contato é ". $email
            ."<br>"
            .$comenta;
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
} else { // caso o email não exista no banco de dados

    $_SESSION['mensagem'] = "Email informado inexistente!";
}
header("Location: inicio.php");