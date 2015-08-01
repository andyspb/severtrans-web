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
 <b style="position:relative; color:#330099">Запуск рассылки счетов</b>
 <form action="testreg1.php" method="post">
	<input type="submit" value="Отправить все счета"  />
    </form> <br> 
    <b style="position:relative; color:#330099">Поздравить всех</b>
 <form action="NG.php" method="post">
	<input type="submit" value="start"  />
    </form> <br> 
    <b style="position:relative; color:#330099">Новый e-mail</b><br>
 <form action="send_email.php" method="post">
         <label for="count" >Введите ИНН</label>
             <input name="innn" type="text_forma" style="position:relative; left:10px; width: 120px" value="" />
              <label for="email" style="position:relative; left:30px">Введите e-mail</label>
             <input name="email" type="text_forma" style="position:relative; left:40px; width: 200px" value="" />
             <input type="submit"  style="position:relative; left:60px" value="ДОБАВИТЬ"  />
</form> <br> <br> 
    <b style="position:relative; color:#330099">Повторно отправить счет на почту</b><br>
 <form action="send_sec.php" method="post">
         <label for="count" >Введите №</label>
             <input name="count" type="text_forma" style="position:relative; left:10px; width: 80px" value="" />
             <label style="position:relative; left:38px;">с НДС</label> 
<input type="radio" id="nds" value="1" checked="checked"  name="mm" style="position:relative; left:38px;" />
<label style="position:relative; left:38px;">без НДС</label> 
<input type="radio" id="nonds" value="0" name="mm" style="position:relative; left:38px;"/> 
<input type="submit"  style="position:relative; left:60px" value="ОТПРАВИТЬ"  />
</form> 
<?php if($link) 
	$select_db = mysql_select_db($db);
	$sql = "SELECT *, DATE_FORMAT(data,'%d.%m.%Y') as eurodate FROM `acc_new` ORDER by id DESC";
$query = mysql_query($sql);
if(!mysql_num_rows($query)) 
        echo "Счета на предоплату отсутствуют";
    else
    { ?>
    <br><br>
    <b style="position:relative; color:#330099">Список счетов на предоплату или сумму задолжности</b>
    <?php
		  
	echo '<table width="500" border="1" cellspacing="0" cellpadding="0" style="text-align:center; font-size:12px;">';
	echo '<tr> <th width="80"> Номер </th><th width="70">Дата</th> <th width="200"> Заказчик</th><th width="40"> НДС</th><th width="100"> Сумма</th></tr>';
	while($row = mysql_fetch_assoc($query))
        {echo '<tr><td>'."С-".$row['id'].'</td><td>'.$row['eurodate'].'</td><td>'.$row['alias'].'</td><td width="80">'.$row['nds'].'</td><td>'.$row['sum'].'</td></tr>';}
		   echo '</table><br>';
		   }
		   mysql_close($link);
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
if ($_SESSION['a'] == 0) {?>
<div id="container4"><b>Экспедитор ООО "Севертранс"</b><a style="font-size:10px;" href="documents/Severtrans/inform_severtrans .xls"> скачать реквизиты</a></div>
<?php
}
else 
{if ($_SESSION['f'] === false)
{
	?>
<div id="container4"><b>Экспедитор ООО "Севертранс ТЭК" </b><a style="font-size:10px;" href="documents/SevertransTEK/inform_tek.doc"> скачать реквизиты</a></div>
<?php }
else { $fl=4;
?>
<div id="container4"><b>Транспортная компания Севертранс ТЭК </b><a style="font-size:10px;" href="documents/SevertransTEK/inform_tek.doc"> скачать реквизиты</a></div>
<?php
}}
include "my.php";
if($link) 
	$select_db = mysql_select_db($db);
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
            <input id="tab_3" type="radio" name="radio_set" class="tab_selector_3" />
			<label for="tab_3" class="tab_label_3"><h1>Взаиморасчет</h1></label>
	<div class="clear_shadow"></div>
			<div class="content">
				<div class="content_1">
<?php
$z = 0;
$sql = "SELECT *, DATE_FORMAT(date,'%d.%m.%Y') as eurodate FROM `sends` WHERE alias = '$alias' AND date > NOW() - INTERVAL 32 DAY ORDER by id DESC";
$query = mysql_query($sql);
if(!mysql_num_rows($query)) 
        echo "За последние 30 дней, отправок с Вашей оплатой не было.<br>";
    else
    {
		echo '<h3>Данные грузоперевозки оплачивает  '.$_SESSION['name'].' :</h3>';  
	echo '<table width="800" border="1" cellspacing="0" cellpadding="0" style="text-align:center; font-size:12px;">';
	echo '<tr> <th width="80"> Дата </th><th width="70">№ ТН</th> <th width="150"> Отправитель</th><th width="150"> Получатель</th><th width="110"> Город</th><th>Вес</th><th> Объем</th><th idth="70"> Места</th><th>Сумма</th></tr>';
	while($row = mysql_fetch_assoc($query))
        {$sender = $row['sender'];
		$z=$z+$row['total'];
		   echo '<tr><td>'.$row['eurodate'].'</td><td>'.$row['number'].'</td><td>'.$row['sender'].'</td><td width="80">'.$row['receiver'].'</td><td>'.$row['destination'].'</td><td>'.$row['weight'].'</td><td>'.$row['volume'].'</td><td>'.$row['seats'].'</td><td>'.$row['total'].'</td></tr>';}
		   echo '</table><br><br>';
		   }
		   echo 'Всего осуществлено перевозок на общую сумму:  <b>'.$z.' руб</b><br><br>';
