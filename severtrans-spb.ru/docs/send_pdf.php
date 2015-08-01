<?php
session_start();
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
$data = $ned[$nednum]." ".date("d")." ".$mes[$mesnum]." ".date("Y")." года";
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
if ($_SESSION['nds'] > 0)
{
	$out2=num2str($_SESSION['sum'], true);
	$out3=num2str($_SESSION['nds'], true);
	define('FPDF_FONTPATH','/home/sevtrans/severtrans-spb.ru/docs/Fpdf/font/');
	require('/home/sevtrans/severtrans-spb.ru/docs/Fpdf/fpdf.php');
	require('printing.class.php');
	$printing = new Printing();
	$printing->Open();
	$printing->AddFont('ArialMT','','arial.php');
	$printing->AddFont('Arial-BoldMT','','arialbd.php');
	$printing->AddFont('Arial-BoldItalicMT','','arialbi.php');
	$printing->AddPage('L');
	$r0=iconv("utf-8", "windows-1251", "Продавец ООО «Севертранс»");
	$r1=iconv("utf-8", "windows-1251", "Адрес 196240, Санкт-Петербург,");
	$r2=iconv("utf-8", "windows-1251", "Кубинская ул., д. 75, корп. 2");
	$r3=iconv("utf-8", "windows-1251", "ИНН / КПП   7810403410 / 781001001");
	$r4=iconv("utf-8", "windows-1251", "Р/сч 40702810329260018883");
	$r5=iconv("utf-8", "windows-1251", "в Филиал"." "."№ "." ". "7806"." ". "ВТБ"." "."24(ПАО)");
	$r6=iconv("utf-8", "windows-1251//TRANSLIT", "кор. счет № ");
	$r6=$r6."  30101810300000000811";
	$r7=iconv("utf-8", "windows-1251", "БИК  044030811");
	$r8=iconv("utf-8", "windows-1251", "Счет № ");
	$r8=$r8."  C-";
	$r9=iconv("utf-8", "windows-1251", $_SESSION['name']);
	$r10=iconv("utf-8", "windows-1251","ИНН: ".$_SESSION['inn']);
	$r11=iconv("utf-8", "windows-1251","За транспортно-экспедиторские услуги");
	$r12=iconv("utf-8", "windows-1251"," от \"".date("d")."\" ".$mes[$mesnum]." ".date("Y")." года");
	$r13=iconv("utf-8", "windows-1251",$_SESSION['address']);
	$r14=iconv("utf-8", "windows-1251", "Город  Санкт-Петербург");
	$r= array ($r0, $r1, $r2, $r3, $r4, $r5, $r6, $r7, $r8, $_SESSION['id'], $r9, $r10, $r11, $r12, $r13,$r14);
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
	$tab = array($t8, $t9, "1.0", $_SESSION['cena'], $_SESSION['cena'], "18%", $_SESSION['nds'], $_SESSION['sum']); 
	$printing->OutputTable($header,$tab);
	$out0=iconv("utf-8", "windows-1251", "Сумма прописью"." :");
	$out1=iconv("utf-8", "windows-1251", "в т.ч. НДС"." :");
	$out2=iconv("utf-8", "windows-1251", $out2);
	$out3=iconv("utf-8", "windows-1251", $out3);
	$out=array($out0, $out1, $out2, $out3);
	$printing->Outt($out,'acc_nds.jpg');
	$printing->Output();}
	else
	{
	$out2=num2str($_SESSION['sum'], true);
	$out3=num2str($_SESSION['nds'], true);
	define('FPDF_FONTPATH','/home/sevtrans/severtrans-spb.ru/docs/Fpdf/font/');
	require('/home/sevtrans/severtrans-spb.ru/docs/Fpdf/fpdf.php');
	require('printing.class.php');
	$printing = new Printing();
	$printing->Open();
	$printing->AddFont('ArialMT','','arial.php');
	$printing->AddFont('Arial-BoldMT','','arialbd.php');
	$printing->AddFont('Arial-BoldItalicMT','','arialbi.php');
	$printing->AddPage('L');
	$r0=iconv("utf-8", "windows-1251", "Продавец ООО «Севертранс ТЭК»");
	$r1=iconv("utf-8", "windows-1251", "Адрес 196240,Санкт-Петербург,");
	$r2=iconv("utf-8", "windows-1251", "Кубинская ул.,д.75,корп.2,литер А,пом.2-Н ");
	$r3=iconv("utf-8", "windows-1251", "ИНН / КПП   7841007092/781001001");
	$r4=iconv("utf-8", "windows-1251", "Р/сч 40702810600007054271");
	$r5=iconv("utf-8", "windows-1251", "в  Санкт-Петербургский ф-л ОАО «Балтийский Банк»");
	$r6=iconv("utf-8", "windows-1251//TRANSLIT", "кор. счет № ");
	$r6=$r6."  30101810100000000804";
	$r7=iconv("utf-8", "windows-1251", "БИК  044030804");
	$r8=iconv("utf-8", "windows-1251", "Счет № ");
	$r8=$r8."  C-";
	$r9=iconv("utf-8", "windows-1251", $_SESSION['name']);
	$r10=iconv("utf-8", "windows-1251","ИНН: ".$_SESSION['inn']);
	$r11=iconv("utf-8", "windows-1251","За транспортно-экспедиторские услуги");
	$r12=iconv("utf-8", "windows-1251"," от \"".date("d")."\" ".$mes[$mesnum]." ".date("Y")." года");
	$r13=iconv("utf-8", "windows-1251",$_SESSION['address']);
	$r14=iconv("utf-8", "windows-1251", "Город  Санкт-Петербург");
	$r= array ($r0, $r1, $r2, $r3, $r4, $r5, $r6, $r7, $r8, $_SESSION['id'], $r9, $r10, $r11, $r12, $r13,$r14);
	$printing->Title($r);
	$t0=iconv("utf-8", "windows-1251", "Наименование товара или услуги");
	$t1=iconv("utf-8", "windows-1251", "Ед.изм.,");
	$t2=iconv("utf-8", "windows-1251", "Кол-во");
	$t3=iconv("utf-8", "windows-1251", "Цена");
	$t4=iconv("utf-8", "windows-1251", "Сумма");
	$t5=iconv("utf-8", "windows-1251", "Ставка НДС");
	$t6=iconv("utf-8", "windows-1251//TRANSLIT", "Сумма НДС");
	$t7=iconv("utf-8", "windows-1251//TRANSLIT", "Всего");
	$t8=iconv("utf-8", "windows-1251//TRANSLIT", "Транспортно-экспедиторские услуги ");
	$t9=iconv("utf-8", "windows-1251//TRANSLIT", "шт.");
	$header = array($t0, $t1, $t2, $t3, $t4, $t5, $t6, $t7); 
	$tab = array($t8, $t9, "1.0", $_SESSION['sum'], $_SESSION['sum'], "-", "-", $_SESSION['sum']); 
	$printing->OutputTable($header,$tab);
	$out0=iconv("utf-8", "windows-1251", "Сумма прописью"." :");
	$out1=iconv("utf-8", "windows-1251", "в т.ч. НДС"." :");
	$out2=iconv("utf-8", "windows-1251", $out2);
	$out3=iconv("utf-8", "windows-1251", $out3);
	$out=array($out0, $out1, $out2, $out3);
	$printing->Outt($out,'acc_tek.jpg');
	$printing->Output();
	}
?>