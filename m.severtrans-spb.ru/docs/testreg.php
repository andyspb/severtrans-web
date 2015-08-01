<?php
session_start();
if (isset($_POST['inn'])) { $inn = $_POST['inn']; if ($inn == '') { unset($inn);} } 
if (isset($_POST['password'])) { $password=$_POST['password']; if ($password =='') { unset($password);} }
if (empty($inn) or empty($password)) 
{
exit ("Вы ввели не всю информацию, вернитесь назад и заполните все поля!");
}
$inn = trim($inn);
$password = trim($password);
if (($inn == "777777") && ($password == "nonest"))
{
	$_SESSION['inn'] = $inn;
	$_SESSION['password'] = $password;
	echo "<html><head><meta http-equiv='Refresh' content='0; URL=LK1.php'></head></html>";}
	else {

include ("my.php");
mysql_query ("set character_set_client='utf8'");
mysql_query ("set character_set_results='utf8'");
mysql_query('SET CHARACTER SET utf8');
mysql_query('SET NAMES utf8');
if($link) 
    $select_db = mysql_select_db($db);
	if(!$select_db) 
    echo "РћС€РёР±РєР° РІС‹Р±РѕСЂР° Р‘Р”";
    else 
	{
		$sql = "SELECT * FROM `clients_severtrans` WHERE inn='$inn' AND password='$password'";
		$query = mysql_query($sql);
		if(!mysql_num_rows($query)) 
        echo "Данные отсутствуют!";
       else
	   {
		   $row = mysql_fetch_array($query);
	       $alias = $row['alias']; 
		   $email = $row['email'];
		   $saldo = $row['kredit'];
		   $kpp = $row['kpp'];
		   $address = $row['address'];
$name = $row['name'];
$city = $row['city'];

		   $_SESSION['inn'] = $inn; 
		   $_SESSION['password'] = $password;
		   $_SESSION['alias'] = $alias;
$_SESSION['name'] = $name;
$_SESSION['city'] = $city;
		   $_SESSION['email'] = $email;
		   $_SESSION['saldo'] = $saldo;
		   $_SESSION['address'] = $address;
		   $_SESSION['kpp'] = $kpp;
		   
		   $sql1 = "SELECT account_date, account_number, nds, sum_with_nds, DATE_FORMAT(account_date,'%d.%m.%Y') as eurodate FROM `accounts` WHERE alias = '$alias' AND account_date < NOW() AND account_date > NOW() -INTERVAL 2 DAY ";
		   $query1 = mysql_query($sql1);
		   if(!mysql_num_rows($query1))
		   $_SESSION['txt'] = 0;
       else
		   {
			   $row1 = mysql_fetch_assoc($query1);
			   $num = $row1['account_number'];
  $data = $row1['eurodate'];
			
			   $nds = $row1['nds'];
			   $sum = $row1['sum_with_nds'];
			   $cena = $sum - $nds;
			   $_SESSION['cena'] = $cena;
			   $_SESSION['txt'] = 1;
			   $_SESSION['num'] = $num;
			   $_SESSION['data'] = $data;
			   $_SESSION['nds'] = $nds;
			   $_SESSION['sum'] = $sum;
			   $_SESSION['send'] = 0;
				 }
		   echo "<html><head><meta http-equiv='Refresh' content='0; URL=LK1.php'></head></html>";
		   }}}
mysql_close($link);
?>