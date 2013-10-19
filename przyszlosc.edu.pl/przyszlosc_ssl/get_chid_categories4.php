<?php

	include('DB.php');

if($_REQUEST)
{	$id2 = $_REQUEST['parent_id'];
	$id 	= $_REQUEST['parent2_id'];
	$query = "select * from geo_commune where `poviat_id` = ".$id;
	$results = mysql_query( $query);
	if(mysql_num_rows($results)>0){?>
	
	<select name="ssubsub_category"  id="ssubsub_category_id" onchange="zawod3(this.value);">
	<option value="" selected="selected"></option>
	<?php
	while ($rows = mysql_fetch_assoc(@$results))
	{?>
		<option value="<?php echo $rows['id'];?>" name="gmina"><?php echo $rows['name'];?></option>
	<?php
	}?>
	</select>	

<?php	
}
else{
?>
<select name="ssubsub_category"  id="ssubsub_category_id">
	<option value="brak" selected="selected" name="gmina">Brak gminy</option>
</select>	

<?php
}
}
?>