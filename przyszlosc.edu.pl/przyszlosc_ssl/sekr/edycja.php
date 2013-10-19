
<?php
if (isset($_REQUEST['artykul'])) {

    $zakladusia = $_REQUEST['zakladka'];
    $nagloweczek = $_REQUEST['naglowek'];
    $bodunio = $_REQUEST['body'];
//	$bodunio = preg_replace('/<p>', 'f', $bodunio); // Remove the start <p> or <p attr="">
//$bodunio = preg_replace('</p>', '<br>', $bodunio); // Replace the end
// Output content without P tags
    $idtresciuni = $_REQUEST['trescid'];
    $idzakladeczki = $_REQUEST['zakladkaid'];
    require 'admDB.php';
    mysql_query("UPDATE " . $db_name . ".`zakladki` SET `NAZWA` = '" . $zakladusia . "' WHERE `zakladki`.`ID` =" . $idzakladeczki);
    mysql_query("UPDATE " . $db_name . ".`tresci` SET `NAGLOWEK` = '" . $nagloweczek . "', `BODY` = '" . $bodunio . "' WHERE `tresci`.`ID` =" . $idtresciuni);
    $miejsce = mysql_query("SELECT * FROM przyszlosc.zakladki WHERE id=" . $idzakladeczki);
    $miejsce1 = mysql_fetch_array($miejsce);
    $miejsce1['ID'];



    header("location:" . $_REQUEST['adres']);
}
if (isset($_REQUEST['edytuj']) && isset($_REQUEST['rmZakladki2'])) {
    ?>
    <form name=addArtMiasto action="edycja.php" method=POST>
    <?php
    $zakla = $_REQUEST['rmZakladki2'];

    foreach ($_REQUEST['rmZakladki2'] as $value) {
        require 'admDB.php';
        $miejsce = mysql_query("SELECT miasto.nazwa as miasto, tryb.nazwa as tryb, szkola.nazwa as szkola, zakladki.nazwa as zakladka FROM przyszlosc.miasto, przyszlosc.szkola, przyszlosc.zakladki WHERE zakladki.id=" . $value . " and miasto.id=zakladki.miasto and szkola.id = zakladki.szkola ");
        while ($miejsce1 = mysql_fetch_array($miejsce)) {
            echo "<img src=miasto.png align=bottom border=0>  " . $miejsce1['miasto'] . "  <img src=szkola.png align=bottom border=0>  " . $miejsce1['szkola'] . "<img src=zakladki.png height= 35px align=bottom border=0>  " . $miejsce1['zakladka'];
        }

        $zapNazwa = mysql_query("select * from " . $db_name . ".zakladki where ID = " . $value);
        $wiersz1 = mysql_fetch_array($zapNazwa);
        $zapTresc = mysql_query("Select * from " . $db_name . ".tresci where zakladka = " . $value);
        include 'tiny.php';
        while ($wiersz2 = mysql_fetch_array($zapTresc)) {
            ?>
                <table>

                    <tr><td> Nazwa zakładki: </td><td><input type ="text" name="zakladka" value="<?php echo $wiersz1[4]; ?>"></td></tr>
                    <tr><td> Nagłówek artykułu: </td><td><input type ="text" name="naglowek" value="<?php echo $wiersz2[2]; ?>"></td></tr>
                    <tr><td colspan="2"><textarea id="elm1" name="body" rows="15" cols="80" style="width: 80%"><?php echo $wiersz2[3]; ?>
                            </textarea></td></tr>
                    <input type ="hidden" name="zakladkaid" value="<?php echo $value; ?>">
                    <input type ="hidden" name="trescid" value="<?php echo $wiersz2[0]; ?>">
                </table>
            <?php
        }
    }
    ?>
        <input type="hidden" name="adres" value="<?php echo $_SERVER['HTTP_REFERER']; ?>">
        <p align="left"><input type ="submit" name="artykul" value="Zapisz zmiany" style="height: 50px; width: 100px; "></p>
        <?php
    } else {
        //header("Location:" . $_SERVER['HTTP_REFERER']);
    }
    ?>
</form>