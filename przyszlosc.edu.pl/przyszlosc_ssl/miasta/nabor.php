

<script type="text/javascript" src="../javascripts/jquery-1.3.2.js"></script>
<script type="text/javascript" src="../javascripts/jquery.livequery.js"></script>

<script type="text/javascript">

    $(document).ready(function() {

        $('#loader').hide();
        $('#show_heading').hide();
        $('#loader2').hide();
        $('#show_heading2').hide();
	
        $('#search_category_id').change(function(){
            $('#show_sub_categories').fadeOut();
            $('#loader').show();
            $.post("miasto/get_chid_categories3.php", {
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
        $.post("miasto/get_chid_categories4.php", {
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



    function alert_id()
    {
        var status = true;

        return status;
	
	
	
	
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
<?php include('../DB.php'); ?>
<body>

    <div style="padding-left:30px;">

        <div class="both">
            <h4>Województwo:</h4>
            <select name="search_category"  id="search_category_id">
                <option value="" selected="selected"></option>
<?php
$query = "select * from geo_province";
$results = mysql_query($query);

while ($rows = mysql_fetch_assoc(@$results)) {
    ?>
                    <option value="<?php echo $rows['id']; ?>"><?php echo $rows['name']; ?></option>
                    <?php } ?>
            </select>		

            <h4 id="show_heading">Powiat:</h4>
            <div id="show_sub_categories" >
                <img src="loader.gif" style="margin-top:8px; float:left" id="loader" alt="" />
            </div>


            <h4 id="show_heading2">Gmina:</h4>
            <div id="show_subsub_categories" >
                <img src="loader.gif" style="margin-top:8px; float:left" id="loader2" alt="" />
            </div>
        </div>

    </div>
</body>
</html>