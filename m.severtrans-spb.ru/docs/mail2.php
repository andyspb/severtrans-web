<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Документ без названия</title>
</head>

<body>
<?php
if (isset($_POST['name'])) {$name = $_POST['name'];}
if (isset($_POST['email'])) {$email = $_POST['email'];}
if (isset($_POST['tel'])) {$tel = $_POST['tel'];}
if (isset($_POST['mess'])) {$mess = $_POST['mess'];}
if (isset($_POST['check'])) {$check = $_POST['check'];}
if ($_POST['check'] != 'stopSpam') exit('Spam decected');
$address = "severtrans@mail.ru";

$sub = "Cообщение с сайта";

$mes = "Автор: $name \nE-mail: $email \n Телефон: $tel \nОставил сообщение: \n$mess";

$send = mail ($address,$sub,$mes,"Content-type:text/plain; charset = utf-8\r\nFrom:$email");
if ($send == 'true')
{
echo "<b>Спасибо за отправку вашего сообщения!<p>";
echo "<a href=index.html>Нажмите,</a> чтобы вернуться на главную страницу";
}
else 
{
echo "<p><b>Ошибка. Сообщение не отправлено!";
}
?>
</body>
</html>