<?php

    function checkSign2($tekst) {
    if (preg_match('/[^0-9]/', $tekst) && strlen($tekst) > 4) {
        return 0;
    } else {
        return 1;
    }
}

require 'admDB.php';
$idpliku = $_REQUEST['fn'];
if(checkSign2($idpliku)){
//header('location:https://212.122.206.152');

$wynik = mysql_query("select * from PlanLekcji where ID=" . $idpliku);

$wiersz = mysql_fetch_array($wynik);
if ($wynik) {
    $plik = $wiersz['Plan'];
    // We'll be outputting a PDF
    header('Content-type: application/pdf');

// It will be called downloaded.pdf
    header('Content-Disposition: attachment; filename="plan.pdf"');

// The PDF source is in original.pdf
//readfile('plan.pdf');
//    header('Content-type: image/jpeg');
    echo $plik;
    $pobranie = $wiersz['POBRANIA'] + 1;
    $update = mysql_query("UPDATE `przyszlosc`.`PlanLekcji` SET `POBRANIA` = '" . $pobranie . "' WHERE `PlanLekcji`.`ID`=" . $idpliku);
} else {
    echo mysql_error();
}
}
?>