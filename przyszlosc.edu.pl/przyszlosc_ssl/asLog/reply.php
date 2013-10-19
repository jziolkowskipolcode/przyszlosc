<?php
//odpowiedź na wiadomość odebraną na stronie przyszlosc.edu.pl

$wiadomosc = $_REQUEST['mss'];
$user = $_REQUEST['user'];
require 'admDB.php';
$query = "select * from WIADOMOSCI where ID = " . $wiadomosc;
$rezult = mysql_query($query);
if ($rezult) {
    $informacje = mysql_fetch_assoc($rezult);
    ?>
    <form name="odp" method="POST" action="senmsg.php">
        <input type="hidden" name="temat" value="Odp:<?php echo $informacje['TEMAT']; ?>">
        <input type="hidden" name="odbiorca[]" value="<?php echo $informacje['PESEL_NADAWCA']; ?>">
        <input type="hidden" name="nad" value="<?php echo $user; ?>">
        <textarea name="tresc" cols="60" rows="10">Wpisz wiadomość</textarea>
        <input type="submit" value="Wyślij">
    </form>


    <?php
}
?>