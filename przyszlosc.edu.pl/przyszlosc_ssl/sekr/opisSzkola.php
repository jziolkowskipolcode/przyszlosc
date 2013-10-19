<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Edycja opisu szkoły</title>
    </head>
    <body>

        <?php
        require 'tiny.php';
        if (isset($_REQUEST['opisek'])) {
            require 'admDB.php';
            $dodajOpis = mysql_query("UPDATE " . $db_name . ".`szkola` SET `OPIS` = '" . $_POST['body'] . "' WHERE `szkola`.`ID` =" . $_REQUEST['szkola'] . " AND `szkola`.`MIASTO` =" . $_REQUEST['miasto']);
            if ($dodajOpis) {
                echo "Zapisano zmiany";
                echo "<script language=\"javascript\">
<!--
setTimeout(\"self.close();\",2000)
//-->
</script> ";
            } else {
                printf("Errormessage: %s\n", mysqli_error($dodajOpis));
                echo "Błąd wykonania";
            }
        }
        require 'admDB.php';
        $szkola = $_REQUEST['szkola'];
        $pobierz = mysql_query("select OPIS from " . $db_name . ".szkola where ID=" . $szkola . " AND MIASTO=" . $_REQUEST['miasto']);
        $tresc = mysql_fetch_array($pobierz);
        ?>
<form name=opis action="<?php echo $_SERVER['PHP_SELF']; ?>" method=post>
            <textarea id="elm1" name="body" rows="40" cols="80" style="width: 80%"> <?php
        echo $tresc[OPIS];
        ?>
            </textarea>
            <p align="center"><input type ="submit" name="opisek" value="Zapisz i zamknij" style="height: 40px; width: 110px"></p>
            <input type="hidden" name="szkola" value="<?php echo $szkola; ?>"> 
            <input type="hidden" name="miasto" value="<?php echo $_REQUEST['miasto']; ?>"> 
        </form>

    </body>
</html>