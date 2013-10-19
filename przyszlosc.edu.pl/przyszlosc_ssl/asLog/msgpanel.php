<br>
<?php
require('DB.php');
$user = $_SESSION['username'];

switch ($_REQUEST['pm']) {

    case 1: {



            $query = "select WIADOMOSC_ID, DATA_ODEBRANIA from WIADOMOSCI_POZ where ODBIORCA = " . $user . " order by WIADOMOSC_ID desc";
            $wykonaj = mysql_query($query);
            if (mysql_num_rows($wykonaj) < 1) {
                echo "<center><br><br>Brak wiadomości</center>";
            } else {
                ?>
                <center>
                    <table>
                        <tr>
                            <th style="width:150px;">Imię i Nazwisko </th><th style="width:200px;">Temat: </th><th style="width:150px;">Data nadania: </th>
                        </tr>
                        <?php
                        while ($row = mysql_fetch_array($wykonaj)) {
                            $query2 = "select * from WIADOMOSCI where ID =" . $row['WIADOMOSC_ID'] . " ";
                            $wykonaj2 = mysql_query($query2);
                            while ($row2 = mysql_fetch_array($wykonaj2)) {

                                echo "<tr><td>" . $row2['NADAWCA'] . "</td>
					<td>
					<a href=\"#\" onClick=\"MyWindow=window.open('https://przyszlosc.edu.pl/asLog/read.php?mss=" . $row['WIADOMOSC_ID'] . "&user=" . $user . "', 'MyWindow','toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=no,resizable=no,width=600,height=300'); return false;\">";
                                if ($row['DATA_ODEBRANIA'] > '0000-00-00') {


                                    echo $row2['TEMAT'] . "</a></td>
					
					<td>" . $row2['DATA'] . "</td>
					</tr>";
                                } else {


                                    echo "<b>" . $row2['TEMAT'] . "</b></a></td>
					
					<td>" . $row2['DATA'] . "</td>
					</tr>";
                                }
                            }//
                        }
                    }
                    ?>
                </table>

            </center>

            <?php
            break;
        } //end case 1
    case 2: {
            ?>
            <center>
                <br><br>
                <form name="dane" action="senmsg.php" method="POST">
                    <table>
                        <tr align="left"><td rowspan="3" style="width:150px;"> 
                                <select multiple="multiple" name="odbiorca[]" style="width:150px; height:270px;">
                                    <optgroup label="Nauczyciele">

            <?php
            require 'DB2.php';
            $nauczyciele = mysql_query("select login from users where poziom = 102 order by login");
            while ($nau1 = mysql_fetch_array($nauczyciele)) {
                echo "<option>" . $nau1['login'] . "</option>";
            }
            ?>
                                    </optgroup>
                                    <optgroup label="Uczniowie">
                                        <?php
                                        require 'DB2.php';
                                        $uczniowie = mysql_query("select login from users where poziom = 100 order by login");
                                        while ($ucz1 = mysql_fetch_array($uczniowie)) {
                                            echo "<option>" . $ucz1['login'] . "</option>";
                                        }
                                        ?>
                                    </optgroup>

                                </select>

                            </td><td>
                                <input type = "text" value="Temat wiadomości" style="width:250px;" name="temat"></td></tr>
                        <tr>

                            <td>
                                <textarea rows="10" cols="60" name="tresc">
            			treść wiadomości
                                </textarea>
                            </td>
                        </tr>
                        <tr>

                            <td>
                                <input type="text" name="nadawca" value="Podpis">
                            </td>
                        </tr>
                        <tr><td><input type="submit" value="Wyślij"></td></tr>
                    </table>
                    <input type="hidden" name="nad" value="<?php echo $user; ?>">
                </form>
            </center>



            <?php
            break;
        } //end case 2
    case 3: {
            require 'DB.php';
            echo "<br><br><table>";
            $wyslane = mysql_query("SELECT * FROM WIADOMOSCI WHERE PESEL_NADAWCA= " . $_SESSION['username']);
            echo "<tr><td>Id:</td><td>Data:</td><td>Temat:</td><td>Treść:</td></tr>";
            while ($dana = mysql_fetch_array($wyslane)) {
                echo "<tr><td>" . $dana['ID'] . "</td><td>" . $dana['DATA'] . "</td><td>" . $dana['TEMAT'] . "</td><td>" . $dana['TRESC'] . "</td></tr>";
            }
            echo "</table>";
        } //end case 3
} //end switch
?>