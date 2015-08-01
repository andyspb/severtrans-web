<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Keywords" content="Бланк заявления на экспедирование, экспедирование по Санкт-Петербургу, Регион Транс, Севертранс ТЭК, как отправить груз, грузоперевозка, перевозка груза" />
<meta name="Description" content="Заявление на экспедирование и отправку груза компаниями Севертранс ТЭК и Регион Транс" />
<title>Он-лайн заявление на экспедирование и отправку груза компаний Севертранс ТЭК и Регион Транс</title>
</head>
<body>
<?php
if (isset($_POST['name'])) {$name = $_POST['name'];}
if (isset($_POST['phone'])) {$phone = $_POST['phone'];}
if (isset($_POST['email'])) {$email = $_POST['email'];}
if (isset($_POST['comments'])) {$comments = $_POST['comments'];}
if (isset($_POST['punkt_naznacheniya'])) {$punkt_naznacheniya = $_POST['punkt_naznacheniya'];}
if (isset($_POST['naimenovanie'])) {$naimenovanie= $_POST['naimenovanie'];}
if (isset($_POST['upakovka'])) {$upakovka = $_POST['upakovka'];}
if (isset($_POST['ves'])) {$ves = $_POST['ves'];}
if (isset($_POST['obyem'])) {$obyem = $_POST['obyem'];}
if (isset($_POST['mesta'])) {$mesta = $_POST['mesta'];}
if (isset($_POST['maxdlina'])) {$maxdlina = $_POST['maxdlina'];}
if (isset($_POST['maxshirina'])) {$maxshirina = $_POST['maxshirina'];}
if (isset($_POST['maxvysota'])) {$maxvysota = $_POST['maxvysota'];}
if (isset($_POST['cena'])) {$cena = $_POST['cena'];}
if (isset($_POST['sposob'])) {$sposob = $_POST['sposob'];}
if (isset($_POST['otpravitely'])) {$otpravitely = $_POST['otpravitely'];}
if (isset($_POST['tel'])) {$tel = $_POST['tel'];}
if (isset($_POST['kontakt_1'])) {$kontakt_1 = $_POST['kontakt_1'];}
if (isset($_POST['Adres_1'])) {$Adres_1 = $_POST['Adres_1'];}
if (isset($_POST['t1'])) {$t1 = $_POST['t1'];}
if (isset($_POST['t2'])) {$t2 = $_POST['t2'];}
if (isset($_POST['t3'])) {$t3 = $_POST['t3'];}
if (isset($_POST['t4'])) {$t4 = $_POST['t4'];}
if (isset($_POST['t5'])) {$t5 = $_POST['t5'];}
if (isset($_POST['t6'])) {$t6 = $_POST['t6'];}
if (isset($_POST['kontakt_2'])) {$kontakt_2 = $_POST['kontakt_2'];}
if (isset($_POST['tel_2'])) {$tel_2 = $_POST['tel_2'];}
if (isset($_POST['kontakt'])) {$kontakt = $_POST['kontakt'];}
if (isset($_POST['dostavka'])) {$dostavka = $_POST['dostavka'];}
if (isset($_POST['dostavka_1'])) {$dostavka_1 = $_POST['dostavka_1'];}
if (isset($_POST['plat'])) {$plat = $_POST['plat'];}
if (isset($_POST['plat_1'])) {$plat_1 = $_POST['plat_1'];}
if (isset($_POST['forma_plat'])) {$forma_plat = $_POST['forma_plat'];}
$picture = "";
if (empty($punkt_naznacheniya))
{
echo "<b>Не выбран город доставки!<p>";
echo "<a href=Anketa.html>Вернуться к заполнению формы</a>";
exit;
}
else
if (empty($otpravitely))
{
echo "<b>Не указан отправитель!<p>";
echo "<a href=Anketa.html>Вернуться к заполнению формы</a>";
exit;
}
else
if (empty($kontakt_2))
{
echo "<b>Не указан получатель!<p>";
echo "<a href=Anketa.html>Вернуться к заполнению формы</a>";
exit;
}
else
if (empty($ves))
{
echo "<b>Не указан вес<p>";
echo "<a href=Anketa.html>Вернуться к заполнению формы</a>";
exit;
}
else
if (empty($kontakt_1))
{
echo "<b>Не указан телефон отправителя!<p>";
echo "<a href=Anketa.html>Вернуться к заполнению формы</a>";
exit;
}
else
if (empty($Adres_1))
{
echo "<b>Не указан адрес забора груза!<p>";
echo "<a href=Anketa.html>Вернуться к заполнению формы</a>";
exit;
}
 $to = "9119087011@mail.ru";
     $subject = "Заявление на экспедирование с сайта";
     $message = "<strong> $name<br />
                 телефон: $phone<br />
                 Электронный адрес: <a href='mailto:$email'>$email</a> <br />
                 Замечания: </strong><font color=#ff0000>$comments</font ><br />
                <br />
                <table width='450' border='1' cellpadding='1' cellspacing='0' >
                 <tr >
                 <th colspan='2' bgcolor='#ccffff' align='center'>Заявление на экспедирование и отправку груза</th>
                  </tr>
                   <tr >
                <td width='200'>Доставка в город</td>
                <th width='250'>$punkt_naznacheniya</th>
                </tr>
                          <tr >
               <td >Наименование груза</td>
              <th >$naimenovanie</th>
                  </tr>
                 <tr >
                  <td>Вид упаковки</td>
                  <th >$upakovka</th>
                  </tr>
                  <tr >
                <td> Общий вес</td>
                       <th >$ves</th>
                     </tr>
                             <tr >
                              <td> Общий объем</td>
                             <th >$obyem</th>
                         </tr>
