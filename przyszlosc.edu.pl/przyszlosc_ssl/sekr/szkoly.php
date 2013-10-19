

<?php
require 'tiny.php';
echo "<a href = ../asLog/logout.php><img src = logout.png alt=\"Wyloguj\" title=\"Wyloguj\" border=0></a> <a href= index.php><img src = strzalka.png alt=\"Wstecz\" title=\"Wstecz\" border=0></a><br>";
require 'admDB.php';
$zapyt = "SELECT NAZWA from " . $db_name . ".miasto where ID=" . $_REQUEST['miasto'];
$wynik = mysql_query($zapyt);
$miejscowosc = mysql_fetch_array($wynik);
echo "<img src=miasto.png align=bottom border=0>  " . $miejscowosc['NAZWA'] . "&nbsp;&nbsp;<hr>";
?>


<?php
if (isset($_REQUEST['nowyTryb']) && strlen($_REQUEST['nowyTryb']) > 0) {

    mysql_query("INSERT INTO " . $db_name . ".`tryb` (
                   `ID` , `NAZWA`
                   ) VALUES (NULL,'" . $_POST['nowyTryb'] . "');");

    $indeks = mysql_query("SELECT max( id ) FROM tryb;");
    $indeks2 = mysql_fetch_array($indeks);
    echo $indeks2[0];
}
$miasto = $_REQUEST['miasto'];
if (isset($_REQUEST['artykul'])) {
    $zakladka = $_REQUEST['zakladka'];
    $naglowekTresc = $_REQUEST['naglowek'];
    $body = $_REQUEST['body'];
    mysql_query("INSERT INTO " . $db_name . ".`zakladki` (
                       `ID` ,`SZKOLA` ,`MIASTO` ,`SYSTEM` ,`NAZWA`)
                        VALUES ( NULL , '0', '$miasto', '0', '$zakladka');
                        ");
    mysql_query("INSERT INTO " . $db_name . ".`tresci` (
                        `ID` ,`ZAKLADKA` ,`NAGLOWEK` ,`BODY`)
                        VALUES (NULL , LAST_INSERT_ID(), '$naglowekTresc', '$body'
                        );");
}

if (isset($_REQUEST['nazwaSzkola']) && !isset($_REQUEST['deltryb']) && strlen($_REQUEST['nazwaSzkola']) > 1) {
    $nazwa = $_REQUEST['nazwaSzkola'];
    if (isset($_REQUEST['nowyTryb']) && strlen($_REQUEST['nowyTryb']) > 0 && isset($_REQUEST['trybAdd'])) {
        $tryb = $indeks2[0];
    } elseif (isset($_REQUEST['nowyTryb']) && strlen($_REQUEST['nowyTryb']) > 0 && !isset($_REQUEST['trybAdd'])) {
        $tryb = $indeks2[0];
    } elseif ((!isset($_REQUEST['nowyTryb']) || strlen($_REQUEST['nowyTryb']) < 2 ) && isset($_REQUEST['trybAdd'])) {
        $tryb = $_REQUEST['trybAdd'];
    }
    $opis = $_REQUEST['opis'];

    $query = "INSERT INTO " . $db_name . ".`szkola` (ID, NAZWA, MIASTO, OPIS,TRYB)
                      VALUES ( null,'$nazwa','$miasto','$opis','$tryb')";
    mysql_query($query);
}
echo "<hr>Wybierz szkołę i zatwierdź:<br><strong>UWAGA! Usunięcie szkoły spowoduje bezpowrotną utratę <u>wszystkich</u> informacji z danej szkoły!</strong><br><br>";
?>
<form name="myform" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
    <?php
    require 'admDB.php';
    $query1 = "SELECT szkola.`ID` , szkola.`NAZWA` , szkola.`OPIS` , tryb.`NAZWA` AS TRYB
FROM " . $db_name . ".`szkola` ,  " . $db_name . ".`tryb`
WHERE miasto= " . $_REQUEST['miasto'] . " AND szkola.`TRYB` = tryb.`ID`
LIMIT 0 , 30";
    // $query1 = "select * from " . $db_name . ".szkola where miasto = " . $_REQUEST['miasto']." order by tryb asc ";
    $rezultat1 = mysql_query($query1);
    while ($rekord1 = mysql_fetch_array($rezultat1)) {

        echo "<input type=radio name=szkola value=" . $rekord1['ID'] . "> " . $rekord1['TRYB'] . "--> <B>" . $rekord1['NAZWA'] . "</B>   <a href = opisSzkola.php?szkola=" . $rekord1['ID'] . "&miasto=" . $miasto . " target=_blank> <img src=opisz.png align=bottom border=0> Opis</a><br>";
    }
    ?>
    <input type ="submit" value ="Wybierz">
    <input type ="hidden" name="miasto" value="<?php echo $miasto; ?>">
    <input type ="submit" name ="delszk" value="Usuń" >
