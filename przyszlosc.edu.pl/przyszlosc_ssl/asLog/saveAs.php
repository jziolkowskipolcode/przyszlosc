<?php
require 'admDB.php';
require 'expires.php';
$folder = $_REQUEST['dir'];
$idpliku = $_REQUEST['file'];
$wynik = mysql_query("select * from eDziennik where Pesel=" . $idpliku);
$wiersz = mysql_fetch_array($wynik);
if($folder==1){
$folder="tmp/oceny/";
$pole="POBRANIA_I";
$pobranie = $wiersz['POBRANIA_I'] + 1;
}
if($folder==2){
$folder="tmp/oceny2/";
$pole="POBRANIA_II";
$pobranie = $wiersz['POBRANIA_II'] + 1;
}
if($folder==3){
$folder="tmp/frekwencja/";
$pole="POBRANIA";
$pobranie = $wiersz['POBRANIA'] + 1;
}





//header('location:https://212.122.206.152');


    $plik = $folder.$idpliku.".pdf";
    // We'll be outputting a PDF
    header('Content-type: application/pdf');

// It will be called downloaded.pdf
    header('Content-Disposition: attachment; filename=przyszlosc.pdf');
    readfile($plik);
    $update = mysql_query("UPDATE `przyszlosc`.`eDziennik` SET `".$pole."` = '" . $pobranie . "' WHERE `eDziennik`.`Pesel`=" . $idpliku);

?>