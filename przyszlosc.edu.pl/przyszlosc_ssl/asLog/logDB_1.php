<?php
mysql_close();
$host = "localhost"; // Host
$username = "www_user"; // U¿ytkownik
$password = "##Users%$"; // has³o
$db_name="przyszlosc";
// baza
// Pod³?cz do bazy
mysql_connect("$host", "$username", "$password") or die("nie mo¿na pod³?czyæ bazy");
mysql_select_db("$db_name") or die("nie mo¿na wybraæ bazy");
mysql_query("SET NAMES 'latin2'");
?>
