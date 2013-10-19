<?php

	include('DB.php');

if($_REQUEST)
{
	$id 	= $_REQUEST['parent_id'];
	$query = "select * from szkola where miasto = ".$id;
	$results = mysql_query( $query);
	?>
	
	<select name="sub_category"  id="sub_category_id" onchange="zawod(this.value);">
	<option value="" selected="selected"></option>
	<?php
	while ($rows = mysql_fetch_assoc(@$results))
	{?>
		<option value="<?php echo $rows['ID'];?>" name="szkola"><?php echo $rows['NAZWA'];?></option>
	<?php
	}?>
	</select>	
	
<?php	
}
?>