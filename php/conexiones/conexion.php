<?php
	$mysqli= new mysqli("db-progra4-2022.ceezokayaxge.us-east-1.rds.amazonaws.com", "root", "root0000", "UEFA", 3304);
	if(mysqli_connect_errno()){
		echo "<script>alert('El sitio presenta problemas')</script>";
	}
	$mysqli->set_charset("utf8");
?>
