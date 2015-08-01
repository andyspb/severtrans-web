<?php
session_start();
if (isset($_POST['mm'])) {$mm = $_POST['mm'];}
$_SESSION['send'] = $mm;
echo "<html><head><meta http-equiv='Refresh' content='0; URL=LK1.php'></head></html>";
?>