<?php
	require_once "../conexiones/conexion.php";
	$nombre=$_POST['club'];
	$pais=$_POST['pais'];
	$PJ = 0;
	$PG = 0;
	$PP = 0;
	$PE = 0;
	$GF = 0;
	$GC = 0;
	$DG = 0;
	//PODRIA AFECTAR QUE PAIS ES UNA SELECCION NO UN FORM (SI CAUSA MUCHOS PROBLEMAS PONER UN FORM Y ALV)
	$query="INSERT INTO CLUBES(NOMBRE, PAIS, PJ, PG, PP, PE, GF, GC, DG) VALUES('$nombre','$pais','$PJ','$PG','$PP','$PE','$GF','$GC','$DG')";
	if($mysqli->query($query)){
		header("refresh:0.1;url= ../menu_usuario.php");
		echo "<script>alert('Datos guardados')</script>";
	}else{
		header("refresh:0.1;url= ../menu_usuario.php");
		echo "<script>alert('Error, club ya registrado')</script>";	
	}
	//DE ESTE TAMBIEN HACER GUARDAR PARTIDOS
	//TALVEZ UN GUARDAR USUARIOS PERO ESTO SI SE AGREGAR FUNCION DE REGISTRARSE COSA QUE NO TENDRIA SENTIDO ASI QUE POR EL MOMENTO NO.