<?php
//If the form is submitted
if (isset($_POST['submit'])) {

    //Check to make sure that the name field is not empty
    if (trim($_POST['contactname']) == '') {
        $hasError = true;
    } else {
        $name = trim($_POST['contactname']);
    }

    //Check to make sure that the subject field is not empty
    if (trim($_POST['subject']) == '') {
        $hasError = true;
    } else {
        $subject = trim($_POST['subject']);

        $subject = "=?UTF-8?B?" . base64_encode($subject) . "?=";
    }

    //Check to make sure sure that a valid email address is submitted
    if (trim($_POST['email']) == '') {
        $hasError = true;
    } else if (!eregi("^[A-Z0-9._%-]+@[A-Z0-9._%-]+\.[A-Z]{2,4}$", trim($_POST['email']))) {
        $hasError = true;
        $badmail = true;
    } else {
        $email = trim($_POST['email']);
    }

    //Check to make sure comments were entered
    if (trim($_POST['message']) == '') {
        $hasError = true;
    } else {
        if (function_exists('stripslashes')) {
            $comments = stripslashes(trim($_POST['message']));
        } else {
            $comments = trim($_POST['message']);
        }
    }

    //If there is no error, send the email
    if (!isset($hasError)) {
        $emailTo = 'sekretariat@przyszlosc.edu.pl'; //Put your own email address here
        $body = "Nadawca: $name \nEmail:   $email  \n\nTreść wiadomości:\n $comments";
        $headers = 'From: STRONA PRZYSZLOSC.EDU.PL <' . $emailTo . '>' . "\r\n" . 'Reply-To: ' . $email;

        mail($emailTo, $subject, $body, $headers);
        $emailSent = true;
    }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

    <head>
        <title>Formularz kontaktowy</title>
        <meta http-equiv="content-type" content="text/html;charset=utf-8" />
        <meta http-equiv="Content-Style-Type" content="text/css" />

        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js" type="text/javascript"></script>


        <script type="text/javascript">
            $(document).ready(function(){
                $("#contactform").validate();
            });
        </script>

        <style type="text/css">
            body {
                font-family:Arial, Tahoma, sans-serif;
            }
            #contact-wrapper {
                width:440px;
                border:1px solid #e2e2e2;
                background:#f1f1f1;
                padding:20px;
            }
            #contact-wrapper div {
                clear:both;
                margin:1em 0;
            }
            #contact-wrapper label {
                display:block;
                float:none;
                font-size:16px;
                width:auto;
            }
            form#contactform input {
                border-color:#B7B7B7 #E8E8E8 #E8E8E8 #B7B7B7;
                border-style:solid;
                border-width:1px;
                padding:5px;
                font-size:16px;
                color:#333;
            }
            form#contactform textarea {
                font-family:Arial, Tahoma, Helvetica, sans-serif;
                font-size:100%;
                padding:0.6em 0.5em 0.7em;
                border-color:#B7B7B7 #E8E8E8 #E8E8E8 #B7B7B7;
                border-style:solid;
                border-width:1px;
            }
        </style>
    </head>

    <body>
        <div id="contact-wrapper">

            <?php if (isset($hasError)) { //If errors are found 
                if (isset($badmail)) { ?>

                    <p class="error">Nieprawidłowy format adresu e-mail.</p>
                <?php } ?>
                <p class="error">Proszę sprawdzić poprawność danych. Dziękujemy.</p>
            <?php } ?>

            <?php if (isset($emailSent) && $emailSent == true) { //If email is sent ?>
                <p><strong>Wiadomość wysłana!</strong></p>
                <p>Dziękujemy <strong><?php echo $name; ?></strong> za skorzystanie z formularza! Twoja wiadomość została poprawnie wysłana i wkrótce powinna do nas dotrzeć.</p>
            <?php } ?>

            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" id="contactform">
                <div>
                    <label for="name"><strong>Nazwisko i imię:</strong></label>
                    <input type="text" size="50" name="contactname" id="contactname" value="" class="required" />
                </div>

                <div>
                    <label for="email"><strong>Email:</strong></label>
                    <input type="text" size="50" name="email" id="email" value="" class="required email" />
                </div>

                <div>
                    <label for="subject"><strong>Temat:</strong></label>
                    <input type="text" size="50" name="subject" id="subject" value="" class="required" />
                </div>

                <div>
                    <label for="message"><strong>Treść wiadomości:</strong></label>
                    <textarea rows="5" cols="50" name="message" id="message" class="required"></textarea>
                </div>
                <input type="submit" value="Wyślij" name="submit" />
            </form>
        </div>
    </body>
</html>