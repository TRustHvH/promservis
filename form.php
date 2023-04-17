<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
// Файлы phpmailer
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';
require 'phpmailer/Exception.php';
if(isset($_POST['submit'])){
// Переменные, которые отправляет пользователь
    $name = $_POST['name'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $message = $_POST['message'];

    // Формирование самого письма
    $title = "Форма отправки с сайта гусеничка.рф";
    $body = "Имя: $name</br>Email: $email</br>Телефон: $number</br>Сообщение: $message"; // Содержимое письма

    $mail = new PHPMailer;
    $mail->CharSet = 'UTF-8';
    
    // Настройки SMTP
    $mail->isSMTP();
    $mail->SMTPDebug = 2;
    $mail->SMTPAuth = true;
    
    $mail->Host = 'ssl://smtp.mail.ru';
    $mail->Port = 465;
    $mail->Username   = 'ivanpolyakov45@mail.ru'; // Логин на почте
    $mail->Password   = '2z1Pi2bQbvU4dJwi6aWd'; // Пароль на почте
    
    // От кого
    $mail->setFrom('ivanpolyakov45@mail.ru','Форма отправки с сайта гусеничка.рф');		
    
    // Кому
    $mail->addAddress('ivanpolyakov45@mail.ru');
    
    // Тема письма
    $mail->Subject = $title;
    
    // Тело письма
    $mail->msgHTML($body);
    
    $mail->send();

}
// echo "<script>self.location='http://xn--80afgmkq0ap4b.xn--p1ai/?is_sent=1';</script>";
?>