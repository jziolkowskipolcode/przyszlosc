<?php
if(is_numeric($_GET['szkola']) && is_numeric($_GET['miasto']) && strlen($_GET['szkola'])<3 && strlen($_GET['miasto'])<2){
require 'DB.php';

$zapyt = "SELECT OPIS FROM ".$db_name.".szkola where ID = ".$_GET['szkola']." AND MIASTO=".$_GET['miasto'];
$wykonaj = mysql_query($zapyt);
while($zwroc = mysql_fetch_array($wykonaj)){
echo $zwroc['OPIS'];
}
}else echo "B³¹d";
?>