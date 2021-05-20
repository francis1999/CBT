
<p style="font-size:20px; font-family:arial;">Update Instructions</p>
<?php
include_once '../../connect.php';

if (isset($_POST['edit'])) {
	$doSELECT="SELECT * FROM mst_settings";
	$doResult=mysqli_query($connect, $doSELECT);
	$doCount=mysqli_num_rows($doResult);
	if ($doCount > 0) {
		while ($rows=mysqli_fetch_array($doResult)) {
		?>
		<div>
			<p>
<input class="inp" type="text" placeholder="<?php echo $rows['info']; ?>" id="inp<?php echo $rows['id_sett']; ?>" value="<?php echo $rows['info']; ?>">
<input style="display:none;" type="hidden" id="idinfo<?php echo $rows['id_sett']; ?>" value="<?php echo $rows['id_sett']; ?>">
<button class="inp2" id="<?php echo $rows['id_sett']; ?>">Save</button>

			</p>
		</div>
	<?php	
		}}else{
	?>
<div>
	<p>No Instruction Yet.</p>
</div>
<?php
	}
}
?>

<style type="text/css">
	.inp{width: 70%; padding: 15px; border: 2px solid #c0c0c0; border-radius: 10px;}
	.inp2{ padding: 15px; border-radius: 10px; cursor: pointer;}
</style>

<script type="text/javascript">
	$(".inp2").click(function(){
		var element = $(this);
		var ID = element.attr("id");
		var inp=$("#inp"+ID).val();
		var idinfo=$("#idinfo"+ID).val();
		if(inp==''){
			alert("This Can be Empty");
		}else{
			$.ajax({
				type: "POST",
				url: "ajax/updateinfo.php",
				data: {inp:inp,idinfo:idinfo},
				cache: false,
				success: function(data){
					alert(data);
				}
			});
		}
	});
</script>