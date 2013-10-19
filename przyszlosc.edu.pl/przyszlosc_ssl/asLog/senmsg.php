<?php

$temat = $_POST['temat'];
$tresc = $_POST['tresc'];
$nadawca = $_POST['nad'];
$podpis = $_POST['nadawca'];
require 'admDB.php';
$query = "INSERT INTO `przyszlosc`.`WIADOMOSCI` (
`ID` ,
`DATA` ,
`TEMAT` ,
`TRESC` ,
`NADAWCA` ,
`PESEL_NADAWCA`
)
VALUES (
NULL ,
CURRENT_TIMESTAMP , '$temat', '$tresc', '$nadawca', '$nadawca'
);";
if (mysql_query($query))
    $id = mysql_query("select last_insert_id() as son");
$a = mysql_fetch_assoc($id);

$odbiorca = $_POST['odbiorca'];

foreach ($odbiorca as $v) {
    mysql_query("INSERT INTO `przyszlosc`.`WIADOMOSCI_POZ` (`WIADOMOSC_ID`, `ODBIORCA`, `DATA_ODEBRANIA`) 
    VALUES ('$a[son]', '$v', '0000-00-00');");
}
echo "Wiadomość wysłana. <a href=\"javascript:window.close();\">Zamknij</a>";
?>