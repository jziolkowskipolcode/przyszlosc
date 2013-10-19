<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <link rel="stylesheet" type="text/css" href="admin.css" media="screen,projection" />
        <title>Edycja opisu szkoły</title>
    </head>
    <body>

        <?php
        require 'tiny.php';
        if (isset($_REQUEST['opisek'])) {
            require 'admDB.php';
            $dodajOpis = mysql_query("UPDATE " . $db_name . ".`miasto` SET `OPIS` = '" . $_REQUEST['body'] . "' WHERE `miasto`.`ID` =" . $_REQUEST['miasto']);
            if ($dodajOpis) {
                echo "Zapisano";
                echo "<script language=\"javascript\">


setTimeout(\"self.close();\",2000)

</script> ";
            } else {
                echo "Błąd wykoanania";
            }
        }
        require 'admDB.php';
        $miasto = $_REQUEST['miasto'];
        $pobierz = mysql_query("select OPIS from " . $db_name . ".miasto where ID=" . $miasto);
        $tresc = mysql_fetch_array($pobierz);
        ?>

        <form name=opis action="<?php echo $_SERVER['PHP_SELF']; ?>" method=post>
            <textarea id="elm1" name="body" rows="40" cols="80" style="width: 80%"> <?php
        echo $tresc[OPIS];
        ?>
            </textarea>
            <p align="center"><input type ="submit" name="opisek" value="Zapisz i zamknij" style="height: 40px; width: 110px"></p>
            <input type="hidden" name="miasto" value="<?php echo $miasto; ?>">
        </form>
    </body>
</html>