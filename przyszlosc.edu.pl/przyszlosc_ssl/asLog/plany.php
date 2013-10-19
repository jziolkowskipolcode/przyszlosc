<?php
//wyswietlanie w tabeli planow zajec na podstawie szkoly i semestru
require 'DB.php';

$wynik = mysql_query("select * from PlanLekcji where MIASTOID=" . $miasto . " and SZKOLAID=" . $szkola . " AND SEMESTRID=" . $semestr . " order by WAZNY_OD, ID DESC");
?>
<center>
    <table>
        <tr><th width="150px;">Obowiązuje od:</th><th width="150px;">Pobierz:</th><th width="150px;">Otwórz:</th><th width="150px;">Ilość pobrań</th><th width="150px;">Data publikacji:</th></tr>
        <?php
        while ($wiersz = mysql_fetch_array($wynik)) {
            echo "<tr><td style=\"text-align:center;\">" . date('d-m-Y', strtotime($wiersz['WAZNY_OD'])) . "</td><td style=\"text-align:center;\"><a href=download.php?fn=" . $wiersz['ID'] . "><img src=pobierz.png width=40px title=Pobierz alt=Pobierz align=middle></a></td>
            <td style=\"text-align:center;\"><a href=download2.php?fn=" . $wiersz['ID'] . " target=_blank><img src=otworz.png width=40px title=Otwórz alt=Otwórz align=middle></a></td><td style=\"text-align:center;\">" . $wiersz['POBRANIA'] . "</td><td>".$wiersz['DataPublikacji']."</td></tr>";
        }
        ?>
    </table>
</center>