<div id="naglowek3" >

    <?php
    require 'DB.php';
    $gdzieJestemQ = mysql_query("SELECT miasto.nazwa as city, szkola.nazwa as szkolka from miasto, szkola where miasto.id= " . $_GET['miasto'] . " and szkola.id = " . $_GET['szkola']);
    $gdzieJestem = mysql_fetch_array($gdzieJestemQ);
    echo "<h3>" . $gdzieJestem['city'] . " - " . $gdzieJestem['szkolka'] . "</h3>";

    if (isset($_GET['szkola']) && is_numeric($_GET['szkola']) && strlen($_GET['szkola']) < 3) {

        $query1 = "select * from " . $db_name . ".zakladki where (szkola = 0 and miasto= " . $_GET['miasto'] . ") or (szkola = " . $_GET['szkola'] . " and miasto= " . $_GET['miasto'] . ") order by nazwa";
        $rezultat1 = mysql_query($query1);
        while ($rekord1 = mysql_fetch_array($rezultat1)) {

            echo "<span class=\"hide\">|</span>";
            echo "<a href = \"javascript:page('artykul.php?art=$rekord1[ID]','artykulXXX');\">" . $rekord1[4] . "</a>";
        }
    }
    ?>
</div>
<div id="artykulXXX" style="padding-left:30px; min-height:500px;">
<?php
if (!isset($_GET['art'])) {

    include 'szkola_opis.php';
}
?>
</div>