</form>

<hr>
<img src="nowe.png" align="middle">Lub dodaj nową szkołę i zatwierdź:
<form name=addSzkol action="<?php echo $_SERVER['PHP_SELF']; ?>" method=GET>
    <p>
        <?php
        echo "1) Wybierz tryb:<br>";
        $wypisztr = mysql_query("Select * from " . $db_name . ".tryb; ");
        while ($trybs = mysql_fetch_array($wypisztr)) {
            echo "<input type = radio name = trybAdd value=" . $trybs['ID'] . " checked>" . $trybs['NAZWA'] . "<br>";
        }
        ?>
        Lub wpisz nazwę nowego trybu:<br> <input type ="text" name="nowyTryb"><br>
        2) Nazwa szkoły:<br> <input type ="text" name="nazwaSzkola"><br>
        <input type ="hidden" name="miasto" value="<?php echo $miasto; ?>">
        3) Opis szkoły<br>
        <input type ="text" name="opis" value="Wklej kod html strony"><br>
        <input type ="submit" value="Dodaj">
        <input type ="submit" name="deltryb" value="Usuń tryb" >
    </p>
</form>
<br><br>
<hr>
<img src="zakladki.png" align="top"> Zakładki w tej miejscowości (w szkołach):<br>
<?php
$wynik2 = mysql_query("select * from " . $db_name . ".zakladki where MIASTO=" . $miasto." AND SZKOLA!=99");
$i = 0;
echo "<form name=rmZakladki action=" . $_SERVER['PHP_SELF'] . " method=GET> <table>";
echo "<tr>";
while ($row = mysql_fetch_array($wynik2)) {
    echo "<td><input type=\"radio\" name=rmZakladki2[] value=" . $row['ID'] . ">" . $row['NAZWA'] . "</td>";
    $i++;
    if ($i == 4) {
        echo "</tr><tr>";
        $i = 0;
    }
}
echo "</tr>";
echo "<tr><td colspan=4> </td></tr>";
echo "<tr><td colspan=4> </td></tr>";
echo "<tr><td colspan=4>Zakładki widoczne dla miejscowości</td></tr>";

$wynik23 = mysql_query("select * from " . $db_name . ".zakladki where MIASTO=" . $miasto." AND SZKOLA=99");
$i = 0;
echo "<form name=rmZakladki action=" . $_SERVER['PHP_SELF'] . " method=GET> <table>";
echo "<tr>";
while ($row3 = mysql_fetch_array($wynik23)) {
    echo "<td><input type=\"radio\" name=rmZakladki2[] value=" . $row3['ID'] . ">" . $row3['NAZWA'] . "</td>";
    $i++;
    if ($i == 4) {
        echo "</tr><tr>";
        $i = 0;
    }
}
echo "</tr>";
echo "<tr><td clospan=2><input type =\"submit\" name=\"edytuj\" value=\"Edytuj\"></td><td clospan=2><input type =\"submit\" name=\"rmZakladki\" value=\"Usuń\" ></td>
</tr></table></form>";
?>
<hr>

Aby dodać podstronę widoczną dla wszystkich szkół w wybranej miejscowości wypełnij poniższe pola i zatwierdź.<br><br>
<form name=addArtMiasto action="<?php echo $_SERVER['PHP_SELF']; ?>" method=POST>

    <table>
        <tr><td colspan="2" align="center"><input type ="submit" name="artykul"value="Dodaj"></td></tr>
        <tr><td>Nazwa zakładki: </td><td><input type ="text" name="zakladka"></td></tr>
        <tr><td>Nagłówek artykułu: </td><td><input type ="text" name="naglowek"></td></tr>
        <tr><td colspan="2"><textarea id="elm1" name="body" rows="100" cols="100">

                </textarea></td></tr>
        <input type ="hidden" name="miasto" value="<?php echo $miasto; ?>">

    </table>

</form>
