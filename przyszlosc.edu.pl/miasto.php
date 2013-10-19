<div id="main2">
<div id="naglowek4" >

    <?php
    
    require 'DB.php';
    $gdzieJestemQ = mysql_query("SELECT miasto.nazwa as city, szkola.nazwa as szkolka from miasto, szkola where miasto.id= " . $_GET['miasto']);
    $gdzieJestem = mysql_fetch_array($gdzieJestemQ);
    echo "<h3><a href=index.php?miasto=$_GET[miasto] style=\"background:none; color:black; text-decoration:underline; \">" . $gdzieJestem['city'] . "</a></h3>";
    if (checkSign2($_GET['miasto'])) {

        $query1 = "select * from " . $db_name . ".zakladki where miasto= " . $_GET['miasto'] ." and szkola=99";
        $rezultat1 = mysql_query($query1);
          echo "<span class=\"hide\">|</span>";
        while ($rekord1 = mysql_fetch_array($rezultat1)) {

            echo "<span class=\"hide\">|</span>";
            if($rekord1['ID']==89 || $rekord1['ID']==92 || $rekord1['ID']==96){
            echo "<a href = \"javascript:page('miasto-opis.php?miasto=".$_GET['miasto']."','artykulXXX');\">" . $rekord1['NAZWA'] . "</a>";
            }
            else{
            echo "<a href = \"javascript:page('artykul.php?art=$rekord1[ID]','artykulXXX');\">" . $rekord1['NAZWA'] . "</a>";
        }
        }
        echo "<span class=\"hide\">|</span>";
    }
    ?>
</div>
<div id="artykulXXX" style="padding-left:0px;  min-height: 700px;">
<?php

require 'DB.php';
if (is_numeric($_GET['miasto']) && strlen($_GET['miasto']) < 2) {
    $zapyt = "SELECT OPIS FROM " . $db_name . ".miasto where ID = " . $_GET['miasto'];
    $wykonaj = mysql_query($zapyt);
    while ($zwroc = mysql_fetch_array($wykonaj)) {
        echo $zwroc['OPIS'];
    }
}else
    echo "B³¹d";
?>
</div>
</div>