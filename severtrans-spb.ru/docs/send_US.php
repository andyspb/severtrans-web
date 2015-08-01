<?php
session_start();
if (isset($_POST['summa'])) {$sum = $_POST['summa'];}
if (isset($_POST['mm'])) {$kf = $_POST['mm'];}
$_1_2[1]="одна "; $_1_2[2]="две "; $_1_19[1]="один "; $_1_19[2]="два "; $_1_19[3]="три "; $_1_19[4]="четыре "; $_1_19[5]="пять "; $_1_19[6]="шесть "; $_1_19[7]="семь "; $_1_19[8]="восемь "; $_1_19[9]="девять "; $_1_19[10]="десять "; $_1_19[11]="одиннацать "; $_1_19[12]="двенадцать "; $_1_19[13]="тринадцать "; $_1_19[14]="четырнадцать ";
	$_1_19[15]="пятнадцать "; $_1_19[16]="шестнадцать "; $_1_19[17]="семнадцать "; $_1_19[18]="восемнадцать "; $_1_19[19]="девятнадцать "; $des[2]="двадцать ";
 $des[3]="тридцать "; $des[4]="сорок "; $des[5]="пятьдесят "; $des[6]="шестьдесят "; $des[7]="семьдесят "; $des[8]="восемдесят "; $des[9]="девяносто "; $hang[1]="сто ";
	$hang[2]="двести "; $hang[3]="триста "; $hang[4]="четыреста "; $hang[5]="пятьсот "; $hang[6]="шестьсот "; $hang[7]="семьсот "; $hang[8]="восемьсот "; $hang[9]="девятьсот ";
 
	$namerub[1]="рубль "; $namerub[2]="рубля "; $namerub[3]="рублей "; $nametho[1]="тысяча "; $nametho[2]="тысячи "; $nametho[3]="тысяч ";
 
	$namemil[1]="миллион "; $namemil[2]="миллиона "; $namemil[3]="миллионов "; $namemrd[1]="миллиард "; $namemrd[2]="миллиарда "; $namemrd[3]="миллиардов ";	$kopeek[1]="копейка "; $kopeek[2]="копейки "; $kopeek[3]="копеек ";
 
	function semantic($i,&$words,&$many,$f)
	{
		global $_1_2, $_1_19, $des, $hang, $namerub, $nametho, $namemil, $namemrd;
		$words="";
		$fl=0;
 
		if($i >= 100)
		{
		  $jkl = intval($i / 100);
		  $words.=$hang[$jkl];
		  $i%=100;
		}
 
		if($i >= 20)
		{
		  $jkl = intval($i / 10);
		  $words.=$des[$jkl];
		  $i%=10;
		  $fl=1;
		}
 
		switch($i)
		{
		  case 1: $many=1; break;
		  case 2:
		  case 3:
		  case 4: $many=2; break;
		  default: $many=3; break;
		}
 
		if($i)
		{
		  if($i < 3 && $f == 1)
		   $words.=$_1_2[$i];
		  else
		   $words.=$_1_19[$i];
		}
	}
 
	function num2str($L, $first_upper = false)
	{
		global $_1_2, $_1_19, $des, $hang, $namerub, $nametho, $namemil, $namemrd, $kopeek;
 
		$s=" ";
		$s1=" ";
		//считаем количество копеек, т.е. дробной части числа
		$kop=intval(( $L*100 - intval($L)*100 ));
		//отбрасываем дробную часть
		$L=intval($L);
 
		if($L>=1000000000)
		{
		  $many=0;
		  semantic(intval($L / 1000000000),$s1,$many,3);
		  $s.=$s1.$namemrd[$many];
		  $L%=1000000000;
		  //если ровно сколько-то миллиардов, то хватит считать
		  if($L==0)
		  {
		   $s.="рублей ";
		  }
		}
 
		if($L >= 1000000)
		{
		  $many=0;
		  semantic(intval($L / 1000000),$s1,$many,2);
		  $s.=$s1.$namemil[$many];
		  $L%=1000000;
		  //аналогично если ровно сколько-то миллионов, то хватит считать
		  if($L==0)
		  {
		   $s.="рублей ";
		  }
		}
		if($L >= 1000)
		{
		  $many=0;
		  semantic(intval($L / 1000),$s1,$many,1);
		  $s.=$s1.$nametho[$many];
		  $L%=1000;
		  if($L==0)
		  {
		   $s.="рублей ";
		  }
		}
		if($L != 0)
		{
		  $many=0;
		  semantic($L,$s1,$many,0);
		  $s.=$s1.$namerub[$many];
		}
		//Копейки цифрами. Чтоб были буквами - эти две строки убрать, а предыдущие раскоментировать
		semantic($kop,$s1,$many,1);
		$s .= $kop.' '.$kopeek[$many];
		return trim($s);
	}  
