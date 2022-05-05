<?php
	$mysqli= new mysqli("", "root", "root0000", "USUARIOS", 3304);
	if(mysqli_connect_errno()){
		echo "Este sitio esta presentando problemas";
	}
	$mysqli->set_charset("utf8");
?>

//FALTA CONEXION CLUBES Y CONEXION PARTIDOS
//NO SE SI HACER UNA CONEXION CON GRUPOS PORQUE NO VEO EL SENTIDO DE SU EXITIR NI DONDE UTILIZAR