<?php
if (!defined('_CODE')) {
    die('Access denied...');
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function layouts($layoutName = 'header')
{
    if (file_exists(_WEBPATH_TEMPLATES . '/layout/' . $layoutName . '.php'));
    require_once(_WEBPATH_TEMPLATES . '/layout/' . $layoutName . '.php');
}
function sendmail($to, $subject, $content)
{

    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'thaodo0469@gmail.com';                     //SMTP username
        $mail->Password   = 'Xuuxuu6904?';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('thaodo0469@example.com', 'Jessica');
        $mail->addAddress($to);     //Add a recipient

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body    = $content;

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
function isGet()
{
    if ($_SERVER['REQUEST_METHOD'] == 'GET')
        return true;
    return false;
}
function isPost()
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST')
        return true;
    return false;
}
function redirect($path = 'index.php')
{
    header("Location: $path");
    exit;
}
// hàm kiểm tra trạng thái đăng nhập
function isLogin()
{
    $checklogin = false;
    if (getSession('loginToken')) {
        $tokenlogin = getSession('loginToken');
        $querytoken = oneRaw("SELECT user_id FROM tokenlogin WHERE token ='$tokenlogin'");
        if (!empty($querytoken)) {
            $checklogin = true;
        } else {
            removeSession('loginToken');
        }
    }
    return $checklogin;
}
