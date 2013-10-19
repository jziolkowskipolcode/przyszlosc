<center>  <br>

    <?php
    function checkSign2($tekst) {
    if (preg_match('/[^0-9]/', $tekst) && strlen($tekst) > 3) {
        return 0;
    } else {
        return 1;
    }
}
    require 'DB.php';
    if(checkSign2($_GET['miasto'])&& checkSign2($_GET['szkola'])) {
    $query = "select * from PlanLekcji where MIASTOID='" . $_GET['miasto'] . "' AND SZKOLAID='" . $_GET['szkola'] . "' order by SemestrNazwa asc, WAZNY_OD desc";
    $do = mysql_query($query);
    if (mysql_num_rows($do) < 1) {
        echo "Aktualnie nie ma dodanych planów zajęć.";
    }
    else{
    ?>
    <table>
        <tr><th>Semestr:</th><th width="150px;">Obowiązuje od:</th><th width="50px;">Pobierz:</th><th width="50px;">Otwórz:</th><th>Ilość pobrań</th><th>Data publikacji</th></tr>
        <?php
        while ($wiersz = mysql_fetch_array($do)) {
            echo "<tr><td style=\"text-align:left;\"><a href=download.php?fn=" . $wiersz['ID'] . ">" . $wiersz['SemestrNazwa'] . "</a></td><td style=\"text-align:center;\">" . date('d-m-Y', strtotime($wiersz['WAZNY_OD'])) . "</td><td style=\"text-align:center;\"><a href=download.php?fn=" . $wiersz['ID'] . "><img src=grafika/pobierz.png width=30px title=Pobierz alt=Pobierz align=middle></a></td>
            <td style=\"text-align:center;\"><a href=open.php?fn=" . $wiersz['ID'] . " target=_blank><img src=grafika/otworz.png width=30px title=Otwórz alt=Otwórz align=middle></a></td><td style=\"text-align:center;\">" . $wiersz['POBRANIA'] . "</td><td>".$wiersz['DataPublikacji']."</td></tr>";
        }}
        }
        ?>
    </table>



</center>