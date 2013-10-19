<style type="text/css">a:hover { background: white } a{padding:5px}</style>
<?php
require 'DB.php';
//wyswietlanie artykulow z bazy danych
$artykul = $_GET['art'];

$query1 = "select * from " . $db_name . ".tresci where zakladka =" . $artykul . " order by id desc";
$rezultatxx = mysql_query($query1);
while ($rekordx = mysql_fetch_array($rezultatxx)) {
    echo "<h2>" . $rekordx['NAGLOWEK'] . "</h2><hr><br>";
    echo $rekordx['BODY'];
}
?>
