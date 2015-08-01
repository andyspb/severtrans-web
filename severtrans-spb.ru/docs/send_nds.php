<?php
session_start();
?>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
<title></title>
</head>
<body>
<table width="800" border="0">
<tr height="40">
<td colspan="2" style="font-family: Impact; font-size:16px;"><div align="center">Счет № <?=$_SESSION['num']?> от <?=$_SESSION['data']?></div></td>
  </tr>
  <tr height="15">
    <td width="400">Продавец  ООО  «Севертранс ТЭК» </td>
	<td>Покупатель <?=$_SESSION['alias']?>  </td>
	</tr>
	<tr height="15">
	<td>Адрес 196240,Санкт-Петербург,Кубинская ул.,д.75,</td>
	<td>ИНН/КПП <?=$_SESSION['inn']?>/<?=$_SESSION['kpp']?></td>
	</tr>
	<tr height="15">
	<td>корп.2,литер А,пом.2-Н</td>
	<td>Адрес: <?=$_SESSION['address']?></td>
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

 							<table width="800" border="1">
  								<tr>
    						<td width="280" align="center">Наименование товара или услуги</td>
    							<td align="center">Ед.изм.</td>
    						<td align="center">Кол-во</td>
   							 <td width="80" align="center">Цена</td>
   							 <td  width="80" align="center">Сумма</td>
    							<td width="100" align="center">Ставка НДС</td>
    						<td width="100" align="center">Сумма НДС</td>
    						<td width="100" align="center">Всего с НДС</td>
  													</tr>
  										<tr>
   												 <td align="center">Транспортно-экспедиторские услуги </td>
   						 <td  align="center">шт.</td>
    						<td align="center">1.0</td>
    						<td align="center"><?=$_SESSION['cena']?></td>
   							 <td align="center"><?=$_SESSION['cena']?></td>
   							 <td align="center">18%</td>
    							<td align="center"><?=$_SESSION['nds']?></td>
    						<td align="center"><?=$_SESSION['sum']?></td>
  										</tr>
							</table>
        </body>
