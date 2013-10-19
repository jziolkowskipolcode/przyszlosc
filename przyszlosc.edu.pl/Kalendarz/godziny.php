<?php
echo $_GET['day']."<br>";
echo "Zaliczone godziny: ".$_GET['zal']."<br>";
echo "Niezaliczone godziny:".$_GET['nzal']."<br>";
echo "<a href =download.php?rap=".$_GET['rap'].">Pobierz raport szczegółowy</a>";
?>