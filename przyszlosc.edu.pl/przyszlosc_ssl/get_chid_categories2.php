<?php

	include('DB.php');

if($_REQUEST)
{
	$id2 	= $_REQUEST['parent2_id'];
	$id 	= $_REQUEST['parent_id'];


	$query = "select * from kierunki where szkola = ".$id2." and `miastoid` =".$id;
	$results = mysql_query( $query);
	if(mysql_num_rows($results)>0){?>
	
	<select name="subsub_category"  id="subsub_category_id">
	<option value="" selected="selected"></option>
	<?php
	while ($rows = mysql_fetch_assoc(@$results))
	{?>
		<option value="<?php echo $rows['ID'];?>" name="profil"><?php echo $rows['NAZWA'];?></option>
	<?php
	}?>
	</select>	
	
<?php	
}
else{
?>
<select name="subsub_category"  id="subsub_category_id">
	<option value="brak" selected="selected" name="profil">Brak profilu/zawodu</option>
</select>	

<?php
}
}
?>