<?php
require_once("../connect.php");
$db_handle = new DBController();
$sql = "SELECT * from mst_subject";
$faq = $db_handle->runQuery($sql);
?>
<html>
    <head>
      <title>Department Edit</title>
		<style>
			
			.current-row{background-color:#B24926;color:#FFF;}
			.current-col{background-color:#1b1b1b;color:#FFF;}
			.tbl-qa{width: 100%;font-size:0.9em;background-color: #f5f5f5;}
			.tbl-qa th.table-header {padding: 5px;text-align: left;padding:10px;}
			.tbl-qa .table-row td {padding:10px;background-color: #FDFDFD;}
		</style>
		<script src="js/jquery-1.11.0.min.js"></script>
		<script>
		function showEdit(editableObj) {
			$(editableObj).css("background","#FFF");
		} 
		
		function saveToDatabase(editableObj,column,id) {
			$(editableObj).css("background","#FFF url(loaderIcon.gif) no-repeat right");
			$.ajax({
				url: "departedit2.php",
				type: "POST",
				data:'column='+column+'&editval='+editableObj.innerHTML+'&id='+id,
				success: function(data){
					$(editableObj).css("background","#FDFDFD");
				}        
		   });
		}
		</script>
    </head>
 <body style="background: url(img/bg/1.gif);">
<center>
<div style="margin:auto;width:80%; height:600px;box-shadow:2px 1px 2px 2px #CCCCCC;text-align:left; border-radius: 10px;">

		<div class="head" style="background-color: #00aad0; height: 50px; border-radius: 5px 5px 2px 1px; margin-bottom: 30px;">
		     <a href="subadd.php" style="float: left; color: #ffffff; font-size: 20px; margin-left: 10px; margin-top: 10px;">Back</a>
		    <p style="text-align: center;font-weight: bold; color: #ffffff; font-size: 30px; margin-top: 10px;">
		       EDIT DEPARTMENT
		    </p>    
  		</div>

		<table class="tbl-qa">
		  <thead>
			  <tr>
				<th class="table-header" width="10%">S/No.</th>
				<th class="table-header">SUBJECT NAME</th>
				<th class="table-header">SUBJECT NUMBER</th>
			  </tr>
		  </thead>
		  <tbody>
		  <?php
		  foreach($faq as $k=>$v) {
		  ?>
			  <tr class="table-row">
				<td><?php echo $k+1; ?></td>

				<td contenteditable="true" onBlur="saveToDatabase(this,'sub_name','<?php echo $faq[$k]["id"]; ?>')" onClick="showEdit(this);"><?php echo $faq[$k]["sub_name"]; ?></td>

				<td contenteditable="true" onBlur="saveToDatabase(this,'sub_id','<?php echo $faq[$k]["id"]; ?>')" onClick="showEdit(this);"><?php echo $faq[$k]["sub_id"]; ?></td>
			  </tr>
		<?php
		}
		?>
		  </tbody>
		</table>

</div>
</center>	   
    </body>
</html>
