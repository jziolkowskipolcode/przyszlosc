<?php
$host = "localhost"; // Host
$username = "www_user"; // Użytkownik
$password = "##Users%$"; // hasło
$db_name="przyszlosc";
// baza
// Podł?cz do bazy
mysql_connect("$host", "$username", "$password") or die("nie można podłączyć bazy");
mysql_query("SET NAMES UTF8");
mysql_select_db("$db_name") or die("nie można wybrać bazy");

?>
