<?php
echo "<b><u>Oferta edukacyjna: \n </u></b><br><br>";
$zapTryby = "select * from " . $db_name . ".tryb order by id asc";
$wykTryb = mysql_query($zapTryby);
while ($dana = mysql_fetch_array($wykTryb)) {
	if(is_numeric($_GET['miasto']) && strlen($_GET['miasto'])<2){
    $zapSzkoly = "select * from " . $db_name . ".szkola where tryb=" . $dana['ID']." AND miasto=".$_GET['miasto'] ;
    $wykonanie = mysql_query($zapSzkoly);
    if(mysql_num_rows($wykonanie)!=0){
        echo "<div id=\"trybik\">".mb_convert_case("<u>Szkoły " . $dana['NAZWA'] . "</u>",MB_CASE_UPPER, "UTF-8")."</div>";
    }
    $wykonanie = mysql_query($zapSzkoly);
    while ($linia = mysql_fetch_array($wykonanie)) {
        echo "<span class=\"hide\">|</span>";
                echo "<a class= sidelink href = javascript:page('main2.php?szkola=$linia[ID]&miasto=$_GET[miasto]','main2');>" . $linia['NAZWA'] . "</a>";
    }
    }
}
?>

