<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

        <title>Formularz rekrutacyjny</title>

        <script type="text/javascript" src="javascripts/jquery-1.3.2.js"></script>
        <script type="text/javascript" src="javascripts/jquery.livequery.js"></script>
        <script language="JavaScript" src="javascripts/calendar/calendar_eu.js"></script>
        <link rel="stylesheet" href="javascripts/calendar/calendar.css">

        <script type="text/javascript">

            $(document).ready(function() {

                $('#loader').hide();
                $('#show_heading').hide();
                $('#loader2').hide();
                $('#show_heading2').hide();
	
                $('#search_category_id').change(function(){
                    $('#show_sub_categories').fadeOut();
                    $('#loader').show();
                    $.post("get_chid_categories.php", {
                        parent_id: $('#search_category_id').val()
                    }, function(response){
			
                        setTimeout("finishAjax('show_sub_categories', '"+escape(response)+"')", 400);
                    });
                    return false;
                });
	

	
	
	
            });

	
	
            function zawod(id){
		
                $('#show_subsub_categories').fadeOut();
                $('#loader2').show();
                $.post("get_chid_categories2.php", {
                    parent_id: $('#search_category_id').val(),
                    parent2_id: $('#sub_category_id').val()
                }, function(response){
			
                    setTimeout("finishAjax2('show_subsub_categories', '"+escape(response)+"')", 400);
                });
                return false;

	
            }

            function finishAjax(id, response){
                $('#loader').hide();
                $('#show_heading').show();
                $('#'+id).html(unescape(response));
                $('#'+id).fadeIn();
            } 
            function finishAjax2(id, response){
                $('#loader2').hide();
                $('#show_heading2').show();
                $('#'+id).html(unescape(response));
                $('#'+id).fadeIn();
            } 

            function validate(email) {
                var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
                if(reg.test(email) == false) {
      
                    return true;
                }
            }

            function alert_id()
            {



                var status = true;

                if(($('#search_category_id').val() == '')||($('#sub_category_id').val() == '')||($('#subsub_category_id').val() == '')){
                    alert('Wybierz miasto, szkołę i profil.');
                    status = false;}
                if(($('#ssearch_category_id').val() == '')||($('#ssub_category_id').val() == '')||($('#ssubsub_category_id').val() == '')){
                    alert('Wybierz województwo, powiat i gminę.');
                    status = false;}
                if($('#nazwisko').val().length<2){
	
                    document.form.nazwisko.style.backgroundColor = "#fb6e6e";
                    status = false;
                }else{
                    document.form.nazwisko.style.backgroundColor = "white";
	
                }
                if($('#imPierwsze').val().length<2){
	
                    document.form.imPierwsze.style.backgroundColor = "#fb6e6e";
                    status = false;
                }else{
                    document.form.imPierwsze.style.backgroundColor = "white";
	
                }
	
                if(!checkPesel($('#pesel').val())){
	
                    document.form.pesel.style.backgroundColor = "#fb6e6e";
                    status = false;
                }else{
                    document.form.pesel.style.backgroundColor = "white";
	
                }
		
                if($('#miastoUr').val().length<2){

                    document.form.miastoUr.style.backgroundColor = "#fb6e6e";
                    status = false;
                }else{
                    document.form.miastoUr.style.backgroundColor = "white";
	
                }
                if($('#nazwrodowe').val().length<2){

                    document.form.nazwrodowe.style.backgroundColor = "#fb6e6e";
                    status = false;
                }else{
                    document.form.nazwrodowe.style.backgroundColor = "white";
	
                }
                if($('#DOseria').val().length<2){

                    document.form.DOseria.style.backgroundColor = "#fb6e6e";
                    status = false;
                }else{
                    document.form.DOseria.style.backgroundColor = "white";
	
                }
                if($('#DOnumer').val().length<2){

                    document.form.DOnumer.style.backgroundColor = "#fb6e6e";
                    status = false;
                }else{
                    document.form.DOnumer.style.backgroundColor = "white";
	
                }
	
	

                if($('#ulicaZam').val().length<2){

                    document.form.ulicaZam.style.backgroundColor = "#fb6e6e";
                    status = false;
                }else{
                    document.form.ulicaZam.style.backgroundColor = "white";
	
                }
			
                if($('#kodZam').val().length<2){

                    document.form.kodZam.style.backgroundColor = "#fb6e6e";
                    status = false;
                }else{
                    document.form.kodZam.style.backgroundColor = "white";
	
                }
                if($('#pocztaZam').val().length<2){

                    document.form.pocztaZam.style.backgroundColor = "#fb6e6e";
                    status = false;
                }else{
                    document.form.pocztaZam.style.backgroundColor = "white";
	
                }
                if($('#dataDO').val().length<10){

                    document.form.dataDO.style.backgroundColor = "#fb6e6e";
                    status = false;
                }else{
                    document.form.dataDO.style.backgroundColor = "white";
	
                }
	
                if(validate($('#email').val())){

                    document.form.email.style.backgroundColor = "#fb6e6e";
                    status = false;
                }else{
                    document.form.email.style.backgroundColor = "white";

                }
	

	
	

                return status;
	
	
	
	
            }






            function checkPesel(pesel)
            {
                var intControlNr =0;

                if (pesel != parseInt(pesel) || pesel.length!=11){


                    return false;
                }
                var wagi = ['1', '3', '7', '9', '1', '3', '7', '9', '1', '3']; // tablica z odpowiednimi wagami
                var intSum = 0;
                for (var i = 0; i < 10; i++)
                {

	
                    intSum += parseInt(wagi[i]) * parseInt(pesel.charAt(i)); //mnożymy każdy ze znaków przez wagć i sumujemy wszystko
	
                }
	
                var inti = 10 - intSum % 10; //obliczamy sumć kontrolną
                intControlNr = (inti == 10)?0:inti;
	
                if (intControlNr == parseInt(pesel.charAt(10))) //sprawdzamy czy taka sama suma kontrolna jest w ciągu
                {
                    return true;
                }
                return false;

            }


        </script>
        <style>
            .both h4{ font-family:Arial, Helvetica, sans-serif; margin:0px; font-size:14px;}
            #search_category_id{ padding:3px; width:200px;}
            #sub_category_id{ padding:3px; width:300px;}
            #subsub_category_id{ padding:3px; width:300px;}
            .both{ float:left; margin:0 15px 0 0; padding:0px;}
        </style>
    </head>
    <?php include('DB.php'); ?>
    <body>

        <h1>Formularz rekrutacyjny do szkół "Przyszłość"</h1>

        <br>
        Rejestracja on-line nie jest równoznaczna z przyjęciem do szkoły.<br>

        Po zakończeniu procesu rejestracji, należy  w ciągu 14 dni zgłosić się z kompletem dokumentów do sekretariatu szkoły w danym mieście, gdzie dokończony zostanie zapis.<br>
        <br>
        Dokumenty wymagane przy zapisie:<br>
        1. Oryginał lub odpis świadectwa ukończenia szkoły programowo niższej.<br>
        2. Dowód osobisty.<br>
        3. Trzy zdjęcia (można donieść w późniejszym terminie).<br>
        4. Zaświadczenie od lekarza medycyny pracy o braku przeciwskazań do podjęcia nauki na wybranym kierunku (dotyczy technikum informatycznego dla młodzieży w trybie dziennym).<br>
        5. Życiorys (wzór dostępny na stronie).
        <br>
        Niezgłoszenie się w wymaganym terminie spowoduje usunięcie danych kandydata z systemu.<br><br>

        <br clear="all" /><br clear="all" /><br clear="all" />

        <div style="padding-left:30px;">
            <hr>
            <form action="nabor_post.php" name="form" id="form" method="post" onsubmit="return alert_id();" enctype="multipart/form-data">
                <h3>Krok 1 - Wybór szkoły</h3>
                <div class="both">
                    <table>
                        <tr>	
                            <td style="width:150px;">
                                <h4>Wybierz miasto:</h4>
                            </td>
                            <td>
                                <select name="search_category"  id="search_category_id">
                                    <option value="" selected="selected"></option>
