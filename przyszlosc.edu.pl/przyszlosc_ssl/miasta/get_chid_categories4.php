<?php
include('../DB.php');

if ($_REQUEST) {
    $id = $_REQUEST['parent2_id'];
    $query = "select * from geo_commune where `poviat_id` = " . $id;
    $results = mysql_query($query);
    if (mysql_num_rows($results) > 0) {
        ?>

        <select name="subsub_category"  id="subsub_category_id">
            <option value="" selected="selected"></option>
            <?php
            while ($rows = mysql_fetch_assoc(@$results)) {
                ?>
                <option value="<?php echo $rows['id']; ?>" name="gmina"><?php echo $rows['name']; ?></option>
                <?php } ?>
        </select>	

        <?php
    } else {
        ?>
        <select name="subsub_category"  id="subsub_category_id">
            <option value="brak" selected="selected" name="gmina">Brak profilu/zawodu</option>
        </select>	

        <?php
    }
}
?>