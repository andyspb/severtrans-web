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

$nds=0;
$alias = $_SESSION['alias'];
$name = $_SESSION['name'];
include "my.php";
$data=date( "d.m.y" );
if ($kf > 0)
{
	$nds=$sum-$sum/1.18;
	$nds=round("$nds", 2);
	$_SESSION['nds'] = $nds;
	$cena=($sum-$nds);
	$_SESSION['cena'] = $cena;
	if($link) 
	$select_db = mysql_select_db($db);
	$sql="INSERT INTO `acc_new` (data, alias, sum, nds) VALUES (NOW(), '$alias', '$sum', '$nds')";
	if(!mysql_query($sql))
	{echo '<center><p><b>Ошибка при добавлении данных!</b></p></center>';}
	else
	{if($link) 
		$select_db = mysql_select_db($db);
		$sql2 = "SELECT * FROM `acc_new` WHERE id IN (SELECT MAX(id) FROM `acc_new` WHERE alias = '$alias')";
		$query2 = mysql_query($sql2);
		$row2 = mysql_fetch_array($query2);
		$id = $row2['id'];
		$_SESSION['id'] = $id;
		$_SESSION['sum'] = $sum;
		$out2=num2str($sum, true);
		$out3=num2str($nds, true);
		define('FPDF_FONTPATH','/home/sevtrans/severtrans-spb.ru/docs/Fpdf/font/');
		require('/home/sevtrans/severtrans-spb.ru/docs/Fpdf/fpdf.php');
		require('printing.class.php');
		$printing = new Printing();
$printing->Open();
$printing->AddFont('ArialMT','','arial.php');
$printing->AddFont('Arial-BoldMT','','arialbd.php');
$printing->AddFont('Arial-BoldItalicMT','','arialbi.php');
$printing->AddPage('L');
$r0=iconv("utf-8", "windows-1251", "Продавец ООО Севертранс");
$r1=iconv("utf-8", "windows-1251", "Адрес 196240, Санкт-Петербург,");
$r2=iconv("utf-8", "windows-1251", "Кубинская ул., д. 75, корп. 2");
$r3=iconv("utf-8", "windows-1251", "ИНН / КПП   7841006701 / 784101001");
$r4=iconv("utf-8", "windows-1251", "Р/сч 40702810329260018883");
$r5=iconv("utf-8", "windows-1251", "в Филиал № 7806 ВТБ24(ЗАО)");
$r6=iconv("utf-8", "windows-1251//TRANSLIT", "кор. счет № ");
$r6=$r6."  30101810300000000811";
$r7=iconv("utf-8", "windows-1251", "БИК  044030811");
$r8=iconv("utf-8", "windows-1251", "Счет № ");
$r8=$r8."  C-";
$r9=iconv("utf-8", "windows-1251", $_SESSION['name']);
$r10=iconv("utf-8", "windows-1251","ИНН: ".$_SESSION['inn']);
$r11=iconv("utf-8", "windows-1251","За транспортно-экспедиторские услуги");
$r= array ($r0, $r1, $r2, $r3, $r4, $r5, $r6, $r7, $r8, $id, $r9, $r10, $r11);
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
$tab = array($t8, $t9, "1.0", $cena, $cena, "18%", $nds, $sum); 
$printing->OutputTable($header,$tab);
$out0=iconv("utf-8", "windows-1251", "Сумма прописью"." :");
$out1=iconv("utf-8", "windows-1251", "в т.ч. НДС"." :");
$out2=iconv("utf-8", "windows-1251", $out2);
$out3=iconv("utf-8", "windows-1251", $out3);
$out=array($out0, $out1, $out2, $out3);
$printing->Outt($out,'acc_nds.jpg');
$printing->Output();}}
?>