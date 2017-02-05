<?php
	include 'inc.connect.php';
	$status = -1; 	
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Masking</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="gb.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script>
		$(document).ready(function(){
			<?php
				if($status == -1)
				{
					echo '$("#current").hide();';					
				}
			?>
			$("#sea , a").click(function(){
				$("#mask").hide("slow");
				$("#current").show();
				
				<?php 
					$status = 1;
				?>

			});
			$("#current").click(function(){
				$("#mask").show("slow");
			{
				$status = 0;
			}
			});
		});
		function load(int)
		{
			
				if(int == -1)
				{
					var r = $("#sel :selected").attr("name"); 
				}
				else
				{
					var r = int;
				}
			
			if(window.XMLHttpRequest)
			{
				xmlhttp = new XMLHttpRequest();
			}
			else
			{
				xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
			}
			
			xmlhttp.onreadystatechange = function()
			{
				if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
				{
					document.getElementById("current").innerHTML = xmlhttp.responseText;
				}
			}
			xmlhttp.open('GET','result.php?city_selected='+r,true);
			xmlhttp.send();
		}
	</script>

</head>
<body>

	<div class="container-fluid bg1" name="a">

		<div id="mask" class="mask" name="b">
		<center>
			Select Your City To Start Search<br/><br/>
				<form id="City" name="City">
					<div class="form-group">
						<select class="form-control" id="sel" name="s">
						<?php 
						$query="SELECT * FROM city ORDER BY city DESC";
						$query_run=mysql_query($query);
						$row=mysql_num_rows($query_run);
						while($row--)
						{
							$query_result = mysql_result($query_run,$row,'city');
							$id = mysql_result($query_run,$row,'id');							
							echo '<option id="'.$id.'" name="'.$id.'" value="'.$id.'">'.$query_result.'</option>';
						}
					  ?>
					  </select>
					</div>
					 <input type="button" id="sea" class="btn btn-lg btn-info" value="Select" onclick="load(-1);">	
				</form>
			<br/>Popular Searches :<br/>
			<a id="1" onclick="load('<?php echo '1'; ?>');">Chennai</a> &nbsp;<a id="4" onclick="load(<?php echo '4'; ?>);"> Jaipur</a> &nbsp;<a id="5" onclick="load(<?php echo '5'; ?>);"> Bengaluru</a> &nbsp;<a id="3" onclick="load(<?php echo '3'; ?>);"> Kolkata</a>
			</center>
			<br/>
		</div>
		
	</div>	
	<div class="container-fluid bg2">
		&nbsp;&nbsp;<button id="current" class="btn btn-lg btn-success"></button>
	</div>

</body>
</html>