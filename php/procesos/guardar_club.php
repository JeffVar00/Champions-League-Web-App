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

	if($nombre == "" || $pais == "..."){
		header("refresh:0.1;url= ../menu_usuario.php");
		echo "<script>alert('Error, campos sin llenar')</script>";
	}else{
		$query_verif="SELECT * FROM CLUBES";
		$consulta=$mysqli->query($query_verif);

		if($consulta->num_rows >= 32){
			header("refresh:0.1;url= ../menu_usuario.php");
			echo "<script>alert('Error, limite de clubes alcanzado')</script>";
		}else{
			$query="INSERT INTO CLUBES(NOMBRE, PAIS, PJ, PG, PP, PE, GF, GC, DG, Pts) VALUES('$nombre','$pais','$PJ','$PG','$PP','$PE','$GF','$GC','$DG', 0)";
			if($mysqli->query($query)){
				header("refresh:0.1;url= ../menu_usuario.php");
			}else{
				header("refresh:0.1;url= ../menu_usuario.php");
				echo "<script>alert('Error, club ya registrado')</script>";
			}
		}
	}