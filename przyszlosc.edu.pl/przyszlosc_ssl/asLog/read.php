<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" >
<?php
//odczyt wiadomosci odebranej na stronie przyszlosc.edu.pl
//i oznaczenie w bazie jako odebrana

require 'admDB.php';
$query = "select * from WIADOMOSCI where ID = " . $_GET['mss'];
$wynik = mysql_query($query);
$dane = mysql_fetch_assoc($wynik);
echo "<b>Nadawca: </b>  " . $dane['NADAWCA'] . " (" . $dane['PESEL_NADAWCA'] . ")<br><br><b> Data nadania: </b>" . $dane['DATA'] . "<br><br><b>Temat: <br></b>" . $dane['TEMAT'] . "<br><br><b>Treść:</b><br>" . $dane['TRESC'];

$wynik = mysql_query("UPDATE `przyszlosc`.`WIADOMOSCI_POZ` SET `DATA_ODEBRANIA` = CURDATE( ) WHERE `WIADOMOSCI_POZ`.`WIADOMOSC_ID` =" . $_GET['mss'] . " AND `WIADOMOSCI_POZ`.`ODBIORCA` = " . $_GET['user'] . " AND `WIADOMOSCI_POZ`.`DATA_ODEBRANIA` = '0000-00-00';");
?>
<br><br><br>
<a href="reply.php?mss=<?php echo $dane['ID']; ?>&user=<?php echo $_GET['user']; ?>"> Odpowiedz</a>  na tą wiadomość. <br>