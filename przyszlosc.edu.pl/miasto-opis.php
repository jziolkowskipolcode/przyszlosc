
<?php

require 'DB.php';
if (is_numeric($_GET['miasto']) && strlen($_GET['miasto']) < 2) {
    $zapyt = "SELECT OPIS FROM " . $db_name . ".miasto where ID = " . $_GET['miasto'];
    $wykonaj = mysql_query($zapyt);
    while ($zwroc = mysql_fetch_array($wykonaj)) {
        echo $zwroc['OPIS'];
    }
}else
    echo "Błąd";
?>
