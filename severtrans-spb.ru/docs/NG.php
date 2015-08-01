<?php
$from = "severtrans@mail.ru";$subject = "Поздравляем с Новым Годом и Рождеством!";include "libmail.php";include ("my.php");
if($link) 
$select_db = mysql_select_db($db);
if(!$select_db) 
exit;
else{$sql = "SELECT * FROM `clients_severtrans`";$query = mysql_query($sql);if(!mysql_num_rows($query))exit;
else{while($row = mysql_fetch_assoc($query)){$to = $row['email'];$to_array = explode("; ", $to);
$message="Уважаемые дамы и господа!<br/>
Мы закончили принимать грузы в этом году.<br/>
Представительства в регионах будут работать до 31 декабря и выдадут все грузы.<br/><br/>
Наша компания от всей души поздравляет Вас<br/>
с наступающим Новым Годом и Рождеством!<br/><br/>
В 2015 году мы начинаем работать с 12 января.
<br/><img src='cid:NG.jpg' style='width:750px; height:750px;'>";
$m= new Mail("utf-8");$m->From($from);$m->To($to_array);$m->Subject($subject);$m->Body($message, "html" );$m->Attach( "NG.jpg" );
$m->Priority(3);$m->Send();}}}?>