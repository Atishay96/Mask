<?php
 $host = "localhost";
 $user = "root";
 $pass ="";
 $db = "gb";
 if(mysql_connect($host,$user,$pass)&&mysql_select_db($db))
 {
 	//echo "Connected";
 }
 else
 {
 	mysql_error();
 }

?>