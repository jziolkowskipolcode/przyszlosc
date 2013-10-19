<?php

$host = "localhost"; // Host
$username = "www_admin"; // U+-ytkownik
$password = "__ADMIN_www"; // has+éo
$db_name = "przyszlosc"; // baza
// Pod+é?ùcz do bazy
mysql_connect("$host", "$username", "$password") or die("nie mo¿na pod³?czyæ bazy");
mysql_select_db("$db_name") or die("nie mo¿na wybraæ bazy");
mysql_query("SET NAMES 'utf8'");
?>