?>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title></title>
    <link rel="stylesheet" type="text/css"  href="css/style_form1.css" media="all" />
	<link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
<body>
<?php
$nds=0;
$alias = $_SESSION['alias'];
$data=date( "d.m.y" );
$_SESSION['data'] = $data;
if ($kf > 0)
{
	$nds=$sum-$sum/1.18;
	$nds=round("$nds", 2);
	$cena=($sum-$nds);
	$_SESSION['nds'] = $nds;
	$_SESSION['cena'] = $cena;
	$_SESSION['sum'] = $sum;}
	else {
		$nds=$nds*0;
		$_SESSION['nds'] = $nds;
		$_SESSION['sum'] = $sum;}
include "my.php";
if($link) 
	$select_db = mysql_select_db($db);
	$sql="INSERT INTO `acc_new` (data, alias, sum, nds) VALUES (NOW(), '$alias', '$sum', '$nds')";
	if(!mysql_query($sql))
	{echo '<center><p><b>Ошибка при добавлении данных!</b></p></center>';}
	else
	{
		$sql2 = "SELECT id FROM `acc_new` WHERE id IN (SELECT MAX(id) FROM `acc_new` WHERE alias = '$alias')";
		$query2 = mysql_query($sql2);
		$row2 = mysql_fetch_array($query2);
		$id = $row2['id'];
		$_SESSION['id'] = $id;}
