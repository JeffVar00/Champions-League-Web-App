<?php
	require_once "../conexiones/conexion_clubes.php";
	$nombre=$_POST['club'];
	$pais=$_POST['pais'];
	//FALTAN TODOS LOS DATOS RESTANTES, COMO PJ, GC, GF
	//PODRIA AFECTAR QUE PAIS ES UNA SELECCION NO UN FORM (SI CAUSA MUCHOS PROBLEMAS PONER UN FORM Y ALV)
	$query="INSERT INTO CLUBES(NOMBRE, PAIS) VALUES('$nombre','$pais')";
	if($mysqli->query($query)){
		echo "<script>alert('Datos guardados')</script>";
	}else{
		echo "<script>alert('Error, no se pudo guardar el registro')</script>";
	}
	//DE ESTE TAMBIEN HACER GUARDAR PARTIDOS
	//TALVEZ UN GUARDAR USUARIOS PERO ESTO SI SE AGREGAR FUNCION DE REGISTRARSE COSA QUE NO TENDRIA SENTIDO ASI QUE POR EL MOMENTO NO.