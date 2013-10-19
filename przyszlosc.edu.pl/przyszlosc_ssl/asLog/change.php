<html>
    <HEAD>



        <TITLE>Braki adresu w bazie</TITLE>

        <meta name="Language" content="pl">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" >

    </head>
    <body>
        <?php
        require 'logDB.php';
//zmiana hasla do konta na stronie przyszlosc.edu.pl
//po pomyslnym wejsciu na link z wiadomosci email
        if (isset($_GET['ver'])) {
            $kod = $_GET['ver'];
            if (isset($_GET['nowe']) && isset($_GET['nowe2']) && $_GET['nowe'] == $_GET['nowe2']) {
                $nowe = $_GET['nowe'];
                if (preg_match("/^(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9]).{8,30}$/", $nowe)) {
                    if (mysql_query("update users set haslo=md5('" . $_GET['nowe'] . "'), info='" . iconv("utf-8", "iso-8859-2", $_GET['nowe']) . "' where weryfikacja = '" . $kod . "'")) {
                        echo "<h1>Hasło zostało zmienione!</h1>";
                        mysql_query("update users set weryfikacja =NULL,ZMIANYAC=1 where weryfikacja ='" . $kod . "'");
                        header("location: zaloguj.php");
                    }
                } else {
                    echo "<center><font color=RED>Hasło musi składać się z conajmniej 8 znaków (w tym: conajmniej 1 wielka litera, 1 mała litera, 1 cyfra).</font></center>";
                }
            }
            ?>

            <form action="" method="get">
                <table align="center" border="0" cellspacing="0" cellpadding="3">
                    <tr><td>Nowe hasło:</td><td><input type="password" name="nowe" maxlength="30"></td></tr>
                    <tr><td>Potwierdź:</td><td><input type="password" name="nowe2" maxlength="30"></td></tr>
                    <tr><td></td><td><input type="hidden" name="ver" value="<?php echo $kod; ?>"></td></tr>
                    <tr><td colspan="2" align="right"><input type="submit" name="submit" value="Zmień"></td></tr>

                </table>


                <?php
            } else {
                echo "Annołn Fejler";
            }
            ?>

    </body>
</html>