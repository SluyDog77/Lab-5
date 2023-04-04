<?php
	$connect = mysqli_connect("Localhost:3306", "root", "", "ems_db");
	
	if($connect === false){
		die("ERROR: Could not connect. " . mysqli_connect_error());
	}
?>