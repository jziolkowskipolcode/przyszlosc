
<div id="naglowek">


    <?php
    //wyswietlanie w jakim miejscu jest user
    require 'admDB.php';
    $zapyt = "SELECT ID,NAZWA from " . $db_name . ".miasto where ID=" . $_REQUEST['miasto'];
    $wynik = mysql_query($zapyt);
    $miejscowosc = mysql_fetch_array($wynik);

    echo "<a href = ../asLog/logout.php><img src = logout.png alt=\"Wyloguj\" title=\"Wyloguj\" border=0></a>
<a href= index.php?miasto=" . $miejscowosc['ID'] . "> <img src = strzalka.png title=\"Wstecz\" alt=\"Wstecz\" border=0></a><br>";

    echo "<img src=miasto.png align=bottom border=0>  " . $miejscowosc['NAZWA'] . "&nbsp;&nbsp;&nbsp;&nbsp;";
    $zapyt = "SELECT NAZWA from " . $db_name . ".szkola where ID=" . $_REQUEST['szkola'];
    $wynik = mysql_query($zapyt);
    $nazwasz = mysql_fetch_row($wynik);
    echo "<img src=szkola.png align=bottom border=0>  " . $nazwasz[0] . "&nbsp;&nbsp;<hr>";
    ?>

</div>

<?php
require 'admDB.php';
$szkola = $_REQUEST['szkola'];
$miasto = $_REQUEST['miasto'];
echo "<form name=\"myform\" action=\"";
echo "index.php";
echo "\" method=\"GET\">";
// $zap = mysql_query("select miasto from ".$db_name.".szkola where id=$szkola");
//$mia = mysql_fetch_array($zap);
// $miasto = $mia[0];
if (isset($_REQUEST['artykul2'])) {
    $zakladka = $_REQUEST['zakladka'];
    $naglowekTresc = $_REQUEST['naglowek'];
    $body = $_POST['body'];
    mysql_query("INSERT INTO " . $db_name . ".`zakladki` (
                        `ID` ,
                        `SZKOLA` ,
                        `MIASTO` ,
                        `SYSTEM` ,
                        `NAZWA`)
                        VALUES (
                        NULL , '$szkola', '$miasto', '0', '$zakladka');");
    mysql_query("INSERT INTO " . $db_name . ".`tresci` (
                        `ID` ,
                        `ZAKLADKA` ,
                        `NAGLOWEK` ,
                        `BODY`)
                        VALUES (
                        NULL , LAST_INSERT_ID(), '$naglowekTresc', '$body');");
}
?>



<?php
$wynik2 = mysql_query("select * from " . $db_name . ".zakladki where SZKOLA=" . $szkola . " and MIASTO=" . $_REQUEST['miasto']);
$i = 0;
echo "<form name=rmZakladki action=" . $_SERVER['PHP_SELF'] . " method=POST> <table>";
echo "<tr>";
while ($row = mysql_fetch_array($wynik2)) {
    echo "<td><input type=\"radio\" name=rmZakladki2[] value=" . $row['ID'] . ">" . $row['NAZWA'] . "</td>";
    $i++;
    if ($i == 1) {
        echo "</tr><tr>";
        $i = 0;
    }
}
echo "</tr>";
echo "<tr><td clospan=2><input type =\"submit\" name=\"edytuj\" value=\"Edytuj\"></td><td clospan=2><input type =\"submit\" name=\"rmZakladki\" value=\"Usuń\" ></td>
</tr></table></form>";
?>
<?php
require 'tiny.php';
?>
<div id="artykul">
    Aby dodać nową podstronę widoczną dla wybranej szkoły wypełnij poniższe pola i zatwierdź.<br><br>
    <form name=addArtSzko action="<?php echo $_SERVER['PHP_SELF']; ?>" method=POST>

        <table>
            <tr><td colspan="2" align="center"><input type ="submit" name="artykul2" value="Dodaj"></td></tr>
            <tr><td>  Nazwa zakładki: </td><td><input type ="text" name="zakladka"></td></tr>
            <tr><td>Nagłówek artykułu: </td><td><input type ="text" name="naglowek"></td></tr>
            <tr><td colspan="2"><textarea id="elm1" name="body" rows="15" cols="80" style="width: 80%">

                    </textarea></td></tr>
            <input type ="hidden" name="miasto" value="<?php echo $miasto; ?>">
            <input type ="hidden" name="szkola" value="<?php echo $szkola; ?>">

        </table>

    </form>
</div>


