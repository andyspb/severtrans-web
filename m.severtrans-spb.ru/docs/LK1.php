<?php
session_start(); 
if(!empty($_SESSION['inn']) && !empty($_SESSION['password'])) 
{if (($_SESSION['inn'] == "777777") && ($_SESSION['password'] == "nonest"))
{?><head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title></title>
	<link rel="stylesheet" type="text/css"  href="css/style_form1.css" media="all" />
	<link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
<body>
 <h1>Административная зона:</h1> 
<?php
$mes[0]="-";
$mes[1]="января";
$mes[2]="февраля";
$mes[3]="марта";
$mes[4]="апреля";
$mes[5]="мая";
$mes[6]="июня";
$mes[7]="июля";
$mes[8]="августа";
$mes[9]="сентебря";
$mes[10]="октября";
$mes[11]="ноября";
$mes[12]="декабря";
$ned[0]="воскресенье";
$ned[1]="понедельник";
$ned[2]="вторник";
$ned[3]="среда";
$ned[4]="четверг";
$ned[5]="пятница";
$ned[6]="субота";
$nednum=(int)date("w");
$mesnum=(int)date("m");
echo "Сегодня ".$ned[$nednum]." ".date("d")." ".$mes[$mesnum]." ".date("Y")." года<br><br>";
include "my.php";  ?> 
<div style="position:relative; left:80%; top:-50px; width:130px; height:30px; background:#333; text-align:center;"><a style="font-family: Arial, Helvetica, sans-serif; font-size:18px; color: #FFF;" href='exit.php'>выход</a></div> 
 <form action="testreg1.php" method="post">
	<input type="submit" value="Отправить счета"  />
    </form>   
<?php if($link) 
	$select_db = mysql_select_db($db);
	$sql = "SELECT *, DATE_FORMAT(data,'%d.%m.%Y') as eurodate FROM `acc_new` ORDER by id DESC";
$query = mysql_query($sql);
if(!mysql_num_rows($query)) 
        echo "Счета на предоплату отсутствуют";
    else
    {
		echo "Список счетов на предоплату или сумму задолжности";  
	echo '<table width="500" border="1" cellspacing="0" cellpadding="0" style="text-align:center; font-size:12px;">';
	echo '<tr> <th width="80"> Номер </th><th width="70">Дата</th> <th width="200"> Заказчик</th><th width="40"> НДС</th><th width="100"> Сумма</th></tr>';
	while($row = mysql_fetch_assoc($query))
        {echo '<tr><td>'."С-".$row['id'].'</td><td>'.$row['eurodate'].'</td><td>'.$row['alias'].'</td><td width="80">'.$row['nds'].'</td><td>'.$row['sum'].'</td></tr>';}
		   echo '</table><br>';
		   }
		   ?> 
 </body>
<?php }else {?> 
  <head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title></title>
	<link rel="stylesheet" type="text/css"  href="css/style_form1.css" media="all" />
	<link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="css/tabsLK.css" rel="stylesheet" type="text/css" />
    </head>
<body style=" background:#f0f0f2">
<div class="logo2"></div>
<div style="position:relative; float:left; left:80%; top:5px; font-family:Impact; font-size:18px;">Личный кабинет</div> 
<div style=" clear:left; ">  </div>
<div style="position:relative; left:80%; top:5px; width:130px; height:30px; background:#333; text-align:center;"><a style="font-family: Arial, Helvetica, sans-serif; font-size:18px; color: #FFF;" href='exit.php'>выход</a></div> 
<div style="position:relative; top:65px;">
<?php
$mes[0]="-";
$mes[1]="января";
$mes[2]="февраля";
$mes[3]="марта";
$mes[4]="апреля";
$mes[5]="мая";
$mes[6]="июня";
$mes[7]="июля";
$mes[8]="августа";
$mes[9]="сентебря";
$mes[10]="октября";
$mes[11]="ноября";
$mes[12]="декабря";
$ned[0]="воскресенье";
$ned[1]="понедельник";
$ned[2]="вторник";
$ned[3]="среда";
$ned[4]="четверг";
$ned[5]="пятница";
$ned[6]="субота";
$nednum=(int)date("w");
$mesnum=(int)date("m");
echo "Сегодня ".$ned[$nednum]." ".date("d")." ".$mes[$mesnum]." ".date("Y")." года";
include "my.php";
$alias = $_SESSION['alias'];
?></div><div style="position:relative; width:1100px; height:220px; top:80px;">
<div id="container1">
 <table width="400" border="0" style="font-size:12px;">
 <tr>
    <td colspan="2"><h1>Пользователь:</h1></td>
  </tr>
  <tr style="background:#e4e4e4">
    <td width="150">Плательщик</td>
    <td width="250"><?=$_SESSION['name']?></td>
  </tr>
  <tr>
    <td>ИНН / КПП</td>
    <td><?=$_SESSION['inn']?> / <?=$_SESSION['kpp']?></td>
  </tr>
  <tr style="background:#e4e4e4">
    <td>Юр. адрес</td>
    <td><?=$_SESSION['address']?></td>
  </tr>
  <tr>
    <td>e-mail</td>
    <td><?=$_SESSION['email']?></td>
  </tr>
  <tr style="background:#e4e4e4">
    <td><b>Баланс:</b></td>
    <td><?=$_SESSION['saldo']?></td>
  </tr>
</table>
 </div>
<div id="container2">
<div id="tabs"><section class="tabs">
<input id="tab_1" type="radio" name="radio_set" class="tab_selector_1" checked="checked" />
<label for="tab_1" class="tab_label_1"><h1>Мои перевозки</h1></label>
<input id="tab_2" type="radio" name="radio_set" class="tab_selector_2" />
			<label for="tab_2" class="tab_label_2"><h1>Мои платежи</h1></label>
	<div class="clear_shadow"></div>
			<div class="content">
				<div class="content_1">
<?php
$z = 0;
    if($link) 
	$select_db = mysql_select_db($db);
	$sql = "SELECT *, DATE_FORMAT(send_date,'%d.%m.%Y') as eurodate FROM `sends` WHERE alias = '$alias' AND send_date < NOW() AND send_date > NOW() -INTERVAL 30 DAY ORDER by id DESC";
$query = mysql_query($sql);
if(!mysql_num_rows($query)) 
        echo "За последние 30 дней, отправок с Вашей оплатой не было.<br>";
    else
    {
		echo '<h3>Данные грузоперевозки оплачивает  '.$_SESSION['name'].' :</h3>';  
	echo '<table width="750" border="1" cellspacing="0" cellpadding="0" style="text-align:center; font-size:12px;">';
	echo '<tr> <th width="80"> Дата </th><th width="70">Номер</th> <th width="150"> Отправитель</th><th width="150"> Получатель</th><th width="110"> Город</th><th>Вес</th><th> Объем</th><th>Сумма</th></tr>';
	while($row = mysql_fetch_assoc($query))
        {$sender = $row['sender'];
		$z=$z+$row['total'];
		   echo '<tr><td>'.$row['eurodate'].'</td><td>'.$row['number'].'</td><td>'.$row['sender'].'</td><td width="80">'.$row['receiver'].'</td><td>'.$row['destination'].'</td><td>'.$row['weight'].'</td><td>'.$row['volume'].'</td><td>'.$row['total'].'</td></tr>';}
		   echo '</table><br><br>';
		   }
		   echo 'Всего осуществлено перевозок на общую сумму:  <b>'.$z.' руб</b><br><br>';
?>
					</div>
				<div class="content_2">
              <?php
				$z = 0;
    if($link) 
	$select_db = mysql_select_db($db);
	$sql = "SELECT *, DATE_FORMAT(date,'%d.%m.%Y') as eurodate FROM `paysheets` WHERE alias = '$alias' AND date < NOW() AND date > NOW() -INTERVAL 30 DAY ORDER by id DESC";
$query = mysql_query($sql);
if(!mysql_num_rows($query)) 
        echo "Платежные поручения не найдены.<br>";
    else
    {echo "Платежные поручения за 30 дней:<br><br>"; 
	echo '<table width="300" border="1" cellspacing="0" cellpadding="0" style="text-align:center; font-size:12px;">';
	echo '<tr> <th width="80"> Дата </th><th width="100">Номер п/п</th> <th width="100"> Сумма</th></tr>';
	while($row = mysql_fetch_assoc($query))
        {$sender = $row['sender'];
		$z=$z+$row['sum'];
		   echo '<tr><td>'.$row['eurodate'].'</td><td>'.$row['number'].'</td><td>'.$row['sum'].'</td></tr>';}
		   echo '</table><br>';}
		   echo 'Итого:  <b>'.$z.'</b> руб';?>
		   <div class="content_2" style="left:320px;">
		 <?php  
		 if($link) 
	$select_db = mysql_select_db($db); 
		 $sqlin = "SELECT *, DATE_FORMAT(date,'%d.%m.%Y') as eurodate FROM `invoices` WHERE alias = '$alias' AND date < NOW() AND date > NOW() -INTERVAL 30 DAY ORDER by id DESC";
$g=0;
$queryin = mysql_query($sqlin);
if(!mysql_num_rows($queryin)) 
        echo " ";
    else
    { $rowin = mysql_fetch_array($queryin);
		$nds = $rowin['nds'];
		if ($nds>0)
		{echo "Счет-фактуры за 30 дней:<br><br>";
			echo '<table width="350" border="1" cellspacing="0" cellpadding="0" style="text-align:center; font-size:12px;">';
			echo '<tr> <th width="60"> Дата </th><th width="100">Номер с-ф</th> <th width="80"> НДС</th><th width="80"> Сумма</th></tr>';
			while($row = mysql_fetch_assoc($queryin))
			{
				$g=$g+$row['sum'];
				echo '<tr><td>'.$row['eurodate'].'</td><td>'.$row['number'].'</td><td>'.$row['nds'].'</td><td>'.$row['sum'].'</td></tr>';
				}
				echo '</table><br>';
				echo 'Итого:  <b>'.$g.'</b> руб';}
				else {
					echo "Акты выполненных работ за 30 дней:<br><br>";
			echo '<table width="350" border="1" cellspacing="0" cellpadding="0" style="text-align:center; font-size:12px;">';
			echo '<tr> <th width="80"> Дата </th><th width="100">Номер акта</th> <th width="100"> Сумма</th></tr>';
			while($row = mysql_fetch_assoc($queryin))
			{
				$g=$g+$row['sum'];
				echo '<tr><td>'.$row['eurodate'].'</td><td>'.$row['number'].'</td><td>'.$row['sum'].'</td></tr>';
				}
				echo '</table><br>';
				echo 'Итого:  <b>'.$g.'</b> руб';
					}}
			
			
?>
					</div></div>
                    </div></section></div>
                    </div></div><div style=" clear:left;"></div><div id="container6"><h3>Создать счет на предоплату <br>или на сумму задолжности:</h3>
          <form action="send_US.php" method="post">
          <p>
          <label for="summa" style="position:relative;">сумма:</label>
          <input name="summa" type="text_forma" style="position:relative; width: 100px" value="" /></p>
         <label>с НДС</label> 
<input type="radio" id="nds" value="1" checked="checked"  name="mm" />
<label>без НДС</label> 
<input type="radio" id="nonds" value="0" name="mm"/>
                <p><input type="submit"  value="СОЗДАТЬ"  /></p>
                </form></div>
                </div>
         

</div><div id="container3">
<h1>Счета за последние 30 дней</h1>
 <form action="send_USS.php" method="post">
          <label for="count" style="position:relative; left:20px;">Распечатать счет №</label>
             <input name="count" type="text_forma" style="position:relative; left:30px; width: 60px" value="" />
<input type="submit"  style="position:relative; left:30px" value="ПЕЧАТЬ"  />
</form>
<?php
$sql4 = "SELECT account_date, account_number, sum_with_nds, DATE_FORMAT(account_date,'%d.%m.%Y') as eurodate FROM `accounts`  WHERE alias = '$alias' AND account_date < NOW() -INTERVAL 1 DAY  AND account_date > NOW() -INTERVAL 30 DAY ORDER by id DESC";
$query4 = mysql_query($sql4);
if(!mysql_num_rows($query4)) 
       echo "За последние 30 дней счета не выставлялись";
    else
    { 
	while($row4 = mysql_fetch_assoc($query4))
        {  
$data4 = $row4['eurodate'];
$num4= $row4['account_number'];
$sum4 = $row4['sum_with_nds'];
?>
<p>Счет № <b> <?=$num4?> </b> от <b>  <?=$data4?> </b>на сумму <b> <?=$sum4?></b> руб.</p>
<?php
}}?></div></body> <?php } }else  { 
 ?> 
 <head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title></title>
	<link rel="stylesheet" type="text/css"  href="css/style_form1.css" media="all" />
	<link rel="stylesheet" type="text/css" href="css/style.css">
  </head>
<body style=" background:#a4a5aa;">
<div class="lk_fon"></div> 
<div class="logo1" style=" z-index:8;"></div>
<div id="car" style="float:left; z-index:5;">
<div style="position:relative; left:165px; top:45%; float:left">
</div>
<div id="container">

 <h1>Вход в личный кабинет</h1>
<form action="testreg.php" method="post">
	<p><input type="text" class="form1" placeholder="ИНН"  name="inn"/></p>
	<p><input type="text" class="form1" placeholder="пароль" name="password"/></p>
	<input type="submit" value="Вход"  />
	<input type="button" value="Создать свой кабинет" onClick="javascript:window.location='LK_N.html'"/>
    </form>
<h1><a href="index.html">Вернуться на сайт</a></h1>
 </div>
 </div>
 </body>
 <?php } ?>