mysql_close($link);
if ($nds>0)
{
?>
<a style="font-size:12px; position:relative; top:-5px; z-index:100;" href="LK1.php">Личный кабинет</a>
<form action="send_pdf.php" method="post">
<input input type="submit" value="Печать" style=" position:relative; z-index:100; left:80%; top:-20px; color:red">
</form> 
<div style="position:relative; top:-55px;">
<table width="1000" border="0" style="font-size:13px">
<tr height="40">
<td colspan="2" style="font-family: Arial, Helvetica, sans-serif; font-size:12px;"><div align="center"><h1>Счет № C-<?=$id?> от <?=date( "d.m.y" )?><h1></div></td>
  </tr>
  <tr height="15">
    <td width="650">Продавец  ООО "Севертранс"</td>
    
	<td>Покупатель <?=$_SESSION['name']?>  </td>
	</tr>
	<tr height="15">
	<td>Адрес  РФ, 196240, Санкт-Петербург, </td>
	<td>Адрес: <?=$_SESSION['address']?></td>
	</tr>
	<tr height="15">
	<td>Кубинская ул. д.75  корпус 2 </td>
	<td>ИНН / КПП <?=$_SESSION['inn']?> / <?=$_SESSION['kpp']?></td>
	</tr>
	<tr height="15">
	<td>Телефон  334-91-44,(55)</td>
	<td></td>
	</tr>
   <tr height="15">
   <td>ИНН / КПП продавца  7810403410 / 781001001  </td>
<td></td>
  </tr>
  <tr height="15">
   <td>Р/сч. №  40702810329260018883</td>
<td></td>
  </tr>
  <tr height="15">
   <td>Филиал № 7806 ВТБ 24(ПАО)</td>
<td></td>
  </tr>
  <tr height="15">
   <td>кор. счет №  30101810300000000811   БИК  044030811</td>
<td></td>
  </tr>
  <tr height="15">
   <td>Город  Санкт-Петербург</td>
<td></td>
  </tr>
  
</table>
<p>Авансовый платеж за транспортно-экспедиторские услуги </p>

 							<table width="900" border="1" cellspacing="0" cellpadding="0" style="font-size:12px;">
  								<tr>
    						<td width="250" align="center">Наименование товара или услуги</td>
    							<td align="center">Ед.изм.</td>
    						<td align="center">Кол-во</td>
   							 <td width="80" align="center">Цена</td>
   							 <td  width="80" align="center">Сумма</td>
    							<td width="120" align="center">Ставка НДС</td>
    						<td width="120" align="center">Сумма НДС</td>
    						<td width="120" align="center">Всего с НДС</td>
  													</tr>
  										<tr height="45">
   												 <td align="center">Транспортно-экспедиторские услуги </td>
   						 <td  align="center">шт.</td>
    						<td align="center">1.0</td>
    						<td align="center"><?=$cena?></td>
   							 <td align="center"><?=$cena?></td>
   							 <td align="center">18%</td>
    							<td align="center"><?=$nds?></td>
    						<td align="center"><?=$sum?></td>
  										</tr>
							</table>
<?php
echo "<br><b>Сумма прописью:</b> " .num2str($sum, true) ."<br><b>в т.ч. НДС:</b> " .num2str($nds, true);
?><br />
<img src="images/acc/acc_nds.png" width="695" height="210">
</div>
<?php
}
else 
{
?>
<a style="font-size:12px; position:relative; top:-5px;" href="LK1.php">Личный кабинет</a>
<form action="send_pdf.php" method="post">
<input input type="submit" value="Печать" style=" position:relative; z-index:100; left:80%; top:-20px; color:red">
</form> 
<table width="1000" border="0" style="font-size:12px">
<tr height="40">
<td colspan="2" style="font-family: Arial, Helvetica, sans-serif; font-size:12px;"><div align="center"><h1>Счет № C-<?=$id?> от <?=date( "d.m.y" )?><h1></div></td>
  </tr>
  <tr height="15">
    <td width="650">Продавец  ООО  «Севертранс ТЭК» </td>
	<td>Покупатель <?=$_SESSION['name']?>  </td>
	</tr>
	<tr height="15">
	<td>Адрес 196240,Санкт-Петербург,Кубинская ул.,д.75,</td>
	<td>Адрес: <?=$_SESSION['address']?></td>
	</tr>
	<tr height="15">
	<td>корп.2,литер А,пом.2-Н</td>
	<td>ИНН/КПП <?=$_SESSION['inn']?>/<?=$_SESSION['kpp']?></td>
	</tr>
	<tr height="15">
	<td>Телефон  334-91-44,(55)</td>
	<td></td>
	</tr>
   <tr height="15">
   <td>ИНН/КПП продавца  7841007092/781001001</td>
<td></td>
  </tr>
  <tr height="15">
   <td>Р/сч. №  40702810600007054271</td>
<td></td>
  </tr>
  <tr height="15">
   <td>в  Санкт-Петербургский ф-л ОАО «Балтийский Банк»</td>
<td></td>
  </tr>
  <tr height="15">
   <td>кор. счет №  30101810100000000804   БИК  044030804</td>
<td></td>
  </tr>
  <tr height="15">
   <td>Город  Санкт-Петербург</td>
<td></td>
  </tr>
  
</table>
<br />
<p>Авансовый платеж за транспортно-экспедиторские услуги </p>

 							<table width="900" border="1" cellspacing="0" cellpadding="0" style="font-size:12px;">
  								<tr>
    						<td width="350" align="center">Наименование товара или услуги</td>
    							<td align="center">Ед.изм.</td>
    						<td align="center">Кол-во</td>
   							 <td width="80" align="center">Цена</td>
   							 <td  width="80" align="center">Сумма</td>
    							<td width="120" align="center">Ставка НДС</td>
    						<td width="120" align="center">Сумма НДС</td>
    						<td width="120" align="center">Всего с НДС</td>
  													</tr>
  										<tr height="35">
   												 <td align="center">Транспортно-экспедиторские услуги </td>
   						 <td  align="center">шт.</td>
    						<td align="center">1.0</td>
    						<td align="center"><?=$sum?></td>
   							 <td align="center"><?=$sum?></td>
   							 <td align="center">-</td>
    							<td align="center">-</td>
    						<td align="center"><?=$sum?></td>
  										</tr>
							</table>
                           <?php
echo "<br><b>Сумма прописью:</b> " .num2str($_SESSION['sum'], true);
?>
<br>
<img src="images/acc/acc_tek.png" width="810" height="220">
<?php
}
?>
</body>