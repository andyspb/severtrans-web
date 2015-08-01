<?php
session_start();
if (isset($_POST['nn'])) {$vz = $_POST['nn'];}
?>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title></title>
    <link rel="stylesheet" type="text/css"  href="css/style_form1.css" media="all" />
	<link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
<body>
<?php
$sum1=$sum1*0;
$sum2=$sum2*0;

$alias = $_SESSION['alias'];
include "my.php";
if($link)
	$select_db = mysql_select_db($db);
if ($vz == 1)
{
echo "Данный период не доступен";
/**$sqlw = "SELECT * FROM `paysheets` WHERE (alias = '$alias') AND date < '2015-01-01'";
$queryw = mysql_query($sqlw);
if(mysql_num_rows($queryw))
{
	while($roww = mysql_fetch_assoc($queryw))
	{
		$sum1=$sum1+$roww['sum'];
		}
		};
$sqlt = "SELECT * FROM `sends` WHERE (alias = '$alias') AND date < '2015-01-01'";
$queryt = mysql_query($sqlt);
if(mysql_num_rows($queryt)) 
{
	while($rowt = mysql_fetch_assoc($queryt))
	{
		$sum2=$sum2+$rowt['total'];
		}
		};
		
$sum1=round("$sum1", 2);
$sum2=round("$sum2", 2);		
$sum=$sum1-$sum2;
$sum=round("$sum", 2);


$sql = "SELECT * FROM `invoices` WHERE (alias = '$alias') AND date < '2015-01-01'";
$query = mysql_query($sql);
if(mysql_num_rows($query)) 
{
	while($row = mysql_fetch_assoc($query))
	{
		$nds=$nds + $row['nds'];
		}
		};		
$sum1=$sum1*0;
$sum2=$sum2*0;
?>
<div align="center" style="width:1000px;"><h1 style="font-size:24px">Акт сверки взаиморасчетов между <?php if ($nds == 0)
{?> ООО "Севертранс ТЭК " <?php } else {?>ООО "Севертранс" <?php } ?> и <?=$_SESSION['name']?> </h1></div>
<div align="right" style="width:1000px;"><p style="font-size:14px;">С "1" января 2015 г. по "31" марта 2015 г.</p></div>
<p style="font-size:16px; width:1000px; float: left;">Сальдо на "1" января 2015 г.: <?=$sum?>  руб.</p><br><br>
<p style="font-size:16px; width:1000px; float: left;"><b>Платежные поручения:</b></p>
<table width="1000" border="1" cellspacing="0" cellpadding="0" style="text-align:center; font-size:16px;">
  <tr>
    <td width="330"><b>Номер</b> </td>
    <td width="330"><b>Дата</b></td>
    <td width="330"><b>Сумма</b></td>
  </tr>
<?php
$sqlw = "SELECT *, DATE_FORMAT(date,'%d.%m.%Y') as eurodate FROM `paysheets` WHERE (alias = '$alias') AND date >= '2015-01-01' AND date < '2015-04-01'";
$queryw = mysql_query($sqlw);
if(mysql_num_rows($queryw)) 
{
	while($roww = mysql_fetch_assoc($queryw))
        {
			$sum1=$sum1+$roww['sum'];
			echo '<tr height="25px"><td>'.$roww['number'].'</td><td>'.$roww['eurodate'].'</td><td>'.$roww['sum'].'</td></tr>';
			}
			}
			else {echo '<tr height="25px"><td width="330"></td><td width="330"></td><td width="330"></td></tr>';};
			?>
            </table>
<div align="right" style="width:1000px; position:relative; top:-15px;" ><p style="font-size:14px;"><b>Итого: <?=$sum1?> руб.</b></p></div>	
   <p style="font-size:16px; width:1000px; float: left;"><b>Отправки:</b></p>
 <table width="1000" border="1" cellspacing="0" cellpadding="0" style="text-align:center; font-size:16px;">
  <tr>
    <td width="195"><b>Номер</b> </td>
    <td width="195"><b>Дата</b></td>
    <td width="195"><b>Сумма</b></td>
    <td width="195"><b><?php if ($nds == 0)
{?> Номер Акта <?php } else {?> Номер Счет<br> фактуры</b> <?php } ?></td>
    <td width="195"><b><?php if ($nds == 0)
{?> Дата Акта <?php } else {?> Дата Счет<br> фактуры</b> <?php } ?></td>
  </tr>	
            <?php
$sqlw = "SELECT *, DATE_FORMAT(date,'%d.%m.%Y') as eurodate FROM `sends` WHERE (alias = '$alias') AND date >= '2015-01-01' AND date < '2015-04-01'";
$queryw = mysql_query($sqlw);
if(mysql_num_rows($queryw)) 
{
	while($roww = mysql_fetch_assoc($queryw))
	{
		$sum2=$sum2+$roww['total'];
		echo '<tr><td>'.$roww['number'].'</td><td>'.$roww['eurodate'].'</td><td>'.$roww['total'].'</td><td>'.$roww['invoice_number'].'</td><td>'.$roww['data_inv'].'</td></tr>';
		}}
		else{echo '<tr height="25px"><td width="195"></td><td width="195"></td><td width="195"></td><td width="195"></td><td width="195"></td></tr>';}; ?>
        </table>
<div align="right" style="width:1000px; position:relative; top:-15px;"><p style="font-size:14px;"><b>Итого: <?=$sum2?> руб.</b> </p></div>	
            <?php
					
	$sum3=$sum-$sum2+$sum1;
	$sum3=round("$sum3", 2);
	?>
    <p style="font-size:16px; width:1000px; float: left;">Сальдо  на "31" марта 2015 г.: <?=$sum3?>  руб.</p><br><br><br><br>
<table width="800" border="0">
  <tr>
    <td width="150">Ген. директор</td>
    <td width="150">&nbsp;</td>
    <td width="150">Ген. директор</td>
    <td width="150">&nbsp;</td>
    <td width="150">/Попов В.С./</td>
  </tr>
  <tr>
    <td><?=$_SESSION['name']?></td>
    <td>&nbsp;</td>
    <td><?php if ($nds == 0)
{?>ООО "Севертранс ТЭК"<?php } else {?>ООО "Севертранс" <?php } ?> </td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table><br><br>
<table width="800" border="0">
  <tr>
    <td width="150">Гл. бухгалтер</td>
    <td width="150">&nbsp;</td>
    <td width="150">Гл. бухгалтер</td>
    <td width="150">&nbsp;</td>
    <td width="150">/Бурлачко М.В./</td>
  </tr>
  <tr>
    <td><?=$_SESSION['name']?></td>
    <td>&nbsp;</td>
    <td><?php if ($nds == 0)
{?>ООО "Севертранс ТЭК"<?php } else {?>ООО "Севертранс" <?php } ?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<br><br><br>	
<?php**/	
}
else
{
	if ($vz == 2)
	{
	$sqlw = "SELECT * FROM `paysheets` WHERE (alias = '$alias') AND date < '2014-04-01'";
$queryw = mysql_query($sqlw);
if(mysql_num_rows($queryw))
{
	while($roww = mysql_fetch_assoc($queryw))
	{
		$sum1=$sum1+$roww['sum'];
		}
		};
$sqlt = "SELECT * FROM `sends` WHERE (alias = '$alias') AND date < '2014-04-01'";
$queryt = mysql_query($sqlt);
if(mysql_num_rows($queryt)) 
{
	while($rowt = mysql_fetch_assoc($queryt))
	{
		$sum2=$sum2+$rowt['total'];
		}
		};
		
$sum1=round("$sum1", 2);
$sum2=round("$sum2", 2);		
$sum=$_SESSION['kredit'];
$sum=round("$sum", 2);
$sql = "SELECT * FROM `invoices` WHERE (alias = '$alias') AND date > '2014-04-01'";
$query = mysql_query($sql);
if(mysql_num_rows($query)) 
{
	while($row = mysql_fetch_assoc($query))
	{
		$nds=$nds + $row['nds'];
		}
		};		
$sum1=$sum1*0;
$sum2=$sum2*0;
?>
<div align="center" style="width:1000px;"><h1 style="font-size:24px">Акт сверки взаиморасчетов между <?php if ($nds == 0)
{?> ООО "Севертранс ТЭК " <?php } else {?>ООО "Севертранс" <?php } ?> и <?=$_SESSION['name']?> </h1></div>
<div align="right" style="width:1000px;"><p style="font-size:14px;">С "1" апреля 2014 г. по "30" июня 2014 г.</p></div>
<p style="font-size:16px; width:1000px; float: left;">Сальдо на "1" апреля 2014 г.: <?=$sum?>  руб.</p><br><br>
<p style="font-size:16px; width:1000px; float: left;"><b>Платежные поручения:</b></p>
<table width="1000" border="1" cellspacing="0" cellpadding="0" style="text-align:center; font-size:16px;">
  <tr>
    <td width="330"><b>Номер</b> </td>
    <td width="330"><b>Дата</b></td>
    <td width="330"><b>Сумма</b></td>
  </tr>
<?php
$sqlw = "SELECT *, DATE_FORMAT(date,'%d.%m.%Y') as eurodate FROM `paysheets` WHERE (alias = '$alias') AND date >= '2014-04-01' AND date < '2014-07-01'";
$queryw = mysql_query($sqlw);
if(mysql_num_rows($queryw)) 
{
	while($roww = mysql_fetch_assoc($queryw))
        {
			$sum1=$sum1+$roww['sum'];
			echo '<tr height="25px"><td>'.$roww['number'].'</td><td>'.$roww['eurodate'].'</td><td>'.$roww['sum'].'</td></tr>';
			}
			}
			else {echo '<tr height="25px"><td width="330"></td><td width="330"></td><td width="330"></td></tr>';};
			?>
            </table>
<div align="right" style="width:1000px; position:relative; top:-15px;" ><p style="font-size:14px;"><b>Итого: <?=$sum1?> руб.</b></p></div>	
 <p style="font-size:16px; width:1000px; float: left;"><b>Отправки:</b></p>
 <table width="1000" border="1" cellspacing="0" cellpadding="0" style="text-align:center; font-size:16px;">
  <tr>
    <td width="195"><b>Номер</b> </td>
    <td width="195"><b>Дата</b></td>
    <td width="195"><b>Сумма</b></td>
    <td width="195"><b><?php if ($nds == 0)

{?> Номер Акта <?php } else {?> Номер Счет<br> фактуры</b> <?php } ?></td>
    <td width="195"><b><?php if ($nds == 0)
{?> Дата Акта <?php } else {?> Дата Счет<br> фактуры</b> <?php } ?></td>
  </tr>	
            <?php
$sqlw = "SELECT *, DATE_FORMAT(date,'%d.%m.%Y') as eurodate FROM `sends` WHERE (alias = '$alias') AND date >= '2014-04-01' AND date < '2014-07-01'";
$queryw = mysql_query($sqlw);
if(mysql_num_rows($queryw)) 
{
	while($roww = mysql_fetch_assoc($queryw))
	{
		$num = trim($roww['invoice_number']);
		$sql1 = "SELECT *, DATE_FORMAT(date,'%d.%m.%Y') as eurodate FROM `invoices` WHERE (alias = '$alias' AND number = '$num')";
$query1 = mysql_query($sql1);
$row1 = mysql_fetch_assoc($query1);
$da = $row1['eurodate'];
		$sum2=$sum2+$roww['total'];
		echo '<tr><td>'.$roww['number'].'</td><td>'.$roww['eurodate'].'</td><td>'.$roww['total'].'</td><td>'.$num.'</td><td>'.$da.'</td></tr>';
		}}
		else{echo '<tr height="25px"><td width="195"></td><td width="195"></td><td width="195"></td><td width="195"></td><td width="195"></td></tr>';}; ?>
        </table>
<div align="right" style="width:1000px; position:relative; top:-15px;"><p style="font-size:14px;"><b>Итого: <?=$sum2?> руб.</b> </p></div>	
            <?php
					
	$sum3=$sum-$sum2+$sum1;
	$sum3=round("$sum3", 2);
	?>
    <p style="font-size:16px; width:1000px; float: left;">Сальдо  на "30" июня 2014 г.: <?=$sum3?>  руб.</p><br><br><br><br>
<table width="800" border="0">
  <tr>
    <td width="150">Ген. директор</td>
    <td width="150">&nbsp;</td>
    <td width="150">Ген. директор</td>
    <td width="150">&nbsp;</td>
    <td width="150">/Попов В.С./</td>
  </tr>
  <tr>
    <td><?=$_SESSION['name']?></td>
    <td>&nbsp;</td>
    <td><?php if ($nds == 0)
{?>ООО "Севертранс ТЭК"<?php } else {?>ООО "Севертранс" <?php } ?> </td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table><br><br>
<table width="800" border="0">
  <tr>
    <td width="150">Гл. бухгалтер</td>
    <td width="150">&nbsp;</td>
    <td width="150">Гл. бухгалтер</td>
    <td width="150">&nbsp;</td>
    <td width="150">/Бурлачко М.В./</td>
  </tr>
  <tr>
    <td><?=$_SESSION['name']?></td>
    <td>&nbsp;</td>
    <td><?php if ($nds == 0)
{?>ООО "Севертранс ТЭК"<?php } else {?>ООО "Севертранс" <?php } ?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<br><br><br>	
<?php	
		
		
		
		
		
	}
	else
	{ if ($vz == 3)
	{
		
	$sqlw = "SELECT * FROM `paysheets` WHERE (alias = '$alias') AND date < '2014-07-01'";
$queryw = mysql_query($sqlw);
if(mysql_num_rows($queryw))
{
	while($roww = mysql_fetch_assoc($queryw))
	{
		$sum1=$sum1+$roww['sum'];
		}
		};
$sqlt = "SELECT * FROM `sends` WHERE (alias = '$alias') AND date < '2014-07-01'";
$queryt = mysql_query($sqlt);
if(mysql_num_rows($queryt)) 
{
	while($rowt = mysql_fetch_assoc($queryt))
	{
		$sum2=$sum2+$rowt['total'];
		}
		};
		
$sum1=round("$sum1", 2);
$sum2=round("$sum2", 2);		
$sum=$sum1-$sum2;
$sum=round("$sum", 2);


$sql = "SELECT * FROM `invoices` WHERE (alias = '$alias') AND date < '2014-07-01'";
$query = mysql_query($sql);
if(mysql_num_rows($query)) 
{
	while($row = mysql_fetch_assoc($query))
	{
		$nds=$nds + $row['nds'];
		}
		};		
$sum1=$sum1*0;
$sum2=$sum2*0;
?>
<div align="center" style="width:1000px;"><h1 style="font-size:24px">Акт сверки взаиморасчетов между <?php if ($nds == 0)
{?> ООО "Севертранс ТЭК " <?php } else {?>ООО "Севертранс" <?php } ?> и <?=$_SESSION['name']?> </h1></div>
<div align="right" style="width:1000px;"><p style="font-size:14px;">С "1" июля 2014 г. по "30" сентября 2014 г.</p></div>
<p style="font-size:16px; width:1000px; float: left;">Сальдо на "1" июля 2014 г.: <?=$sum?>  руб.</p><br><br>
<p style="font-size:16px; width:1000px; float: left;"><b>Платежные поручения:</b></p>
<table width="1000" border="1" cellspacing="0" cellpadding="0" style="text-align:center; font-size:16px;">
  <tr>
    <td width="330"><b>Номер</b> </td>
    <td width="330"><b>Дата</b></td>
    <td width="330"><b>Сумма</b></td>
  </tr>
<?php
$sqlw = "SELECT *, DATE_FORMAT(date,'%d.%m.%Y') as eurodate FROM `paysheets` WHERE (alias = '$alias') AND date >= '2014-07-01' AND date < '2014-10-01'";
$queryw = mysql_query($sqlw);
if(mysql_num_rows($queryw)) 

{
	while($roww = mysql_fetch_assoc($queryw))
        {
			$sum1=$sum1+$roww['sum'];
			echo '<tr height="25px"><td>'.$roww['number'].'</td><td>'.$roww['eurodate'].'</td><td>'.$roww['sum'].'</td></tr>';
			}
			}
			else {echo '<tr height="25px"><td width="330"></td><td width="330"></td><td width="330"></td></tr>';};
			?>
            </table>
<div align="right" style="width:1000px; position:relative; top:-15px;" ><p style="font-size:14px;"><b>Итого: <?=$sum1?> руб.</b></p></div>	
<p style="font-size:16px; width:1000px; float: left;"><b>Отправки:</b></p>
 <table width="1000" border="1" cellspacing="0" cellpadding="0" style="text-align:center; font-size:16px;">
  <tr>
    <td width="195"><b>Номер</b> </td>
    <td width="195"><b>Дата</b></td>
    <td width="195"><b>Сумма</b></td>
    <td width="195"><b><?php if ($nds == 0)
{?> Номер Акта <?php } else {?> Номер Счет<br> фактуры</b> <?php } ?></td>
    <td width="195"><b><?php if ($nds == 0)
{?> Дата Акта <?php } else {?> Дата Счет<br> фактуры</b> <?php } ?></td>
  </tr>	
            <?php
$sqlw = "SELECT *, DATE_FORMAT(date,'%d.%m.%Y') as eurodate FROM `sends` WHERE (alias = '$alias') AND date >= '2014-07-01' AND date < '2014-10-01'";
$queryw = mysql_query($sqlw);
if(mysql_num_rows($queryw)) 
{
	while($roww = mysql_fetch_assoc($queryw))
	{
		$num = trim($roww['invoice_number']);
		$sql1 = "SELECT *, DATE_FORMAT(date,'%d.%m.%Y') as eurodate FROM `invoices` WHERE (alias = '$alias' AND number = '$num')";
$query1 = mysql_query($sql1);
$row1 = mysql_fetch_assoc($query1);
$da = $row1['eurodate'];
		$sum2=$sum2+$roww['total'];
		echo '<tr><td>'.$roww['number'].'</td><td>'.$roww['eurodate'].'</td><td>'.$roww['total'].'</td><td>'.$num.'</td><td>'.$da.'</td></tr>';
		}}
		else{echo '<tr height="25px"><td width="195"></td><td width="195"></td><td width="195"></td><td width="195"></td><td width="195"></td></tr>';}; ?>
        </table>
<div align="right" style="width:1000px; position:relative; top:-15px;"><p style="font-size:14px;"><b>Итого: <?=$sum2?> руб.</b> </p></div>	
            <?php
					
	$sum3=$sum-$sum2+$sum1;
	$sum3=round("$sum3", 2);
	?>
    <p style="font-size:16px; width:1000px; float: left;">Сальдо  на "30" сентября 2014 г.: <?=$sum3?>  руб.</p><br><br><br><br>
<table width="800" border="0">
  <tr>
    <td width="150">Ген. директор</td>
    <td width="150">&nbsp;</td>
    <td width="150">Ген. директор</td>
    <td width="150">&nbsp;</td>
    <td width="150">/Попов В.С./</td>
  </tr>
  <tr>
    <td><?=$_SESSION['name']?></td>
    <td>&nbsp;</td>
    <td><?php if ($nds == 0)
{?>ООО "Севертранс ТЭК"<?php } else {?>ООО "Севертранс" <?php } ?> </td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table><br><br>
<table width="800" border="0">
  <tr>
    <td width="150">Гл. бухгалтер</td>
    <td width="150">&nbsp;</td>
    <td width="150">Гл. бухгалтер</td>
    <td width="150">&nbsp;</td>
    <td width="150">/Бурлачко М.В./</td>
  </tr>
  <tr>
    <td><?=$_SESSION['name']?></td>
    <td>&nbsp;</td>
    <td><?php if ($nds == 0)
{?>ООО "Севертранс ТЭК"<?php } else {?>ООО "Севертранс" <?php } ?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<br><br><br>	
<?php	
		
		
		
		
	}
	else 
	{
		
	$sqlw = "SELECT * FROM `paysheets` WHERE (alias = '$alias') AND date < '2014-10-01'";
$queryw = mysql_query($sqlw);
if(mysql_num_rows($queryw))
{
	while($roww = mysql_fetch_assoc($queryw))
	{
		$sum1=$sum1+$roww['sum'];
		}
		};
$sqlt = "SELECT * FROM `sends` WHERE (alias = '$alias') AND date < '2014-10-01'";
$queryt = mysql_query($sqlt);
if(mysql_num_rows($queryt)) 
{
	while($rowt = mysql_fetch_assoc($queryt))
	{
		$sum2=$sum2+$rowt['total'];
		}
		};
		
$sum1=round("$sum1", 2);
$sum2=round("$sum2", 2);		
$sum=$sum1-$sum2;
$sum=round("$sum", 2);


$sql = "SELECT * FROM `invoices` WHERE (alias = '$alias') AND date < '2014-10-01'";
$query = mysql_query($sql);
if(mysql_num_rows($query)) 
{
	while($row = mysql_fetch_assoc($query))
	{
		$nds=$nds + $row['nds'];
		}
		};		
$sum1=$sum1*0;
$sum2=$sum2*0;
?>
<div align="center" style="width:1000px;"><h1 style="font-size:24px">Акт сверки взаиморасчетов между <?php if ($nds == 0)
{?> ООО "Севертранс ТЭК " <?php } else {?>ООО "Севертранс" <?php } ?> и <?=$_SESSION['name']?> </h1></div>
<div align="right" style="width:1000px;"><p style="font-size:14px;">С "1" октября 2014 г. по "31" декабря 2014 г.</p></div>
<p style="font-size:16px; width:1000px; float: left;">Сальдо на "1" октября 2014 г.: <?=$sum?>  руб.</p><br><br>
<p style="font-size:16px; width:1000px; float: left;"><b>Платежные поручения:</b></p>
<table width="1000" border="1" cellspacing="0" cellpadding="0" style="text-align:center; font-size:16px;">
  <tr>
    <td width="330"><b>Номер</b> </td>
    <td width="330"><b>Дата</b></td>
    <td width="330"><b>Сумма</b></td>
  </tr>
<?php
$sqlw = "SELECT *, DATE_FORMAT(date,'%d.%m.%Y') as eurodate FROM `paysheets` WHERE (alias = '$alias') AND date >= '2014-10-01' AND date < '2015-01-01'";
$queryw = mysql_query($sqlw);
if(mysql_num_rows($queryw)) 
{
	while($roww = mysql_fetch_assoc($queryw))
        {
			$sum1=$sum1+$roww['sum'];
			echo '<tr height="25px"><td>'.$roww['number'].'</td><td>'.$roww['eurodate'].'</td><td>'.$roww['sum'].'</td></tr>';
			}
			}
			else {echo '<tr height="25px"><td width="330"></td><td width="330"></td><td width="330"></td></tr>';};
			?>
            </table>
<div align="right" style="width:1000px; position:relative; top:-15px;" ><p style="font-size:14px;"><b>Итого: <?=$sum1?> руб.</b></p></div>
<p style="font-size:16px; width:1000px; float: left;"><b>Отправки:</b></p>
 <table width="1000" border="1" cellspacing="0" cellpadding="0" style="text-align:center; font-size:16px;">
  <tr>
    <td width="195"><b>Номер</b> </td>
    <td width="195"><b>Дата</b></td>
    <td width="195"><b>Сумма</b></td>
    <td width="195"><b><?php if ($nds == 0)
{?> Номер Акта <?php } else {?> Номер Счет<br> фактуры</b> <?php } ?></td>
    <td width="195"><b><?php if ($nds == 0)
{?> Дата Акта <?php } else {?> Дата Счет<br> фактуры</b> <?php } ?></td>
  </tr>	
            <?php
$sqlw = "SELECT *, DATE_FORMAT(date,'%d.%m.%Y') as eurodate FROM `sends` WHERE (alias = '$alias') AND date >= '2014-10-01' AND date < '2015-01-01'";
$queryw = mysql_query($sqlw);
if(mysql_num_rows($queryw)) 
{
	while($roww = mysql_fetch_assoc($queryw))
	{
		$num = trim($roww['invoice_number']);
		$sql1 = "SELECT *, DATE_FORMAT(date,'%d.%m.%Y') as eurodate FROM `invoices` WHERE (alias = '$alias' AND number = '$num')";
$query1 = mysql_query($sql1);
$row1 = mysql_fetch_assoc($query1);
$da = $row1['eurodate'];
		$sum2=$sum2+$roww['total'];
		echo '<tr><td>'.$roww['number'].'</td><td>'.$roww['eurodate'].'</td><td>'.$roww['total'].'</td><td>'.$num.'</td><td>'.$da.'</td></tr>';
		}}
		else{echo '<tr height="25px"><td width="195"></td><td width="195"></td><td width="195"></td><td width="195"></td><td width="195"></td></tr>';}; ?>
        </table>
<div align="right" style="width:1000px; position:relative; top:-15px;"><p style="font-size:14px;"><b>Итого: <?=$sum2?> руб.</b> </p></div>	
            <?php
					
	$sum3=$sum-$sum2+$sum1;
	$sum3=round("$sum3", 2);
	?>
    <p style="font-size:16px; width:1000px; float: left;">Сальдо  на "31" декабря 2014 г.: <?=$sum3?>  руб.</p><br><br><br><br>
<table width="800" border="0">
  <tr>
    <td width="150">Ген. директор</td>
    <td width="150">&nbsp;</td>
    <td width="150">Ген. директор</td>
    <td width="150">&nbsp;</td>
    <td width="150">/Попов В.С./</td>
  </tr>
  <tr>
    <td><?=$_SESSION['name']?></td>
    <td>&nbsp;</td>
    <td><?php if ($nds == 0)
{?>ООО "Севертранс ТЭК"<?php } else {?>ООО "Севертранс" <?php } ?> </td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table><br><br>
<table width="800" border="0">
  <tr>
    <td width="150">Гл. бухгалтер</td>
    <td width="150">&nbsp;</td>
    <td width="150">Гл. бухгалтер</td>
    <td width="150">&nbsp;</td>
    <td width="150">/Бурлачко М.В./</td>
  </tr>
  <tr>
    <td><?=$_SESSION['name']?></td>
    <td>&nbsp;</td>
    <td><?php if ($nds == 0)
{?>ООО "Севертранс ТЭК"<?php } else {?>ООО "Севертранс" <?php } ?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<br><br><br>	
<?php	
}
	}
}?>