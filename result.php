<?php
include 'inc.connect.php';
if(isset($_GET['city_selected']))
{
	 $city = $_GET['city_selected'];
}
if(!empty($city))
{
			
			$query = "SELECT * FROM city WHERE id ='".$city."'";
			$query_run = mysql_query($query);
			
			if($query_result = mysql_result($query_run,0,'city'))
			{
				echo $query_result;
			}
}
?>