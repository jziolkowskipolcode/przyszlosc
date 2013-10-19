<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

        <title>Formularz rekrutacyjny do szkół "Przyszłość"</title>
    </head>
    <body>
        <?php
        if (isset($_POST['submit'])) {

            $host = "localhost"; // Host
            $username = "www_admin"; // U+-ytkownik
            $password = "__ADMIN_www"; // has+éo
            $db_name = "przyszlosc"; // baza
// Pod+é?ůcz do bazy
            mysql_connect("$host", "$username", "$password") or die("nie można podłączyć bazy");
            mysql_select_db("$db_name") or die("nie można wybrać bazy");
            mysql_query("SET NAMES 'utf8'");

            $miastoID = $_POST['search_category'];
            $szkolaID = $_POST['sub_category'];
            $profilID = $_POST['subsub_category'];
            $miasto = $_POST['ssubsubsub_category'];
            $gminaID = $_POST['ssubsub_category'];
            $zapytaj = "SELECT `geo_province`.`name` as woj, `geo_poviat`.`name` as pow, `geo_commune`.`name` as gmin, `geo_city`.`name` as miast FROM `geo_province`,`geo_poviat`,`geo_commune`, `geo_city` WHERE `geo_province`.`id` = `geo_city`.`province_id` AND  `geo_poviat`.`id` = `geo_city`.`poviat_id` AND `geo_commune`.`id` = `geo_city`.`commune_id` AND `geo_city`.`id` = " . $miasto;
            $do = mysql_query($zapytaj);
            while ($dane = mysql_fetch_array($do)) {
                $wojew = $dane['woj'];
                $powiat = $dane['pow'];
                $gmina = $dane['gmin'];
                $miastzam = $dane['miast'];
            }

            $nazwisko = $_POST['nazwisko'];
            $imie1 = $_POST['imPierwsze'];
            $imie2 = $_POST['imDrugie'];
            $pesel = $_POST['pesel'];
            $miastur = $_POST['miastoUr'];
            $nazrod = $_POST['nazwrodowe'];
            $doser = $_POST['DOseria'];
            $donum = $_POST['DOnumer'];
            $dokto = $_POST['DOktowydal'];
            $dokiedy = $_POST['dataDO'];
            $ulicazam = $_POST['ulicaZam'];
            $dom = $_POST['domZam'];
            $lok = $_POST['lokZam'];
            $kod = $_POST['kodZam'];
            $poczta = $_POST['pocztaZam'];
            $miastkor = $_POST['miastoKores'];
            $ulickor = $_POST['ulicaKores'];
            $domkor = $_POST['domKores'];
            $lokkor = $_POST['lokKor'];
            $kodkor = $_POST['kodKores'];
            $poczkor = $_POST['pocztaKores'];
            $tel = $_POST['telefon'];
            $telkom = $_POST['telefonKom'];
            $mail = $_POST['email'];

            if (isset($_POST['miastoKores']))
                $miastzam2 = $_POST['miastoKores'];
            if (isset($_POST['ulicaKores']))
                $ulicazam2 = $_POST['ulicaKores'];
            if (isset($_POST['domKores']))
                $dom2 = $_POST['domKores'];
            if (isset($_POST['kodKores']))
                $kod2 = $_POST['kodKores'];
            if (isset($_POST['pocztaKores']))
                $poczta2 = $_POST['pocztaKores'];

            $zapytka = "INSERT INTO `przyszlosc`.`rekrutacja` (
`ID` ,
`PESEL` ,
`NAZWISKO` ,
`IMIEPIERW` ,
`IMIEDRU` ,
`MIASTOUR` ,
`NAZWISKOROD` ,
`DOSERIA` ,
`DONUMER` ,
`DOWYDANY` ,
`DOKIEDY` ,
`MIASTOZAMELD` ,
`ULICAZAMELD` ,
`DOMZAMELD` ,
`LOKZAMELD` ,
`KODZAMELD` ,
`POCZTAZAMELD` ,
`TELEFON` ,
`TELKOM` ,
`EMAIL` ,
`MIASTOID` ,
`SZKOLAID` ,
`KIERUNEK` ,
`MIASTOKOR` ,
`ULICAKOR` ,
`DOMKOR` ,
`LOKKOR` ,
`KODKOR` ,
`POCZKOR`,
`WOJEWZAMELD`,
`POWIATZAMELD`,
`GMINAZAMELD`
) VALUES ( NULL , '$pesel', '$nazwisko', '$imie1', '$imie2', '$miastur', '$nazrod', '$doser', '$donum', '$dokto', '$dokiedy','$miastzam', '$ulicazam', '$dom','$lok', '$kod', '$poczta', '$tel', '$telkom', '$mail', '$miastoID', '$szkolaID', '$profilID', '$miastzam2', '$ulicazam2', '$dom2','$lokkor', '$kod2', '$poczta2','$wojew','$powiat','$gmina');";

            if (mysql_query($zapytka)) {
                echo "Dane zostały zapisane.<br> Za chwilę nastąpi przekierwoanie na stronę główną. Dziękujemy za zainteresowanie naszą ofertą.<br><br>";

//echo "Nazwisko: <b>".$nazwisko."</b>  <br>Imię pierwsze: <b>$imie1</b>   Imię drugie: <b>$imie2</b><br>";
//echo "PESEL: <b>$pesel.</b>  <br>Miejsce urodzenia: <b>$miastur</b>   <br>Nazwisko rodowe: <b>$nazrod</b><br>";
//echo "Dowód osobisty: <b>$doser.$donum</b>  wydany przez: <b>$dokto</b><br>";
//echo "<hr>";
//echo "<br>";
//echo "Adres zamieszkania: <br>";
//echo "Miejscowość: <b>$miastzam</b><br>";
//echo "Ulica: <b>$ulicazam</b>   Nr domu: <b>$dom</b><br>";
//echo "Kod pocztowy: <b>$kod</b>  Poczta: <b>$poczta</b><br>";
//echo "Telefon:  <b>$tel</b>   Kom.:  <b>$telkom</b><br>";
//echo "Adres email: <b>$mail</b>";

                header('Refresh: 10; url=http://przyszlosc.edu.pl');
            } else {
                echo "Wystąpił błąd.<br>";
                echo "<a href=../../index.php></a>";
            }
        }
        else
            echo "Wystąpił nieznany błąd.";
        ?>

    </body>
</html>