<style type="text/css">a{padding:0px}</style>
<?php
if (isset($_GET['art']) && is_numeric($_GET['art']) && strlen($_GET['art']) < 5) {
    require 'DB.php';

    $artykul = $_GET['art'];

    $query1 = "select * from " . $db_name . ".tresci where zakladka =" . $artykul . " order by id desc";
    $rezultatxx = mysql_query($query1);
    while ($rekordx = mysql_fetch_array($rezultatxx)) {
        echo "<h2>" . $rekordx['NAGLOWEK'] . "</h2><hr><br>";
        echo $rekordx['BODY'];
    }
}else
    echo "B³¹d";
?>
