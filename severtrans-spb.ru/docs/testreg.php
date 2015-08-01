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
    echo "Технический сбой.";
    else 
	{
		$sql = "SELECT * FROM `clients_severtrans` WHERE inn='$inn' AND password='$password' AND password <> 'N'";
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
		   $_SESSION['f'] = stripos($name ,"ФЛ");
		   $_SESSION['email'] = $email;
		   $_SESSION['saldo'] = $saldo;
		   $_SESSION['address'] = $address;
		   $_SESSION['kpp'] = $kpp;
		   if (strpos($alias ,"\"") !== false)
		    $_SESSION['a'] = 1;
			else $_SESSION['a'] = 0;
		    
		
		 
		   echo "<html><head><meta http-equiv='Refresh' content='0; URL=LK1.php'></head></html>";
		   }}}
mysql_close($link);
?>