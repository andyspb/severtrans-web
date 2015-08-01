<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Повтор</title>
</head>
<body>
<?php
$kf=$kf*0;
$nds = $nds * 0;

if (isset($_POST['count'])) {$count = $_POST['count'];}
if (isset($_POST['mm'])) {$kf = $_POST['mm'];}
$count = trim($count);
$kf= trim($kf);

define('FPDF_FONTPATH','/home/sevtrans/severtrans-spb.ru/docs/Fpdf/font/');
	require('/home/sevtrans/severtrans-spb.ru/docs/Fpdf/fpdf.php');
	require('printing.class.php');
$from = "severtrans@mail.ru";
$subject = "Cчет за грузоперевозку";
$kk = "Сводка по счетам: <br>";
$sub1 = "Отчет";
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
include "libmail.php";
include ("my.php");
if($link) 
    $select_db = mysql_select_db($db);
if(!$select_db) 
    exit;
else 
{
	if ($kf > 0)
		{
			$sql5 = "SELECT*, DATE_FORMAT(account_date,'%d.%m.%Y') as eurodate FROM `accounts` WHERE account_number = '$count' AND nds > '$kf'";
			$query5 = mysql_query($sql5);
			if(!mysql_num_rows($query5)) 
        	echo "Счет № $count не найден";
    			else
    				{
						$row5 = mysql_fetch_array($query5);
						$data = $row5['eurodate'];
						$nds = $row5['nds'];
						$alias = $row5['alias'];
						$sum = $row5['sum_with_nds'];
						$sql1 = "SELECT * FROM `clients_severtrans` WHERE alias = '$alias'";
						$query1 = mysql_query($sql1);
						$row1 = mysql_fetch_assoc($query1);
						$inn = $row1['inn'];
						$address = $row1['address'];
						$to = $row1['email'];
						$name = $row1['name'];
						$price = $sum - $nds;
						$to_array = explode("; ", $to);
						$message="Здравствуйте. Данный счет не оплачен. Отправляем его повторно.<br/>";
						$message = $message."<table width='800' border='0'>
	<tr height='40'>
    <td colspan='2' style='font-family: Impact; font-size:16px;'><div align='center'>Счет № $count от $data</div></td>
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
   <td>Филиал № 7806 ВТБ 24(ПАО)</td>
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
							</table><br/><b>Сумма прописью:  </b>".num2str($sum, true)."<br><b>в т.ч. НДС:</b> " .num2str($nds, true)."<br><br><br>ВНИМАНИЕ!!!<br> В личном кабинете представлена вся информация по отправкам за 30 дней.<br>Регистрация доступна на нашем сайте <a href='www.severtrans-spb.ru'>severtrans-spb.ru</a><br><br>";
$out2 = num2str($sum, true);
							$out3 = num2str($nds, true);
							$printing = new Printing();
							$printing->Open();
							$printing->AddFont('ArialMT','','arial.php');
							$printing->AddFont('Arial-BoldMT','','arialbd.php');
							$printing->AddPage('L');
							$r0=iconv("utf-8", "windows-1251", "Продавец «ООО Севертранс»");
							$r1=iconv("utf-8", "windows-1251", "Адрес 196240, Санкт-Петербург,");
							$r2=iconv("utf-8", "windows-1251", "Кубинская ул., д. 75, корп. 2");
							$r3=iconv("utf-8", "windows-1251", "ИНН / КПП   7810403410 / 781001001");
							$r4=iconv("utf-8", "windows-1251", "Р/сч 40702810329260018883");
							$r5=iconv("utf-8", "windows-1251", "в Филиал"." "."№ "." ". "7806"." ". "ВТБ"." "."24(ПАО)");
							$r6=iconv("utf-8", "windows-1251//TRANSLIT", "кор. счет № ");
							$r6=$r6."  30101810300000000811";
							$r7=iconv("utf-8", "windows-1251", "БИК  044030811");
							$r8=iconv("utf-8", "windows-1251", "Счет № ");
							$r9=iconv("utf-8", "windows-1251", $name);
							$r10=iconv("utf-8", "windows-1251","ИНН: ".$inn);
							$r11=iconv("utf-8", "windows-1251","За транспортно-экспедиторские услуги");
							$r12=iconv("utf-8", "windows-1251"," "." от "." ".$data );
							$r13=iconv("utf-8", "windows-1251",$address);
							$r14=iconv("utf-8", "windows-1251", "Город  Санкт-Петербург");
							$r= array ($r0, $r1, $r2, $r3, $r4, $r5, $r6, $r7, $r8, $count, $r9, $r10, $r11, $r12, $r13,$r14);
							$printing->Title($r);
							$t0=iconv("utf-8", "windows-1251", "Наименование товара или услуги");
							$t1=iconv("utf-8", "windows-1251", "Ед.изм.,");
							$t2=iconv("utf-8", "windows-1251", "Кол-во");
							$t3=iconv("utf-8", "windows-1251", "Цена");
							$t4=iconv("utf-8", "windows-1251", "Сумма");
							$t5=iconv("utf-8", "windows-1251", "Ставка НДС");
							$t6=iconv("utf-8", "windows-1251", "Сумма НДС");
							$t7=iconv("utf-8", "windows-1251", "Всего с НДС");
							$t8=iconv("utf-8", "windows-1251", "Транспортно-экспедиторские услуги ");
							$t9=iconv("utf-8", "windows-1251", "шт.");
							$header = array($t0, $t1, $t2, $t3, $t4, $t5, $t6, $t7); 
							$tab = array($t8, $t9, "1.0", $price, $price, "18%", $nds, $sum); 
							$printing->OutputTable($header,$tab);
							$out0=iconv("utf-8", "windows-1251", "Сумма прописью"." :");
							$out1=iconv("utf-8", "windows-1251", "в т.ч. НДС"." :");
							$out2=iconv("utf-8", "windows-1251", $out2);
							$out3=iconv("utf-8", "windows-1251", $out3);
							$out=array($out0, $out1, $out2, $out3);
							$printing->Outt($out,'acc_nds.jpg');
							$printing->Output('/home/sevtrans/severtrans-spb.ru/docs/simple.pdf','F');
		$m= new Mail("utf-8");
		$m->From($from);
		$m->To($to_array);
		$m->Subject($subject);
		$m->Body($message, "html" );
		$m->Attach( "simple.pdf" );
		$m->Priority(3);
		$m->Organization( "ООО Севертранс" );
		$m->Receipt();
		$m->Send();
		$error = $m->status_mail['message'];
		$kk="Счет для  ".$alias."  "."№".$count."  "."на адрес ".$to." результат - ".$error."<br />";
							
					  }
			}
		else 
		 {
			$sql5 = "SELECT*, DATE_FORMAT(account_date,'%d.%m.%Y') as eurodate FROM `accounts` WHERE account_number = '$count' AND nds <= '$kf'";
			$query5 = mysql_query($sql5);
			if(!mysql_num_rows($query5)) 
        	echo "Счет № $count не найден";
    			else
    				{
						$row5 = mysql_fetch_array($query5);
						$data = $row5['eurodate'];
						$alias = $row5['alias'];
						$sum = $row5['sum_with_nds'];
						$sql1 = "SELECT * FROM `clients_severtrans` WHERE alias = '$alias'";
						$query1 = mysql_query($sql1);
						$row1 = mysql_fetch_assoc($query1);
						$inn = $row1['inn'];
						$address = $row1['address'];
						$to = $row1['email'];
						$name = $row1['name'];
						$to_array = explode("; ", $to);
						
								$message="Здравствуйте. Данный счет не оплачен. Отправляем его повторно.<br/> Внимание!!! Изменились реквизиты банка. Вместо ЗАО теперь ПАО.<br/>";
						$message =$message."<table width='800' border='0'>
	<tr height='40'>
    <td colspan='2' style='font-family: Impact; font-size:16px;'><div align='center'>Счет № $count от $data</div></td>
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
   <td>в  Санкт-Петербургский ф-л ПАО «Балтийский Банк»</td>
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
							</table><br/><b>Сумма прописью:  </b>".num2str($sum, true)."<br><b>в т.ч. НДС:</b> " .num2str($nds, true)."<br><br><br>ВНИМАНИЕ!!!<br> В личном кабинете представлена вся информация по отправкам за 30 дней.<br>Регистрация доступна на нашем сайте <a href='www.severtrans-spb.ru'>severtrans-spb.ru</a>";
		   $out2=num2str($sum, true);
										$out3=num2str($nds, true);
										$printing = new Printing();
										$printing->Open();
										$printing->AddFont('ArialMT','','arial.php');
										$printing->AddFont('Arial-BoldMT','','arialbd.php');
										$printing->AddPage('L');
										$r0=iconv("utf-8", "windows-1251", "Продавец «ООО Севертранс ТЭК»");
										$r1=iconv("utf-8", "windows-1251", "Адрес 196240,Санкт-Петербург,");
										$r2=iconv("utf-8", "windows-1251", "Кубинская ул.,д.75,корп.2,литер А,пом.2-Н ");
										$r3=iconv("utf-8", "windows-1251", "ИНН / КПП   7841007092/781001001");
										$r4=iconv("utf-8", "windows-1251", "Р/сч 40702810600007054271");
										$r5=iconv("utf-8", "windows-1251", "в  Санкт-Петербургский ф-л ПАО «Балтийский Банк»");
										$r6=iconv("utf-8", "windows-1251//TRANSLIT", "кор. счет № ");
										$r6=$r6."  30101810100000000804";
										$r7=iconv("utf-8", "windows-1251", "БИК  044030804");
										$r8=iconv("utf-8", "windows-1251", "Счет № ");
										$r9=iconv("utf-8", "windows-1251", $name);
										$r10=iconv("utf-8", "windows-1251","ИНН: ".$inn);
										$r11=iconv("utf-8", "windows-1251","За транспортно-экспедиторские услуги");
										$r12=iconv("utf-8", "windows-1251"," "." от "." ".$data );
										$r13=iconv("utf-8", "windows-1251",$address);
										$r14=iconv("utf-8", "windows-1251", "Город  Санкт-Петербург");
										$r= array ($r0, $r1, $r2, $r3, $r4, $r5, $r6, $r7, $r8, $count, $r9, $r10, $r11, $r12, $r13,$r14);
										$printing->Title($r);
										$t0=iconv("utf-8", "windows-1251", "Наименование товара или услуги");
										$t1=iconv("utf-8", "windows-1251", "Ед.изм.,");
										$t2=iconv("utf-8", "windows-1251", "Кол-во");
										$t3=iconv("utf-8", "windows-1251", "Цена");
										$t4=iconv("utf-8", "windows-1251", "Сумма");
										$t5=iconv("utf-8", "windows-1251", "Ставка НДС");
										$t6=iconv("utf-8", "windows-1251//TRANSLIT", "Сумма НДС");
										$t7=iconv("utf-8", "windows-1251//TRANSLIT", "Всего с НДС");
										$t8=iconv("utf-8", "windows-1251//TRANSLIT", "Транспортно-экспедиторские услуги ");
										$t9=iconv("utf-8", "windows-1251//TRANSLIT", "шт.");
										$header = array($t0, $t1, $t2, $t3, $t4, $t5, $t6, $t7); 
										$tab = array($t8, $t9, "1.0", $sum, $sum, "-", "-", $sum); 
										$printing->OutputTable($header,$tab);
										$out0=iconv("utf-8", "windows-1251", "Сумма прописью"." :");
										$out1=iconv("utf-8", "windows-1251", "в т.ч. НДС"." :");
										$out2=iconv("utf-8", "windows-1251", $out2);
										$out3=iconv("utf-8", "windows-1251", $out3);
										$out=array($out0, $out1, $out2, $out3);
										$printing->Outt($out,'acc_tek.jpg');
										$printing->Output('/home/sevtrans/severtrans-spb.ru/docs/simple.pdf','F');
		$m= new Mail("utf-8");
		$m->From($from);
		$m->To($to_array);
		$m->Subject($subject);
		$m->Body($message, "html" );
		$m->Attach( "simple.pdf" );
		$m->Priority(3);
		$m->Organization( "ООО Севертранс ТЭК" );
		$m->Receipt();
		$m->Send();
		$error = $m->status_mail['message'];
		$kk="Счет для  ".$alias."  "."№".$count."  "."на адрес ".$to." результат - ".$error."<br /> ";
							
					}
			}
}
mysql_close($link);	
echo $kk;
?>
</body>
</html>