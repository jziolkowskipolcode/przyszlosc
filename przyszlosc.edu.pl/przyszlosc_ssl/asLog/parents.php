<script type="text/javascript">
$(document).ready(function () {
    
    $('#nav li').hover(
        function () {
            //show its submenu
            $('ul', this).slideDown(200);
 
        },
        function () {
            //hide its submenu
            $('ul', this).slideUp(100);        
        }
    );
     
});
	</script>

<?php 
require 'DB.php';



$queryDzieci = "Select * from Rodzice where RodzicPesel=".$uzytkownik;
$wynikDzieci = mysql_query($queryDzieci);
$ile = mysql_num_rows($wynikDzieci);
echo "<ul id=\"nav\"><li><a href=\"#\">Pesel ucznia:</a></li></ul>";
while($row = mysql_fetch_array($wynikDzieci)){
	
	?>
	<ul id="nav">  
 		<li><a href="#"><?php echo $row['UczenPesel']; ?></a> 
  		<ul>
  			<li>
  				<a href="javascript:page('show.php?what=freq&u=<?php echo $row['UczenPesel']; ?>','main');">Frekwencja</a>
  			</li>
  			<li>
  				<a href="javascript:page('show.php?what=note&u=<?php echo $row['UczenPesel']; ?>','main');">Oceny</a>
  			</li>
  		</ul>
  		</li>   
  	</ul> 
<?php
}
?>
