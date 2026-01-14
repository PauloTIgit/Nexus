<?php
// Inclua a classe do PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

function Validador($input)
{
  if ($input == null || $input == '' || $input == '‎' || empty($input)) {
    return null;
  } else {
    return $input;
  }
}

function creatMessage($nome, $email, $celular, $assunto, $headerEmail)
{
  $nome = Validador(trim(strip_tags(filter_input(INPUT_POST, 'name', FILTER_DEFAULT))));
  $email = Validador(trim(strip_tags(filter_input(INPUT_POST, 'email', FILTER_DEFAULT))));
  $celular = Validador(trim(strip_tags(filter_input(INPUT_POST, 'phone', FILTER_DEFAULT))));
  $assunto = Validador(trim(strip_tags(filter_input(INPUT_POST, 'subject', FILTER_DEFAULT))));
  $headerEmail = Validador(trim(strip_tags(filter_input(INPUT_POST, 'message', FILTER_DEFAULT))));

  return "<!DOCTYPE html>
            <html lang='pt-BR'>
            <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Email HTML</title>
            <style>
                body {
                font-family: Arial, sans-serif;
                background-color: #f4f4f4;
                margin: 0;
                padding: 0;
                }
            
                .email-container {
                max-width: 600px;
                margin: 0 auto;
                background-color: #ffffff;
                padding: 20px;
                border: 1px solid #dddddd;
                }
            
                .header {
                background-color: #faaa2a;
                color: #ffffff;
                padding: 10px 0;
                text-align: center;
                }
            
                .content {
                padding: 20px;
                text-align: left;
                }
            
                .footer {
                background-color: #f4f4f4;
                color: #333333;
                padding: 10px 0;
                text-align: center;
                font-size: 12px;
                }
            
                .button {
                display: inline-block;
                padding: 10px 20px;
                color: #ffffff;
                background-color: #4e4caf;
                text-decoration: none;
                border-radius: 5px;
                }
            
                span {
                color: #333333;
                font-weight: 600;
                }
                
                p{
                color: #333333;
                }
            </style>
            </head>
            
            <body>
            <div class='email-container'>
                <div class='header'>
                <h1>Nova mensagem</h1>
                </div>
                <div class='content'>
                <p>Mensagem vinda do site <a href='https://paulodevelop.com/'>paulodevelop.com</a>!</p>
                <hr>
                <p><span>Nome: </span> " . $nome . "</p>
                <p><span>E-mail:</span> " . $email . "</p>
                <p><span>Celular:</span> " . $celular . "</p>
                <p><span>Assunto:</span> " . $assunto . "</p>
                <p><span>Mensagem:</span> " . $headerEmail . "</p>
                <hr>
                <div class='footer'>
                    <p>&copy; 2024 Paulo develop. Todos os direitos reservados.</p>
                </div>
                </div>
            </div>
            </body>
            </html>";
}

function createVerifyEmailHTML($nome, $email, $token)
{
  // $link = "https://SifferOne.com/verificar?token=" . urlencode($token);
  $link = "http://localhost/Projetos/SifferOne/api/v1/verificar-email?token=" . $token;

  return '
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Verificação de E-mail</title>
</head>
<body style="margin: 0; padding: 0; background-color: #f4f4f4; font-family: &#39;Helvetica Neue&#39;, Arial, sans-serif;">
  <table width="100%" cellpadding="0" cellspacing="0">
    <tr>
      <td align="center">
        <table width="600" cellpadding="0" cellspacing="0" style="background-color: #ffffff; margin: 40px auto; border-radius: 8px; overflow: hidden; border: 1px solid #dddddd;">
          
          <!-- Header -->
          <tr>
            <td align="center" style="background-color: #1f2937; padding: 24px;">
              <h1 style="color: #ffffff; margin: 0; font-size: 24px; letter-spacing: 0.5px;">SifferOne - Validação de Conta</h1>
            </td>
          </tr>
          
          <!-- Corpo do e-mail -->
          <tr>
            <td style="padding: 32px; color: #111827;">
              <p style="margin: 0 0 16px;">Olá <strong>' . $nome . '</strong>,</p>
              <p style="margin: 0 0 16px;">Recebemos uma solicitação para criar uma conta utilizando este e-mail: <strong>' . $email . '</strong>.</p>
              <p style="margin: 0 0 24px;">Para concluir a ativação do seu acesso ao <strong>SifferOne</strong>, clique no botão abaixo:</p>
              
              <!-- Botão de Verificação -->
              <table cellpadding="0" cellspacing="0" border="0" align="center" style="margin: 0 auto 30px;">
                <tr>
                  <td align="center" bgcolor="#f59e0b" style="border-radius: 6px;">
                    <a href="' . $link . '"
                      target="_blank"
                      style="display: inline-block; padding: 12px 24px; font-weight: bold; font-size: 15px; color: #ffffff; text-decoration: none; border-radius: 6px; background-color: #f59e0b;">
                      Verificar E-mail
                    </a>
                  </td>
                </tr>
              </table>

              <p style="font-size: 14px; color: #4b5563;">Se você não fez essa solicitação, pode ignorar este e-mail com segurança.</p>
            </td>
          </tr>

          <!-- Rodapé -->
          <tr>
            <td align="center" style="background-color: #f9fafb; padding: 20px; font-size: 12px; color: #9ca3af;">
              &copy; 2024 SifferOne. Todos os direitos reservados.<br/>
              Sistema jurídico desenvolvido por Paulo Ferreira Soluções Tecnológicas.
            </td>
          </tr>

        </table>
      </td>
    </tr>
  </table>
</body>
</html>';
}

function enviarEmailVerificacao($nome, $email, $token, $subject)
{
  $message = createVerifyEmailHTML($nome, $email, $token);

  $mail = new PHPMailer(true);

  try {
    $mail->isSMTP();
    $mail->Host = 'smtp.hostinger.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'pauloferreira@paulodevelop.com';
    $mail->Password = 'Nh6LU3c4uiT9WWP@';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    $mail->setFrom('pauloferreira@paulodevelop.com', 'Suporte');
    $mail->addAddress($email, $nome);
    $mail->isHTML(true);
    $mail->CharSet = 'UTF-8';
    $mail->Subject = $subject;
    $mail->Body    = $message;

    $mail->send();
    return true;
  } catch (Exception $e) {
    $_SESSION['ErroInterno'] = $e->getMessage();
    return false;
  }
}