<?php
$query = "select * from miasto";
$results = mysql_query($query);

while ($rows = mysql_fetch_assoc(@$results)) {
    ?>
                                        <option value="<?php echo $rows['ID']; ?>"><?php echo $rows['NAZWA']; ?></option>
                                        <?php } ?>
                                </select>
                            </td>		
                        </tr>
                        <tr>
                            <td style="width:150px;">
                                <h4 id="show_heading">Wybierz szkołę:</h4>
                            </td>
                            <td>
                                <div id="show_sub_categories" >
                                    <img src="loader.gif" style="margin-top:8px; float:left" id="loader" alt="" />
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="width:150px;">
                                <h4 id="show_heading2">Wybierz profil/zawód:</h4>
                            </td>
                            <td>
                                <div id="show_subsub_categories" >
                                    <img src="loader.gif" style="margin-top:8px; float:left" id="loader2" alt="" />
                                </div>
                            </td>
                        </tr>
                    </table>	


                </div>



                <br clear="all" /><br clear="all" />
                <hr>
                <br>
                <h3>Krok 2 - Dane osobowe</h3>
                <br><br>
                <table>
                    <tr><td><b>Nazwisko:</b></td><td colspan="3"><input type="text" name="nazwisko" id="nazwisko" style="width:100%;" ></td></tr>
                    <tr><td><b>Imię pierwsze:</b></td><td><input type="text" name="imPierwsze" id="imPierwsze" style="width:100px;"><td><b>Imię drugie:</b></td><td><input type="text" name="imDrugie" id="imDrugie" style="width:100px;"></td></tr>
                    <tr><td><b>PESEL: </b></td><td><input type="text" name="pesel" id="pesel"></td></tr>

                    <tr><td><b>Miejsce urodzenia: </b></td><td colspan="2"><input type="text" name="miastoUr" id="miastoUr" style="width:100%;"></td></tr>

                    <tr><td><b>Nazwisko rodowe:</b></td><td colspan="3"><input type="text" name="nazwrodowe" id="nazwrodowe" style="width:100%;"></td></tr>
                    <tr><td><b>Seria i numer dowodu osobistego:</b></td><td><input type="text" name="DOseria" id="DOseria" style="width:50px;"><input type="text" name="DOnumer" id="DOnumer" style="width:80px;"></td></tr>
