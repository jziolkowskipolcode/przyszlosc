<?php

    function checkSign2($tekst) {
    if (preg_match('/[^0-9]/', $tekst) && strlen($tekst) > 4) {
        return 0;
    } else {
        return 1;
    }
}

require 'admDB.php';
$idpliku = $_REQUEST['rap'];
if($idpliku!=null){
if(checkSign2($idpliku)){
//header('location:https://212.122.206.152');

$wynik = mysql_query("select * from RCP_Rozliczenie where ID=" . $idpliku." AND UserID = (Select `id` from `authority`.users where login ='".$_COOKIE['username']."');");

$wiersz = mysql_fetch_array($wynik);
if ($wynik) {
    $plik = $wiersz['Raport'];
    // We'll be outputting a PDF
    header('Content-type: application/pdf');

// It will be called downloaded.pdf
    header('Content-Disposition: inline; filename="Rozliczenie.pdf"');

// The PDF source is in original.pdf
//readfile('plan.pdf');
//    header('Content-type: image/jpeg');
    echo $plik;
    $pobranie = $wiersz['Pobrania'] + 1;
    $update = mysql_query("UPDATE `RCP_Rozliczenie` SET `Pobrania` = '" . $pobranie . "' WHERE `ID`=" . $idpliku);
} else {
    echo mysql_error();
}
}
}
else {
echo "Raport nie zosta³ jeszcze wygenerowany.";
}
?>