</tr>
                             <tr >
                              <td> Количество мест</td>
                             <th >$mesta</th>
                         </tr>
						 </tr>
                             <tr >
                              <td> Способ погрузки</td>
                             <th >$sposob</th>
                         </tr>
<tr >
<td>Максимальная длина</td>
<th >$maxdlina</th>
</tr>
<tr >
<td>Максимальная ширина</td>
<th >$maxshirina</th>
</tr>
<tr >
<td>Максимальная высота</td>
<th >$maxvysota</th>
</tr>
<tr >
<td>Ценность груза</td>
<th >$cena</th>
</tr>
<tr >
<td>Отправитель:</td>
<th >$otpravitely</th>
</tr>
<tr >
<td>Телефон</td>
<th >$tel</th>
</tr>
<tr >
<td>Контактное лицо</td>
<th >$kontakt_1</th>
</tr>
<tr >
<td>Адрес забора груза</td>
<th >$Adres_1</th>
</tr>
<tr >
<td>Режим работы
</td><th>c $t1 до $t2 обед с $t3 до $t4</th>
</tr>
<tr >
<td>Готовность</td>
<th>дата $t5 время $t6</th>
</tr>
<tr >
<td>Получатель:</td>
<th >$kontakt_2</th>
</tr>
<tr >
<td>Телефон</td>
<th >$tel_2</th>
</tr>
<tr >
<td>Контактное лицо</td>
<th >$kontakt</th>
</tr>
<tr >
<td>Доставить до дверей получателя?</td>
<th >$dostavka</th>
</tr>
<tr >
<td>Адрес доставки:</td>
<th >$dostavka_1</th>
</tr>
<tr >
<td>Кто оплачивает</td>
<th >$plat</th>
</tr>
<tr >
<td>Плательщик</td>
<th >$plat_1</th>
</tr>
<tr >
<td>Форма оплаты:</td>
<th >$forma_plat</th>
</tr>
<tr >
<td>Экспедитор</td>
<th ></th>
</tr>
<tr >
<td>Время прибытия</td>
<th ></th>
</tr>
<tr >
<td>Время отправления</td>
<th ></th>
</tr>
<tr >
<td>Общее время</td>
<th ></th>
</tr>
</table>";


if (!empty($_FILES['files1']['tmp_name']))
     {
        $path = $_FILES['files1']['name'];
        if (copy($_FILES['files1']['tmp_name'], $path)) $picture = $path;
     }


if(empty($picture)){
   $headers = "Content-type: text/html; charset=utf-8";
	$send = mail ($to, $subject, $message, $headers);
	if ($send == 'true')
	{
	echo "<p align='center'><b>Спасибо за отправку вашей заявки.<br />";
	echo "В ближайшее время с вами свяжутся наши менеджеры.";
	echo "<a href=index.html>Перейти на главную страницу</a>";
	}
	else

	{
	echo "<p><b>Сбой при отправлении. Сообщение не отправлено!";
	echo "<a href=Anketa.html>Повторить попытку</a>";
	echo "<a href=index.html>Перейти на главную страницу</a>";
	}}
else 
     {
       $fp = fopen($path,"r");
       if (!$fp)
       {
           print "Файл ".$path." не может быть прочитан";
           exit();
       }
       
	   
	   $file = fread($fp, filesize($path));
       fclose($fp);
       $EOL = "\r\n"; // ограничитель строк, некоторые почтовые сервера требуют \n - подобрать опытным путём
    $boundary     = "--".md5(uniqid(time()));  // любая строка, которой не будет ниже в потоке данных.  
    $headers    = "MIME-Version: 1.0;$EOL";   
    $headers   .= "Content-Type: multipart/mixed; boundary=\"$boundary\"$EOL";  
    $headers   .= "From: address@server.com";  
      
    $multipart  = "--$boundary$EOL";   
    $multipart .= "Content-Type: text/html; charset=windows-1251$EOL";   
    $multipart .= "Content-Transfer-Encoding: base64$EOL";   
    $multipart .= $EOL; // раздел между заголовками и телом html-части 
    $multipart .= chunk_split(base64_encode($html));   
 
    $multipart .=  "$EOL--$boundary$EOL";   
    $multipart .= "Content-Type: application/octet-stream; name=\"$name\"$EOL";   
    $multipart .= "Content-Transfer-Encoding: base64$EOL";   
    $multipart .= "Content-Disposition: attachment; filename=\"$path\"$EOL";   
    $multipart .= $EOL; // раздел между заголовками и телом прикрепленного файла 
    $multipart .= chunk_split(base64_encode($file));   
 
    $multipart .= "$EOL--$boundary--$EOL";   

$send = mail ($to, $subject, $message, $multipart, $headers);


if ($send == 'true')
{
echo "<p align='center'><b>Спасибо за отправку вашей заявки.<br />";
echo "В ближайшее время с вами свяжутся наши менеджеры.";
echo "<a href=index.html>Перейти на главную страницу</a>";
}
else

{
echo "<p><b>Сбой при отправлении. Сообщение не отправлено!";
echo "<a href=Anketa.html>Повторить попытку</a>";
echo "<a href=index.html>Перейти на главную страницу</a>";
}}

?>
</body>
</html>