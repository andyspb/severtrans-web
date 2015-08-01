<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Отправка счетов</title>
</head>
<body>
<?php
$em = "severtrans@mail.ru";
$sub = "Cчет за грузоперевозку";
$kk = "Сводка по счетам: <br>";
$ii = 1;
$sub1 = "Сводка по счетам";
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
include ("my.php");
if($link) 
    $select_db = mysql_select_db($db);
if(!$select_db) 
    exit;
else 
{$sql = "SELECT *, DATE_FORMAT(account_date,'%d.%m.%Y') as eurodate FROM `accounts` WHERE account_date< NOW() -INTERVAL 1 DAY  AND account_date > NOW() -INTERVAL 2 DAY ORDER by alias DESC";
$query = mysql_query($sql);
if(!mysql_num_rows($query)) 
        exit;
    else
    { 
	while($row = mysql_fetch_assoc($query))
        {  
$name = $row['name'];
$alias = $row['alias'];
$nds = $row['nds'];
$data = $row['eurodate'];
$num= $row['account_number'];
$sum = $row['sum_with_nds'];
$sql1 = "SELECT * FROM `clients_severtrans` WHERE alias = '$alias'";
$query1 = mysql_query($sql1);
$row1 = mysql_fetch_assoc($query1);
$inn = $row1['inn'];
$address = $row1['address'];
$email = $row1['email'];
if(preg_match("|^[-0-9a-z_\.]+@[-0-9a-z_^\.]+\.[a-z]{2,6}$|i", $email)) 
{
$d="Здравствуйте. Вам выставлен счет, за грузоперевозку <br/>";
$sql5 = "SELECT * FROM `sends` WHERE alias = '$alias' AND date < NOW() -INTERVAL 1 DAY  AND date > NOW() -INTERVAL 2 DAY ";
		$query5 = mysql_query($sql5);
		if(!mysql_num_rows($query5)) 
        $d = "  <br/>";
    else
    { 
	while($row5 = mysql_fetch_assoc($query5))
        {$sender5 = $row5['sender5'];
		  $d=$d."  "."Номер отправки: ".$row5['number']."  "." в город  ".$row5['destination'].", "." отправитель  "."  ".$row5['sender'].",   "."получатель   "."  ".$row5['receiver']." <br/>  "." вес - ".$row5['weight']." кг.;  объем - ".$row5['volume']."  м. куб., стоимость перевозки:  ".$row5['total']." руб "."<br/>";}
		  };
if($nds > 0)
{
$price = $sum - $nds;
$mes = $d."<table width='800' border='0'>
	<tr height='40'>
    <td colspan='2' style='font-family: Impact; font-size:16px;'><div align='center'>Счет № $num от $data</div></td>
  </tr>
  <tr height='15'>
    <td width='400'>Продавец  ООО  «Севертранс» </td>
	<td>Покупатель $name  </td>
	</tr>
	<tr height='15'>
	<td>Адрес: 196240,Санкт-Петербург,Кубинская ул.,д.75,</td>
	<td>ИНН покупателя $inn</td>
	</tr>
	<tr height='15'>
	<td>корп.2</td>
	<td>Адрес: $address</td>
	</tr>
	<tr height='15'>
	<td>Телефон  334-91-44,(55)</td>
	<td></td>
	</tr>
   <tr height='15'>
   <td>ИНН / КПП продавца  7810403410 / 781001001</td>
<td></td>
  </tr>
  <tr height='15'>
   <td>Р/сч. №  40702810329260018883</td>
<td></td>
  </tr>
  <tr height='15'>
   <td>Филиал № 7806 ВТБ 24(ЗАО)</td>
<td></td>
  </tr>
  <tr height='15'>
   <td>кор. счет №  30101810300000000811   БИК  044030811</td>
<td></td>
  </tr>
  <tr height='15'>
   <td>Город  Санкт-Петербург</td>
<td></td>
  </tr>
  
</table>
<br />
<p>Авансовый платеж за транспортно-экспедиторские услуги </p>

 							<table width='800' border='1'>
  								<tr>
    						<td width='280' align='center'>Наименование товара или услуги</td>
    							<td align='center'>Ед.изм.</td>
    						<td align='center'>Кол-во</td>
   							 <td width='80' align='center'>Цена</td>
   							 <td  width='80' align='center'>Сумма</td>
    							<td width='100' align='center'>Ставка НДС</td>
    						<td width='100' align='center'>Сумма НДС</td>
    						<td width='100' align='center'>Всего с НДС</td>
  													</tr>
  										<tr>
   												 <td align='center'>Транспортно-экспедиторские услуги </td>
   						 <td  align='center'>шт.</td>
    						<td align='center'>1.0</td>
    						<td align='center'>$price</td>
   							 <td align='center'>$price</td>
   							 <td align='center'>18%</td>
    							<td align='center'>$nds</td>
    						<td align='center'>$sum</td>
  										</tr>
							</table><br/><b>Сумма прописью:  </b>".num2str($sum, true) ."<br><b>в т.ч. НДС:</b> " .num2str($nds, true)."<br><br><br>ВНИМАНИЕ!!!<br> Счет с печатью можно распечатать в личном кабинете!<br>Регистрация доступна на нашем сайте severtrans-spb.ru";
							
$headers = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=utf-8\r\nFrom:$em";
$send = mail ($email, $sub, $mes, $headers);
if ($send == 'true')
{$kk=$kk.$ii++."  "."Счет для  ".$alias."  "."№".$num."  "."на адрес ".$email."  "."  отправлен <br/>";}
}
else
{
	  $mes =$d."<table width='800' border='0'>
	<tr height='40'>
    <td colspan='2' style='font-family: Impact; font-size:16px;'><div align='center'>Счет № $num от $data</div></td>
  </tr>
  <tr height='15'>
    <td width='400'>Продавец  ООО  «Севертранс ТЭК» </td>
	<td>Покупатель $name  </td>
	</tr>
	<tr height='15'>
	<td>Адрес 196240,Санкт-Петербург,Кубинская ул.,д.75,</td>
	<td>ИНН покупателя $inn</td>
	</tr>
	<tr height='15'>
	<td>корп.2,литер А,пом.2-Н</td>
	<td>Адрес: $address </td>
	</tr>
	<tr height='15'>

	<td>Телефон  334-91-44,(55)</td>
	<td></td>
	</tr>
   <tr height='15'>
   <td>ИНН/КПП продавца  7841007092/781001001</td>
<td></td>
  </tr>
  <tr height='15'>
   <td>Р/сч. №  40702810600007054271</td>
<td></td>
  </tr>
  <tr height='15'>
   <td>в  Санкт-Петербургский ф-л ОАО «Балтийский Банк»</td>
<td></td>
  </tr>
  <tr height='15'>
   <td>кор. счет №  30101810100000000804   БИК  044030804</td>
<td></td>
  </tr>
  <tr height='15'>
   <td>Город  Санкт-Петербург</td>
<td></td>
  </tr>
  
</table>
<br />
<p>Авансовый платеж за транспортно-экспедиторские услуги </p>

 							<table width='800' border='1'>
  								<tr>
    						<td width='280' align='center'>Наименование товара или услуги</td>
    							<td align='center'>Ед.изм.</td>
    						<td align='center'>Кол-во</td>
   							 <td width='80' align='center'>Цена</td>
   							 <td  width='80' align='center'>Сумма</td>
    							<td width='100' align='center'>Ставка НДС</td>
    						<td width='100' align='center'>Сумма НДС</td>
    						<td width='100' align='center'>Всего с НДС</td>
  													</tr>
  										<tr>
   												 <td align='center'>Транспортно-экспедиторские услуги </td>
   						 <td  align='center'>шт.</td>
    						<td align='center'>1.0</td>
    						<td align='center'>$sum</td>
   							 <td align='center'>$sum</td>
   							 <td align='center'>-</td>
    							<td align='center'>-</td>
    						<td align='center'>$sum</td>
  										</tr>
							</table><br/><b>Сумма прописью:  </b>".num2str($sum, true);
		   $headers = "MIME-Version: 1.0\r\n";
 		    $headers .= "Content-type: text/html; charset=utf-8\r\nFrom:$em";
 		   $send = mail ($email, $sub, $mes, $headers);
		    if ($send == 'true')
		     {$kk=$kk.$ii++."  "."Счет для  ".$alias."  "."№".$num."  "."на адрес ".$email."  "."  отправлен <br/>";}
}
}
else {$kk=$kk.$ii++."  "."Счет для  ".$alias."  "."№".$num."  "."на адрес ".$email."  "."  ОШИБКА! СООБЩЕНИЕ НЕ ОТПРАВЛЕНО <br/>";}
		}
	}
$mes1 = "$kk";
$headers = "MIME-Version: 1.0\r\n";
 		  $headers .= "Content-type: text/html; charset=utf-8\r\n";
 		   $send = mail ('severtrans@mail.ru', $sub1, $mes1, $headers);	
	}
	  
	 
?>
</body>
</html>