<?php
echo "<a href = ../asLog/logout.php><img src = logout.png alt=\"Wyloguj\" title=\"Wyloguj\" border=0></a><br>";
require 'admDB.php';
/*
 * edycja artykułów
 */
if (isset($_REQUEST['edytuj'])) {
    include 'edycja.php';
} else {
    if (isset($_REQUEST['rmZakladki2'])) {
        $zakla = $_REQUEST['rmZakladki2'];
        foreach ($_REQUEST['rmZakladki2'] as $value) {
            mysql_query("DELETE FROM " . $db_name . ".`zakladki` WHERE `zakladki`.`ID` = $value");
        }
    }
    ?>
    <!--wyswietlanie listy wszystkich miast znajduj±cych sie w bazie-->
    <?php
    if (isset($_REQUEST['nazwaMiast']) && strlen($_REQUEST['nazwaMiast']) > 1) {
        $nazwa = $_REQUEST['nazwaMiast'];
        $opis = $_REQUEST['opis'];
        $query = "INSERT INTO " . $db_name . ".`miasto` (ID, NAZWA, OPIS) VALUES ( null,'$nazwa','$opis')";
        mysql_query($query);
    }
    ?><br><br>
    Wybierz miasto i zatwierdź: <br>
    <strong>UWAGA! Usunięcie miejscowości spowoduje bezpowrotną utratę <u>wszystkich</u> informacji z danej miejscowości!<br></strong><br>
    <form name="myform" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
        <?php
        require 'admDB.php';
        $query1 = "select * from " . $db_name . ".miasto";
        $rezultat1 = mysql_query($query1);
        while ($rekord1 = mysql_fetch_array($rezultat1)) {
            echo "<input type=radio name=miasto value=" . $rekord1[ID] . "> " . $rekord1[NAZWA] . "   <a href=opis.php?miasto=" . $rekord1[ID] . " target=_blank><img src=opisz.png align=bottom border=0>Opis</a><br>";
        }
        ?>
        <br>

        <input type ="submit" value ="Wybierz">
        <input type ="submit" name ="delmiast" value="Usuń">
    </form>
    <br>
    <!--        dodawanie nowego miasta-->
    <hr>
    <img src="nowe.png" align="middle">Lub dodaj nowe i zatwierdź:<br>
    <form name=addMiast action="<?php echo $_SERVER['PHP_SELF']; ?>" method=GET>
        <p>
            Nazwa miasta:<br>
            <input type ="text" name="nazwaMiast"><br>
            Opis miasta:<br>
            <input type ="text" name="opis" value="wklej kod strony">
            <input type ="submit" value="Dodaj">
        </p>
    </form>
    <!--wyswietlenie wszystkich zakladek -->
    <hr>
    <img src="zakladki.png" align="top"> Wszystkie zakładki na stronie:<br>
    <?php
    $wynik2 = mysql_query("select * from " . $db_name . ".zakladki");
    $i = 0;
    echo "<form name=rmZakladki action=" . $_SERVER['PHP_SELF'] . " method=GET> <table>";
    echo "<tr>";
    while ($row = mysql_fetch_array($wynik2)) {
        echo "<td><input type=\"radio\" name=rmZakladki2[] value=" . $row['ID'] . ">" . $row['NAZWA'] . "</td>";
        $i++;
        //ilosc kolumn wyswietlania zakladek
        if ($i == 4) {
            echo "</tr><tr>";
            $i = 0;
        }
    }
    echo "</tr>";
    echo "<tr><td clospan=2><input type =\"submit\" name=\"rmZakladki\" value=\"Usuń\" ></td>
                    <td clospan=2><input type =\"submit\" name=\"edytuj\" value=\"Edytuj\"></td></tr></table></form>";
}
?>
<hr>