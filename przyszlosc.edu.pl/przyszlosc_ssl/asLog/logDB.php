<?php
// haslo domyslne 876**^%##TER%3____%$66
$host = "localhost"; // Host
$username = "www_admin"; // U+-ytkownik
$password = "__ADMIN_www"; // has+�o
$db_name = "authority"; // baza
// Pod+�?�cz do bazy
mysql_connect("$host", "$username", "$password") or die("nie mo�na pod�?czy� bazy");
mysql_select_db("$db_name") or die("nie mo�na wybra� bazy");
mysql_query("SET NAMES 'latin2'");
?>
