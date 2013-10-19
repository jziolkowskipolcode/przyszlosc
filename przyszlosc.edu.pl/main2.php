
<div id="naglowek3" >

    <?php
    
    require 'DB.php';
    if (checkSign2($_GET['szkola']) && checkSign2($_GET['miasto'])) {
    $gdzieJestemQ = mysql_query("SELECT miasto.nazwa as city, szkola.nazwa as szkolka from miasto, szkola where miasto.id= " . $_GET['miasto'] . "
     and szkola.miasto=" . $_GET['miasto'] . "
     and szkola.id = " . $_GET['szkola']);
    $gdzieJestem = mysql_fetch_array($gdzieJestemQ);
    echo "<h3><a href=index.php?miasto=$_GET[miasto] style=\"background:none; color:black; text-decoration:underline; \">" . $gdzieJestem['city'] . "</a> - <i><font size=3>" . $gdzieJestem['szkolka'] . "</font></i></h3>";
}
    if (isset($_GET['szkola']) && is_numeric($_GET['szkola']) && strlen($_GET['szkola']) < 3 && checkSign2($_GET['szkola']) && checkSign2($_GET['miasto'])) {

        $query1 = "select * from " . $db_name . ".zakladki where (szkola = 0 and miasto= " . $_GET['miasto'] . ") or (szkola = " . $_GET['szkola'] . " and miasto= " . $_GET['miasto'] . ") order by nazwa";
        $rezultat1 = mysql_query($query1);
        while ($rekord1 = mysql_fetch_array($rezultat1)) {

           
            echo "<a href = \"javascript:page('artykul.php?art=$rekord1[ID]','artykulXXX');\">" . $rekord1[4] . "</a>";
            echo "<span>&nbsp;</span>";
        }
        
        echo "<a href = \"javascript:page('plan.php?miasto=" . $_GET['miasto'] . "&szkola=" . $_GET['szkola'] . "','artykulXXX');\">Plany zajęć</a>";
    }
    ?>
</div>
<div id="artykulXXX" style="padding-left:0px;  min-height: 700px;">
<?php
if (!isset($_GET['art'])) {

    include 'szkola_opis.php';
}
function checkSign2($tekst) {
    if (preg_match('/[^0-9]/', $tekst) && strlen($tekst) > 3) {
        return 0;
    } else {
        return 1;
    }
}
?>
</div>


