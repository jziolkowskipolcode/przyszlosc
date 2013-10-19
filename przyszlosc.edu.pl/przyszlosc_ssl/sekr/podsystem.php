 <?php
        require 'tiny.php';
 ?>
<div id="naglowek">
    <?php
    require 'admDB.php';
    $zapyt = "SELECT NAZWA from " . $db_name . ".miasto where ID=" . $_POST['miasto'];
    $wynik = mysql_query($zapyt);
    $miejscowosc = mysql_fetch_row($wynik);
    echo $miejscowosc[0] . "&nbsp;&nbsp;>>&nbsp;&nbsp;";
    $zapyt = "SELECT NAZWA from " . $db_name . ".szkola where ID=" . $_POST['szkola'];
    $wynik = mysql_query($zapyt);
    $nazwasz = mysql_fetch_row($wynik);
    echo $nazwasz[0] . "&nbsp;&nbsp;>>&nbsp;&nbsp;";
    $zapyt = "SELECT NAZWA from " . $db_name . ".systemy where ID=" . $_POST['system'];
    $wynik = mysql_query($zapyt);
    $nazwasys = mysql_fetch_row($wynik);
    echo $nazwasys[0] . "&nbsp;&nbsp;<a href= index.php> POWRÓT</a>";
    ?>
</div>
<?php
require 'admDB.php';
$szkola = $_POST['szkola'];
$system = $_POST['system'];
$zap = mysql_query("select miasto from " . $db_name . ".szkola where id=$szkola");
$mia = mysql_fetch_array($zap);
$miasto = $mia[0];
if (isset($_POST['artykul3'])) {
    $zakladka = $_POST['zakladka'];

    $naglowekTresc = $_POST['naglowek'];
    $body = $_POST['body'];

    mysql_query("INSERT INTO " . $db_name . ".`zakladki` (
`ID` ,
`SZKOLA` ,
`MIASTO` ,
`SYSTEM` ,
`NAZWA`
)
VALUES (
NULL , '$szkola', '$miasto', '$system', '$zakladka'
);

");
    mysql_query("INSERT INTO " . $db_name . ".`tresci` (
`ID` ,
`ZAKLADKA` ,
`NAGLOWEK` ,
`BODY`
)
VALUES (
NULL , LAST_INSERT_ID(), '$naglowekTresc', '$body'
);
");
}
?>
<div id="zakladki">
    <?php
    $wynik2 = mysql_query("select * from " . $db_name . ".zakladki where SYSTEM=" . $_POST['system']);
    $i = 0;
    echo "<center><form name=rmZakladki action=" . $_SERVER['PHP_SELF'] . " method=POST> <table>";
    echo "<tr>";
    while ($row = mysql_fetch_array($wynik2)) {
        echo "<td><input type=\"radio\" name=rmZakladki2[] value=" . $row['ID'] . ">" . $row['NAZWA'] . "</td>";
        $i++;
        if ($i == 2) {
            echo "</tr><tr>";
            $i = 0;
        }
    }
    echo "</tr>";
    echo "<tr><td clospan=2><input type =\"submit\" name=\"edytuj\" value=\"Edytuj\"></td><td clospan=2><input type =\"submit\" name=\"rmZakladki\" value=\"Usuñ zaznaczone\" ></td>
                    </tr></table></center></form>";
    ?>
</div>
<div id="artykul">
    Aby dodaæ podstronê widoczn± dla wszystkich systemów w wybranej szkole wype³nij poni¿sze pola i zatwierd¼.<br><br>
    <form name=addArtSzko action="<?php echo $_SERVER['PHP_SELF']; ?>" method=POST>
        <table>
            <tr><td colspan="2" align="center"><input type ="submit" name="artykul3" value="Dodaj"></td></tr>
            <tr><td>  Nazwa zak³adki: </td><td><input type ="text" name="zakladka"></td></tr>
            <tr><td>Nag³ówek artyku³u: </td><td><input type ="text" name="naglowek"></td></tr>
            <tr><td colspan="2"><textarea id="elm1" name="body" rows="15" cols="80" style="width: 80%">
                    </textarea></td></tr>
            <input type ="hidden" name="miasto" value="<?php echo $miasto; ?>">
            <input type ="hidden" name="szkola" value="<?php echo $szkola; ?>">
            <input type ="hidden" name="system" value="<?php echo $system; ?>">
        </table>
    </form>
</div>

