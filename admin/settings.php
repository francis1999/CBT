<!DOCTYPE html>
<html>
<head>
	<title>Settings</title>
</head>
<body style="background: url(img/bg/1.gif);">
<style type="text/css">
.hello{
    background:skyblue;
    color: #fff;
    height:50px;
    width: 100%;
    position: fixed;
    z-index: 5;
    top: 0;
  }
</style>
<body style="background: url(img/bg/1.gif);">
<header class="hello">
  <b><p style="font-size:25px; margin-left:5px; margin-top:10px; text-align: center;">COMPUTER BASED TEST (CBT)</p></b>
</header>
<br>
<br>
	<style type="text/css">
		.er{width: 60%; height: 60vh; border: 2px solid #c0c0c0; margin-top: 50px;}
	.d1{overflow-y: scroll; float: left; margin-left: 30px; display: inline-block; width: 50%; height: 40vh; border: 1px solid #c0c0c0; margin-top: 65px; margin-right: 10px; border-radius: 10px;}
	.d2{float: left; display: inline-block; width: 40%; height: 40vh; border: 1px solid #c0c0c0; margin-top: 65px; border-radius: 10px;}
	.input{width: 75%; padding: 20px; border-radius: 20px; resize: none; outline: none; box-shadow: 5px 5px 2px #c0c0c0;}
	.input2{width: 20%; padding: 15px; border-radius: 20px; resize: none; outline: none; cursor: pointer;}
	.btnlogo{width: 70%; height: 200px; margin-top: 20px; border-radius: 15px; outline: none; cursor: pointer;}
	.sel{width: 70%; padding: 10px; cursor: pointer;}
	</style>
	<center>
	<div class="er">
		<a href="login.php">Back</a>
		<div class="d1">
				<div class="alldiv">
				<p><textarea class="input" type="text" id="info" placeholder="Enter Instruction Here..." rows="3" required="true"></textarea></p>
				<input class="input2" type="submit" id="save" value="Add">
				<button class="input2" id="edit">Edit</button>
				</div>
				
				<p><select class="sel" id="selbtn">
					<option>Examination Time</option>
					<option value="10">10 min</option>
					<option value="20">20 min</option>
					<option value="30">30 min</option>
					<option value="50">50 min</option>
					<option value="60">1 hrs</option>
					<option value="120">2 hrs</option>
					<option value="180">3 hrs</option>
					<option value="240">4 hrs</option>
				</select></p>
		</div>

		<div class="d2">
			<form action="" method="POST" id="uploadimage">
				<input onchange="files();" type="file" name="file" style="display: none;" id="file" >
				<input type="submit" name="submit" style="display:none;" id="submit">
			</form>
			<button class="btnlogo" id="addlogo">ADD LOGO</button>
		</div>


	</div>
	</center>
</body>
</html>

<script type="text/javascript" src="../js/jquery-1.11.0.min.js"></script>

<script type="text/javascript">
	
$("#file").on('change', function(){
	$("#submit").click();
});
</script>

<script>
	$("#addlogo").click(function(){
		$("#file").click();
	});

	$("#save").click(function(){
		var info =$("#info").val();
		if (info=='') {
			alert("Enter Instruction");
		}else{
			$.ajax({
				type: "POST",
				url: "ajax/saveinfo.php",
				data: {info:info},
				cache: false,
				success: function(data){
					alert(data);
					$("#info").val('');
				}
			});
		}
		return false;
	});


	$(document).ready(function (e) {
	$("#uploadimage").on('submit',(function(e) {
		e.preventDefault();
		$.ajax({
        	url: "ajax/savelogo.php",   	
			type: "POST",      				
			data:  new FormData(this), 		
			contentType: false,       		
    	    cache: false,					
			processData:false,  			
			success: function(data) {
				alert(data);
			if (data=='success') {
		
			}
		    }	        
	   });
	}));
});

$("#edit").click(function(){
	var edit="edit";
	$.ajax({
		type: "POST",
		url: "ajax/editinfo.php",
		data: {edit:edit},
		cache: false,
		success: function(data){
			$(".alldiv").html('');
			$(".alldiv").append(data);
		}
	});
});

$("#selbtn").on('change', function(){
	var selbtn = $("#selbtn").val();
	if (selbtn=='Examination Time') {
		alert('Pick Examination Time');
	}else{
		$.ajax({
			type: "POST",
			url: "ajax/subtime.php",
			data: {selbtn:selbtn},
			cache: false,
			success: function(data){
				alert(data);
			}
		});
	}
})
</script>

