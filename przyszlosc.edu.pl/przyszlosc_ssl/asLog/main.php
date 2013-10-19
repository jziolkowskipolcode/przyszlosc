<?php
if (isset($_COOKIE['username'])) {
	$uzytkownik = $_COOKIE['username'];
}else {
	$uzytkownik=$_SESSION['username'];
}
        
       
if($poziom==128){
	?>
	<style type="text/css"> 
	#nav
	{
	margin:0;
	padding:0;
	list-style:none;
	}
	#nav li
	{
	float:left;
	display:block;
	width:100px;
	background:#ff8458;
	position:relative;
	z-index:20;
	margin:0 1px;
	}
	#nav li a
	{
	display:block;
	padding:8px 5px 0 5px;
	font-weight:700;
	height:23px;
	text-decoration:none;
	color:#fff;
	text-align:center;
	color:#010101;
	}
	#nav li a:hover
	{
	color:#fff;
	}
	#nav a.selected
	{
	color:#f00;
	}
	#nav ul
	{
	position:absolute;
	left:0;
	display:none;
	margin:0 0 0 -1px;
	padding:0;
	list-style:none;
	}
	#nav ul li
	{
	width:100px;
	float:left;
	border-top:1px solid #fff;
	}
	#nav ul a
	{
	display:block;
	height:15px;
	padding:8px 5px;
	color:#b2ff0d;
	}
	#nav ul a:hover
	{
	text-decoration:underline;
	}
	*html #nav ul
	{
	margin:0 0 0 -2px;
	}
	</style>
	
	<?php 
	echo "<div id=\"rodzice\" style=\"width:960px; text-align:center; clear:both;\" >";
//menu rozwijane
include('parents.php');
echo "</div>";

}
?>
<div id="main"  style="min-height:200px;">
    <center>
    
        <?php

   
        
        if (isset($_GET['art']) && is_numeric($_GET['art']) && isset($_SESSION['username']) && strlen($_GET['user']) == '11') {
        ?>
        <style type="text/css">
		#main { padding:20px; min-height:200px; }
   		</style>
		<?php
            require 'artykul.php';
        } else if (isset($_REQUEST['pm'])) {
        ?>
        <style type="text/css">
		#main { padding:20px; }
		</style>
		<?php
        include 'msgpanel.php';
        } else if (isset($_REQUEST['plan'])) {
        ?>
        <style type="text/css">
		#main { padding:20px; }
		</style>
		<?php
            include 'plany.php';
        }
        else if (isset($_REQUEST['oceny'])) {

            include 'oceny.php';
        } else{
        
        if($poziom==102){ 
       	require 'Kalendarz/index.php';         ?>
        <style type="text/css">
		#main { padding:20px; }
   		</style>
<?php
	}
	if($poziom==100){?>
	        <style type="text/css">
			#main { padding:20px; }
	   		</style>
	   		<center>
	<?php
		require 'oceny.php';         ?>

	<?php
		}

	}
	
		
        ?>
    </center>
</div>
