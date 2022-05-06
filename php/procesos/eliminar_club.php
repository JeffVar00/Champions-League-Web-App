<?php

	require_once "../conexiones/conexion_club.php";
	if(isset($_GET['nombre'])){ //CREO QUE LA OPCION DE ELIMINAR GENERARIA PROBLEMAS PORQUE NO HAY FORMA DE SABER CUAL SE ESTARIA ELIMINANDO, MEJOR DEJAR DE LADO MIENTRAS, IGUAL NO ES FUNCIONALIDAD OBLIGATORIA
		$club=$_GET['club'];
		$query="DELETE FROM CLUBES WHERE NOMBRE='$club'";
		if($mysqli->query($query)){
			echo "<script>alert('Se elimino con exito')</script>";
		}else{
			echo "<script>alert('ERROR, No se pudo borrar el registro')</script>";
		}
	}else{
		echo "<script>alert('No se pudo procesar su solicitud')</script>";
	}