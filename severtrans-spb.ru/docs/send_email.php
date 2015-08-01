<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Новый адрес</title>
</head>
<body>
<?php
if (isset($_POST['innn'])) {$innn = $_POST['innn'];}
if (isset($_POST['email'])) {$email = $_POST['email'];}
$email = trim($email);
$innn= trim($innn);
include "my.php";
if($link) 
    $select_db = mysql_select_db($db);
if(!$select_db) 
    echo "нет доступа к БД";
else 
{
$result = mysql_query ("UPDATE `clients_severtrans` SET email='$email' WHERE inn='$innn'");
if ($result == 'true')
{
$sql = "SELECT * FROM `clients_severtrans` WHERE inn='$innn'";
		$query = mysql_query($sql);
		   $row = mysql_fetch_array($query);
	       $alias = $row['alias']; 
		   $email = $row['email'];
		   $saldo = $row['kredit'];
		   $kpp = $row['kpp'];
		   $address = $row['address'];
		   $name = $row['name'];
		   $city = $row['city'];
echo $name;
echo $innn;
echo $email;
}
else
{
echo "Данные не обновлены!";
}
}
mysql_close($link);	
?>
</body>
</html>