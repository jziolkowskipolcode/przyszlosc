<html>
    <HEAD>
        <TITLE>Brak adresu w bazie</TITLE>

        <meta name="Language" content="pl">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" >

    </head>
    <body>

        <?php
        //reset hasła do strony przyszlosc.edu.pl
        //wyslanie maila z linkiem potwierdzajacym
        
        require 'logDB.php';
        if (isset($_POST['submit']) && isset($_POST['pesel'])) {
            $q = "select email from authority.users where login='" . $_POST['pesel'] . "'";
            $result = mysql_query($q);
            $dane = mysql_fetch_array($result);
            $emailTo = "no-reply@przyszlosc.edu.pl";
            if ($dane['email'] != null) {
                $czas = time();
                $czasmd5 = md5($czas);
                $email = $dane['email'];
                $update = "update users set weryfikacja ='" . $czasmd5 . "' where login='" . $_POST['pesel'] . "' and email='" . $email . "'";
                mysql_query($update);
                $subject = "Potwierdzenie zmiany hasła";
                $subject = "=?UTF-8?B?" . base64_encode($subject) . "?=";
                $body = "\nTa wiadomość została wygenerowana automatycznie. Prosimy na nią nie odpowiadać. Zarządano zmiany hasła dla użytkownika o numerze PESEL:\n " . $_POST['pesel'] . " W celu potwierdzenia zmiany hasła proszę kliknąć w poniższe łącze. \n https://przyszlosc.edu.pl/asLog/change.php?ver=" . $czasmd5;
                //$headers = 'From: System przyszlosc.edu.pl<no-reply@przyszlosc.edu.pl> \r\n  Reply-To: ' ;
                $body = iconv("utf-8", "iso-8859-2", $body);
                $headers = 'From: STRONA PRZYSZLOSC.EDU.PL <' . $emailTo . '>' . "\r\n" . 'Reply-To: ' . $email;
                if (mail($email, $subject, $body, $headers)) {
                    echo "Na Twoją skrzynkę email wysłano wiadomość z unikalnym linkiem do zmiany hasła.<br>
		<a href=zaloguj.php>Wstecz</a>";
                }
            } else {
                ?>

                Prosimy o zgłoszenie w sekretariacie adresu email potrzebnego do ukończenia procesu aktywacji konta. Dziękujemy.<br>
                <a href="../../index.php">Strona główna</a>

                <?php
            }
        } else {
            ?>
            <form action="" method="post">
                <table align="center" border="0" cellspacing="0" cellpadding="3">
                    <tr><td>PESEL:</td><td><input type="text" name="pesel" maxlength="30"></td></tr>

                    <tr><td colspan="2" align="right"><input type="submit" name="submit" value="Wyślij"></td></tr>

                </table>
    <?php
}
?>
    </body>
</html>