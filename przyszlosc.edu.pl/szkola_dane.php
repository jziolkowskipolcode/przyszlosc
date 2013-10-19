<?php

echo $_GET['szkola'];
if(is_numeric($_GET['szkola'])&&strlen($_GET['szkola'])<3){
$queryMain = "SELECT `OPIS` FROM ".$db_name.".`szkola` WHERE `ID` =".$_GET['szkola'];
$ryz = mysql_query($queryMain);
while($wierszyk = mysql_fetch_array($ryz)){
    echo "<p>".nl2br($wierszyk[0])."</p>";
}
#
#  Zrobić strone główn± dla danej szkoły (adres czy cos)
#
#
#
}else echo "Błąd";
?>
