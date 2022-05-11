<?php
	require_once "../conexiones/conexion.php";
	if(isset($_GET['id'])){ 
		$club=$_GET['id'];

		$query_verif="SELECT * FROM CLUBES WHERE NOMBRE='$club'";
		$consulta_grupo=$mysqli->query($query_verif);

		$fila = $consulta_grupo->fetch_array(MYSQLI_ASSOC);

		if($fila['ID_GRUPO'] != NULL){
			header("refresh:0.1;url= ../menu_usuario.php");
			echo "<script>alert('ERROR, No se puede eliminar un equipo una vez iniciada la temporada')</script>";
		}else{
			$query_delete="DELETE FROM CLUBES WHERE NOMBRE='$club'";
			if($mysqli->query($query_delete)){
				header("refresh:0.1;url= ../menu_usuario.php");
			}else{
				header("refresh:0.1;url= ../menu_usuario.php");
				echo "<script>alert('ERROR, No se pudo borrar el registro')</script>";
			}
		}



	}else{
		header("refresh:0.1;url= ../menu_usuario.php");
		echo "<script>alert('No se pudo procesar su solicitud')</script>";
	}