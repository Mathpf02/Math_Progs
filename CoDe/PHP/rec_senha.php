<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

require_once "conexao.php";
$Email = $_POST['email'];

$sql = "SELECT * FROM cad_code WHERE email='$Email'";
$resultSet = mysqli_query($conexao, $sql);
$usuario = mysqli_fetch_assoc($resultSet);
if (!is_null($usuario)) { // caso o email exista no banco de dados
    $Token = bin2hex(random_bytes(50));
    $dataExpiracao = new DateTime();
    $dataExpiracao->add(new DateInterval("P1D"));

    // gravar a data de expiração e o token no banco
    $sql = "INSERT INTO res_code VALUES ('$Email', '$Token', \"" . $dataExpiracao->format('Y-m-d H:i:s') . "\"), 0";
    $gravou = mysqli_query($conexao, $sql);

    if ($gravou) {
        // enviar o email de resetar senha

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
            $mail->Password = 'qvojkmtwosmaixij';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            // caso de erro de certificado ssl

            $mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );

            //Recipients = Quem vai enviar o email

            $mail->setFrom('matheus.2019322700@aluno.iffar.edu.br', 'Não responda este email!');
            $mail->addAddress($Email);                            //Add a recipient
            $mail->addReplyTo('matheus.2019322700@aluno.iffar.edu.br', 'Não responda este email!');

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Redefinir a sua senha no '
                . 'Sistema de Emprestimo';
            $mail->Body = "Olá,<br>"
                . "<br>"
                . "Você solicitou a redefinição da sua senha no"
                . " Sistema de Emprestimo.<br>"
                . "Para redefinir a sua senha clique neste "
                . "<a href=\""
                . filter_input(INPUT_SERVER, 'SERVER_NAME')
                . "/Math_Progs/CoDe/PHP/troca_senha.php?email=" . $Email . "&token="
                . $Token . "\">link</a>.<br>"
                . "Este link só funcionará uma única vez, e "
                . "expirará em um dia.<br>"
                . "<br>"
                . "Obrigado!";

            if ($mail->send()) {
                $_SESSION['mensagem'] = 'Mensagem enviada com sucesso!';
            } else {
                $_SESSION['mensagem'] = 'Erro ao enviar a mensagem.';
            }
        } catch (Exception $e) {
            $_SESSION['mensagem'] = "A mensagem não pode ser enviada. "
                . "Erro: {$mail->ErrorInfo}";
        }
    } else {
        $_SESSION['mensagem'] = "Erro ao gravar no banco de dados.<br>" .
            mysqli_error($conexao);
    }
} else { // caso o email não exista no banco de dados
    $_SESSION['mensagem'] = "Email informado inexistente!";
}

header("Location: recuperar.php");