<?php
//<tr><td><b>Wydany przez:</b></td><td colspan="4"><input type="text" name="DOktowydal" id="DOktowydal" style="width:100%;"></td></tr>
?>
                    <tr><td><b>Data wydania:</b></td><td colspan="4"><input type="text" name="dataDO" id="dataDO" />
                            <script language="JavaScript">
                                new tcal ({
                                    // form name
                                    'formname': 'form',
                                    // input name
                                    'controlname': 'dataDO'
                                });

                            </script></td></tr>
                </table><br>
                <hr>

                <br>
                <h3>Krok 3 - Dane teleadresowe</h3>
                <br><br>
                <b>Miejsce zamieszkania:</b>	<?php
include 'nabor2.php';
?>



                <tr><td><b>Ulica:  </b></td><td><input type="text" name="ulicaZam" id="ulicaZam" style="width:300px;"></td></tr>
                <tr><td><b>Nr:  </b></td><td><input type="text" name="domZam" id="domZam" style="width:50px;"> / <input type="text" name="lokKores" style="width:50px;"></td></tr>
                <tr><td><b>Kod:  </b></td><td><input type="text" name="kodZam" id="kodZam" style="width:50px;" ></td></tr>
                <tr><td><b>Poczta:  </b></td><td><input type="text" name="pocztaZam" id="pocztaZam"></td></tr>
                </table><br><br>
                <b>Adres do korespondencji (jeśli inny niż zamieszkania):</b><br><br><table>
                    <tr><td style="width:100px;">Miejscowość:  </td><td><input type="text" name="miastoKores" style="width:300px;"></td></tr>
                    <tr><td>Ulica:  </td><td><input type="text" name="ulicaKores" style="width:300px;"></td></tr>
                    <tr><td>Nr:  </td><td><input type="text" name="domKores" style="width:50px;"> / <input type="text" name="lokKores" style="width:50px;"></td></tr>
                    <tr><td>Kod:  </td><td><input type="text" name="kodKores" style="width:50px;" ></td></tr>
                    <tr><td>Poczta:  </td><td><input type="text" name="pocztaKores"></td></tr>
                </table><br><br>
                <b>Dodatkowe dane kontaktowe:</b><br><br>
                <table>
                    <tr><td style="width:100px;"><b>Telefon:</b></td><td><input type="text" name="telefon" id="telefon"></td></tr>
                    <tr><td style="width:100px;"><b>Tel. kom.:</b></td><td><input type="text" name="telefonKom" id="telefonKom"></td></tr>
                    <tr><td style="width:100px;"><b>E-mail:</b></td><td><input type="text" name="email" id="email" style="width:300px;"></td></tr>
                </table>






                <br><br>
                <script></script>

                <input type="submit" name="submit" value="Zarejestruj" style="margin-left:200px; width:100px; height:50px;"/>
            </form>
        </div>
        <br clear="all" /><br clear="all" /><br clear="all" />
        <br clear="all" /><br clear="all" /><br clear="all" />
        <br clear="all" /><br clear="all" />
        <br clear="all" /><br clear="all" /><br clear="all" />
        <br clear="all" /><br clear="all" /><br clear="all" />

    </body>
</html>