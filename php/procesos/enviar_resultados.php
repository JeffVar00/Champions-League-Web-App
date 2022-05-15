<?php
	require_once "../conexiones/conexion.php";
	
		$id=$_POST['id'];
		$gcasa1=$_POST['gcasa'];
		$gvisitante1=$_POST['gvisita'];

		$query_verif="SELECT * FROM PARTIDOS WHERE ID_PARTIDO='$id'";
		$consulta_grupo=$mysqli->query($query_verif);

		if($consulta_grupo->num_rows >= 1){

			$fila = $consulta_grupo->fetch_array(MYSQLI_ASSOC);

			if($fila['G_CASA'] != NULL || $fila['G_VISITANTE'] != NULL){
				header("refresh:0.1;url= ../menu_usuario.php");
				echo "<script>alert('ERROR, No se puede modificar el resultado del partido una vez finalizado')</script>";
			}else if($id == "" || $gcasa1 == "" || $gvisitante1 == ""){
				header("refresh:0.1;url= ../menu_usuario.php");
				echo "<script>alert('ERROR, No se envio ninguna informacion')</script>";
			}else{
				$gcasa2=intval($gcasa1);
				$gvisitante2=intval($gvisitante1);

				$casa = $fila['CASA'];
				$visita = $fila['VISITANTE'];

				if($gcasa2 > $gvisitante2){
					$query_puntos_casa = "UPDATE CLUBES SET PJ = PJ + 1, PG = PG + 1, GF = GF + '$gcasa2', GC = GC + '$gvisitante2', DG = GF - GC, Pts = Pts + 3 WHERE NOMBRE='$casa'";
					$query_puntos_visitante = "UPDATE CLUBES SET PJ = PJ + 1, PP = PP + 1, GF = GF + '$gvisitante2', GC = GC + '$gcasa2', DG = GF - GC WHERE NOMBRE='$visita'";
				}else if($gcasa2 < $gvisitante2){
					$query_puntos_visitante = "UPDATE CLUBES SET PJ = PJ + 1, PG = PG + 1, GF = GF + '$gvisitante2', GC = GC + '$gcasa2', DG = GF - GC, Pts = Pts + 3 WHERE NOMBRE='$visita'";
					$query_puntos_casa = "UPDATE CLUBES SET PJ = PJ + 1, PP = PP + 1, GF = GF + '$gcasa2', GC = GC + '$gvisitante2', DG = GF - GC WHERE NOMBRE='$casa'";
				}else{
					$query_puntos_casa = "UPDATE CLUBES SET PJ = PJ + 1, PE = PE + 1, GF = GF + '$gcasa2', GC = GC + '$gvisitante2', DG = GF - GC, Pts = Pts + 1 WHERE NOMBRE='$casa'";
					$query_puntos_visitante = "UPDATE CLUBES SET PJ = PJ + 1, PE = PE + 1, GF = GF + '$gvisitante2', GC = GC + '$gcasa2', DG = GF - GC, Pts = Pts + 1 WHERE NOMBRE='$visita'";
				}
				
				$mysqli->query($query_puntos_casa);
				$mysqli->query($query_puntos_visitante);

				$query_actualizar="UPDATE PARTIDOS
	  									SET G_CASA='$gcasa2' , G_VISITANTE='$gvisitante2'
	  									WHERE ID_PARTIDO='$id'";
					if($mysqli->query($query_actualizar)){
						header("refresh:0.1;url= ../menu_usuario.php");
					}else{
						header("refresh:0.1;url= ../menu_usuario.php");
						echo "<script>alert('ERROR, No se pudo actualizar el registro')</script>";
				}
			}

		}else{
				header("refresh:0.1;url= ../menu_usuario.php");
				echo "<script>alert('ERROR, ID de partido incorrecto')</script>";
		}