?>
					</div>
				<div class="content_2">
<?php
$z = 0;
$sqlw = "SELECT *, DATE_FORMAT(date,'%d.%m.%Y') as eurodate FROM `paysheets` WHERE (alias = '$alias') AND date > NOW() -INTERVAL 32 DAY ORDER by id DESC";
$queryw = mysql_query($sqlw);
if(!mysql_num_rows($queryw)) 
echo "Платежные поручения не найдены.<br>";
else
{
	echo "Платежные поручения за 30 дней:<br><br>"; 
	echo '<table width="300" border="1" cellspacing="0" cellpadding="0" style="text-align:center; font-size:12px;">';
	echo '<tr> <th width="80"> Дата </th><th width="100">Номер п/п</th> <th width="100"> Сумма</th></tr>';
	while($roww = mysql_fetch_assoc($queryw))
        {
			$z=$z+$roww['sum'];
			echo '<tr><td>'.$roww['eurodate'].'</td><td>'.$roww['number'].'</td><td>'.$roww['sum'].'</td></tr>';}
			echo '</table><br>';
			echo 'Итого:  <b>'.$z.'</b> руб';
		   }
		   ?>
		   <div class="content_2" style="left:320px; top:-2px;">
		 <?php
		 $g=0;  
		 $sqlin = "SELECT *, DATE_FORMAT(date,'%d.%m.%Y') as eurodate FROM `invoices` WHERE (alias = '$alias') AND date > NOW() -INTERVAL 32 DAY AND (nds > 0) ORDER by id DESC";
		 $queryin = mysql_query($sqlin);
		 if(!mysql_num_rows($queryin)) 
		 {
			 $sqlin = "SELECT *, DATE_FORMAT(date,'%d.%m.%Y') as eurodate FROM `invoices` WHERE (alias = '$alias') AND date > NOW() -INTERVAL 32 DAY AND (nds = 0) ORDER by id DESC";
			 $queryin = mysql_query($sqlin);
			 if(!mysql_num_rows($queryin))
			 echo "  ";
			 else 
			 {
				 echo " Акты выполненных работ за месяц:<br><br> ";
				 echo '<table width="350" border="1" cellspacing="0" cellpadding="0" style="text-align:center; font-size:12px;">';
				 echo '<tr> <th width="80"> Дата </th><th width="100">Номер акта</th> <th width="100"> Сумма</th></tr>';
				 while($rowin = mysql_fetch_assoc($queryin))
				 {
					 $g=$g+$rowin['sum'];
					 echo '<tr><td>'.$rowin['eurodate'].'</td><td>'.$rowin['number'].'</td><td>'.$rowin['sum'].'</td></tr>';
					 }
					 echo '</table><br>';
					 echo 'Итого:  <b>'.$g.'</b> руб';
			 }
			 }
		 
    else
    {
		echo " Счет-фактуры за месяц:<br><br> ";
		echo '<table width="350" border="1" cellspacing="0" cellpadding="0" style="text-align:center; font-size:12px;">';
		echo '<tr> <th width="80"> Дата </th><th width="100">Номер счет-фактуры</th> <th width="100"> Сумма НДС</th><th width="100"> Сумма</th></tr>';
		while($rowin = mysql_fetch_assoc($queryin))
		{
				$g=$g+$rowin['sum'];
				echo '<tr><td>'.$rowin['eurodate'].'</td><td>'.$rowin['number'].'</td><td>'.$rowin['nds'].'</td><td>'.$rowin['sum'].'</td></tr>';
				};
				echo '</table><br>';
				echo 'Итого:  <b>'.$g.'</b> руб';
	 }
?>
					</div></div>
                    <div class="content_3">
                     <form action="pay.php" method="post">
                     <button value="1" name="nn">Акт сверки за 1 квартал</button>
                     <button value="2" name="nn">Акт сверки за 2 квартал</button>
                     <button value="3" name="nn">Акт сверки за 3 квартал</button>
                     <button value="4" name="nn">Акт сверки за 4 квартал</button>
                     
                </form>
       

					</div>
                    </div>
                    </section>
                    </div>
                    </div>
                    </div>
                    <div style=" clear:left;"></div>
                    
                
<div id="container3">
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
}}?></div>
<div id="container3">
<?php
if ($fl == 4)
{?>
<h1>Способы оплаты:</h1>
<ul>
<li>По безналичному расчету;</li>
<li>Наличными, через кассу в любом отделении банка;</li>
<li>Переводом на наш QIWI Кошелёк,  номер +7 911 922 24 30<br>ВНИМАНИЕ!!! В комментариях обязательно указывать ФИО плательщика и номер счета!</li>
</ul>
<?php }
else { ?>

<?php }
?>
</div>
<div id="container6"><h1>... или создать счет на предоплату <br>или на сумму задолжности:</h1>
          <form action="send_US.php" method="post">
        
          <p>
          <label for="summa" style="position:relative;">сумма:</label>
          <input name="summa" type="text_forma" style="position:relative; width: 100px" value="" /></p>
         <label>с НДС</label> 
<input type="radio" id="nds" value="1" checked="checked"  name="mm" />
<label>без НДС</label> 
<input type="radio" id="nonds" value="0" name="mm"/> 
                <p><input type="submit"  value="СОЗДАТЬ"  />
<label style="color: #F33; font-size:11px;">Внимание! Счет подлежит обязательной оплате!</label></p>
                
                </form></div>
</body> <?php } }else  { 
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