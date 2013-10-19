<html>
<?php
//wyswietlanie ocen z 1 lub 2 semestru 
if(isset($_REQUEST['sem']) && $_REQUEST['sem']=='1'){
?>
<embed src="tmp/oceny/<?php echo $_REQUEST['u'];?>.pdf" type="application/pdf" width="100%" height="1000px"></embed>

<?php
}else {
?>
<embed src="tmp/oceny2/<?php echo $_REQUEST['u'];?>.pdf" type="application/pdf" width="100%" height="1000px"></embed>
<?php
}
?>
</html>