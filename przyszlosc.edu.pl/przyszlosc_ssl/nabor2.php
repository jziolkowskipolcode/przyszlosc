<script type="text/javascript" src="../javascripts/jquery-1.3.2.js"></script>
<script type="text/javascript" src="../javascripts/jquery.livequery.js"></script>

<script type="text/javascript">

    $(document).ready(function() {

        $('#sloader').hide();
        $('#sshow_heading').hide();
        $('#sloader2').hide();
        $('#sloader3').hide();
        $('#sshow_heading2').hide();
        $('#sshow_heading3').hide();
        $('#ssearch_category_id').change(function(){
            $('#sshow_sub_categories').fadeOut();
            $('#sloader').show();
            $.post("get_chid_categories3.php", {
                parent_id: $('#ssearch_category_id').val()
            }, function(response){
			
                setTimeout("finishAjax3('sshow_sub_categories', '"+escape(response)+"')", 400);
            });
            return false;
        });
	

	
	
	
    });

	
	
    function zawod2(id){
		
        $('#sshow_subsub_categories').fadeOut();
        $('#sloader2').show();
        $.post("get_chid_categories4.php", {
            parent_id: $('#ssearch_category_id').val(),
            parent2_id: $('#ssub_category_id').val()
        }, function(response){
			
            setTimeout("finishAjax4('sshow_subsub_categories', '"+escape(response)+"')", 400);
        });
        return false;

	
    }
	
    function zawod3(id){
		
        $('#sshow_subsubsub_categories').fadeOut();
        $('#sloader3').show();
        $.post("get_chid_categories5.php", {
            parent_id: $('#ssearch_category_id').val(),
            parent2_id: $('#ssubsub_category_id').val()
        }, function(response){
			
            setTimeout("finishAjax5('sshow_subsubsub_categories', '"+escape(response)+"')", 400);
        });
        return false;

	
    }

    function finishAjax3(id, response){
        $('#sloader').hide();
        $('#sshow_heading').show();
        $('#'+id).html(unescape(response));
        $('#'+id).fadeIn();
    } 
    function finishAjax4(id, response){
        $('#sloader2').hide();
        $('#sshow_heading2').show();
        $('#'+id).html(unescape(response));
        $('#'+id).fadeIn();
    } 
    function finishAjax5(id, response){
        $('#sloader2').hide();
        $('#sshow_heading3').show();
        $('#'+id).html(unescape(response));
        $('#'+id).fadeIn();
    } 





</script>
<style>
    .both h4{ font-family:Arial, Helvetica, sans-serif; margin:0px; font-size:14px;}
    #ssearch_category_id{ padding:3px; width:200px;}
    #ssub_category_id{ padding:3px; width:200px;}
    #ssubsub_category_id{ padding:3px; width:200px;}
    .both{ float:left; margin:0 15px 0 0; padding:0px;}
</style>
</head>
<?php include('DB.php'); ?>
<body>

    <div style="padding-left:30px;">

        <div class="both">
            <table>
                <tr>
                    <td>
                        <h4>Województwo:</h4>
                    </td>
                    <td>
                        <select name="ssearch_category"  id="ssearch_category_id">
                            <option value="" selected="selected"></option>
<?php
$query = "select * from przyszlosc.`geo_province`";
$results = mysql_query($query);

while ($rows = mysql_fetch_assoc(@$results)) {
    ?>
                                <option value="<?php echo $rows['id']; ?>"><?php echo $rows['name']; ?></option>
                                <?php } ?>
                        </select>		
                    </td>
                </tr>
                <tr>
                    <td>
                        <h4 id="sshow_heading">Powiat:</h4>
                    </td>
                    <td>
                        <div id="sshow_sub_categories" >
                            <img src="loader.gif" style="margin-top:8px; float:left" id="sloader" alt="" />
                        </div>
                    </td>
                </tr>		
                <tr>
                    <td>
                        <h4 id="sshow_heading2">Gmina:</h4>
                    </td>
                    <td>
                        <div id="sshow_subsub_categories" >
                            <img src="loader.gif" style="margin-top:8px; float:left" id="sloader2" alt="" />
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h4 id="sshow_heading3">Miejscowość:</h4>
                    </td>
                    <td>
                        <div id="sshow_subsubsub_categories" >
                            <img src="loader.gif" style="margin-top:8px; float:left" id="sloader3" alt="" />
                        </div>
                    </td>
                </tr>

        </div>
        <br>
