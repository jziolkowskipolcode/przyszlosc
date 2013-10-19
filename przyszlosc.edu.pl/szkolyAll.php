<?php
echo "WYBIERZ MIASTO: \n <br>";
$zapMiasto = "select * from " . $db_name . ".miasto order by id asc";
$wykTryb = mysql_query($zapMiasto);
while ($dana = mysql_fetch_array($wykTryb)) {
           
        echo "<span class=\"hide\">|</span>";
               echo "<a class= sidelink href = index.php?miasto=".$dana['ID'].">". $dana['NAZWA'] . "</a>";
    
}
?>
