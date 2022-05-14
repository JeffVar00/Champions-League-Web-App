<?php
	session_start();
	if(!$_SESSION['verificar']){
		header("Location: ../index.html");
	}else if (time() - $_SESSION['tiempo'] > 600) {
		session_destroy();
		header("Location: ../index.html");  
	}
?>

<!DOCTYPE html>
<html>
<head>
	
	<title>Menu de usuario</title>
	<link href="../css/bootstrap.css" rel="stylesheet">
	<link rel="icon" type="image/x-icon" href="../img/logo.webp">
	<script type="text/javascript" src="../js/jquery-3.6.0.js"></script>
	<script type="text/javascript" src="../js/bootstrap.js"></script>
	<script type="text/javascript" src="../js/agregar_equipos.js"></script>
	<script type="text/javascript" src="../js/agregar_equipos.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link href="../css/links.css" type="text/css" rel="stylesheet">

</head>
<body style="background-color: #FFFFFF;">
<nav class="navbar navbar-expand-sm">
  <div class="container-fluid">
    <a class="navbar-brand" href="../index.html" target=_self><img src="../img/UEFA_logo.png" alt="UEFA Home" widht="50" height ="50"></a>
    <button class="navbar-toggler bg-secundary navbar-light" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="mynavbar">
      <ul class="navbar-nav me-auto">
      </ul>
      
    </div>
  </div>
</nav>
<br>

<div class="col-autobg-danger p-5 text-center" style = "background-color: #000645; ">
	<br>
		<img src="../img/champions.png" widht="350" height ="350"></img>
			<br>	<br>
		<h3>Menu de administrador</h3>

		<?php
			echo "<h5>Bienvenido, " . $_SESSION['user'] . "</h5>";
		?>

	</div>
<br>

<div class="col-autobg-danger p-5 text-center" style = "background-color: #FFFFFF;">

		<h3 class="title"><font color="#000644">Agregar Equipos</font> </h3><br>
    <form action="procesos/guardar_club.php" name="form" method="post">
    <p><font color="#000">Nombre Del Equipo: <font></p>
 		<input onkeyup="validarN()" onblur="validarN()" size="30" name="club" id="club"><br>
 	  <div id="message1" hidden>
    Ingrese un club.
    </div><br>

	  <p><font color="#000">Pais: <font></p>
	  		<select onkeyup="validarP()" onblur="validarP()" name="pais" id="pais" class="form-select" style="border-color: #000000;">
	  			<option selected>...</option>
			  	<option value="Albania">Albania</option>
			  	<option value="Alemania">Alemania</option>
			  	<option value="Andorra">Andorra</option>
			  	<option value="Armenia">Armenia</option>
			  	<option value="Austria">Austria</option>
			  	<option value="Azerbaiyán">Azerbaiyán</option>
			  	<option value="Bélgica">Bélgica</option>
			  	<option value="Bielorrusia">Bielorrusia</option>
			  	<option value="Bosnia y Herzegovina">Bosnia y Herzegovina</option>
			  	<option value="Bulgaria">Bulgaria</option>
			  	<option value="Chipre">Chipre</option>
			  	<option value="Croacia">Croacia</option>
			  	<option value="Dinamarca">Dinamarca</option>
			  	<option value="Eslovaquia">Eslovaquia</option>
			  	<option value="Esloveia">Esloveia</option>
			  	<option value="España">España</option>
			  	<option value="Estonia">Estonia</option>
			  	<option value="Finlandia">Finlandia</option>
			  	<option value="Francia">Francia</option>
			  	<option value="Georgia">Georgia</option>
			  	<option value="Grecia">Grecia</option>
			  	<option value="Hungria">Hungria</option>
			  	<option value="Irlanda">Irlanda</option>
			  	<option value="Islandia">Islandia</option>
			  	<option value="Italia">Italia</option>
			  	<option value="Letonia">Letonia</option>
			  	<option value="Liechtenstein">Liechtenstein</option>
			  	<option value="Lituania">Lituania</option>
			  	<option value="Luxemburgo">Luxemburgo</option>
			  	<option value="Gales">Gales</option>
			  	<option value="Gibraltar">Gibraltar</option>
			  	<option value="Macedonia del Norte">Macedonia del Norte</option>
			  	<option value="Malta">Malta</option>
			  	<option value="Moldavia">Moldavia</option>
			  	<option value="Mónaco">Mónaco</option>
			  	<option value="Montenegro">Montenegro</option>
			  	<option value="Noruega">Noruega</option>
			  	<option value="Países Bajos">Países Bajos</option>
			  	<option value="Polonia">Polonia</option>
			  	<option value="Portugal">Portugal</option>
			  	<option value="Inglaterra">Inglaterra</option>
			  	<option value="Turquía">Turquía</option>
			  	<option value="República Checa">Francia</option>
			  	<option value="Rumania">Rumania</option>
			  	<option value="Rusia">Rusia</option>
			  	<option value="San Marino">San Marino</option>
			  	<option value="Serbia">Serbia</option>
			  	<option value="Suecia">Suecia</option>
			  	<option value="Suiza">Suiza</option>
			  	<option value="Ucrania">Ucrania</option>
			  	<option value="Escocia">Escocia</option>
			  </select>

	<div id="message2" hidden>
    	Seleccione un pais.
    </div><br><br>

		<button id="adicionar" class="btn btn-outline-primary" type="submit"> Agregar a la tabla de competidores </button><br>

		</form><br><br>

		<h5 class="title" id="adicionados"><font color="#000644">Total Clubes Participando: </font> </h5>

		<table id="myTable" class="table table-bordered " border="1">
			
    <thead>
        <th>Club</th>
        <th>Pais</th>
    </thead>
    <tbody>
    	<?php
				require_once "conexiones/conexion.php";
				$query="SELECT * FROM CLUBES";
				$consulta1=$mysqli->query($query);
				while($fila=$consulta1->fetch_array(MYSQLI_ASSOC)){
					echo "<tr>
						<td>".$fila['NOMBRE']."</td>
						<td>".$fila['PAIS']."</td>
						<td><a href='procesos/eliminar_club.php?id=".$fila['NOMBRE']."'>Eliminar</a></td>
					</tr>";
				}
			?>		
    </tbody>
		</table>
 
	</div>

	<div class="col-autobg-danger p-5 text-center" style = "background-color: #000645; ">
	<br>
		<h5>Temporada 2022/2023</h5>
		<br><button class="btn btn-outline-warning" style="align-content: center;" type="button" id="sorteo"> Sortear grupos. </button> <br>
	<br>
	</div>

	<div class="col-autobg-danger p-5 text-center" style = "background-color: #FFFFFF;">
		<h4 class="title"><font color="#000644">Grupos</font></h4>
        <br>
        <div class="row">
        	<div class="col-sm-3">
		        <h5 class="title"><font color="#000644">Grupo A</font></h5>
		        <table id="Grupo A" class="table table-hover" >
		        <thead>
		            <th name = "club" scope="col" width="80%"><font color="#929292">Clubes</font></th>
		        </thead>
		        <tbody>
		          <?php
		          require_once "conexiones/conexion.php";
		          $query1="SELECT * FROM CLUBES WHERE ID_GRUPO = 'A'";
		          $consulta1=$mysqli->query($query1);
		          while($fila1=$consulta1->fetch_array(MYSQLI_ASSOC)){
		            echo "
		              <tr>
		              <td>".$fila1['NOMBRE']."</td>
		            </tr>"; 
		          }
		        ?>
		        </tbody>
		    	</table>
		    </div>
		    <div class="col-sm-3">
		        <h5 class="title"><font color="#000644">Grupo B</font></h5>
		        <table id="Grupo B" class="table table-hover" >
		        <thead>
		            <th name = "club" scope="col" width="80%"><font color="#929292">Clubes</font></th>
		        </thead>
		        <tbody>
		          <?php
		          require_once "conexiones/conexion.php";
		          $query1="SELECT * FROM CLUBES WHERE ID_GRUPO = 'B'";
		          $consulta1=$mysqli->query($query1);
		          while($fila1=$consulta1->fetch_array(MYSQLI_ASSOC)){
		            echo "
		              <tr>
		              <td>".$fila1['NOMBRE']."</td>
		            </tr>"; 
		          }
		        ?>
		        </tbody>
		    	</table>
		    </div>
		    <div class="col-sm-3">
		        <h5 class="title"><font color="#000644">Grupo C</font></h5>
		        <table id="Grupo C" class="table table-hover" >
		        <thead>
		            <th name = "club" scope="col" width="80%"><font color="#929292">Clubes</font></th>
		        </thead>
		        <tbody>
		          <?php
		          require_once "conexiones/conexion.php";
		          $query1="SELECT * FROM CLUBES WHERE ID_GRUPO = 'C'";
		          $consulta1=$mysqli->query($query1);
		          while($fila1=$consulta1->fetch_array(MYSQLI_ASSOC)){
		            echo "
		              <tr>
		              <td>".$fila1['NOMBRE']."</td>
		            </tr>"; 
		          }
		        ?>
		        </tbody>
		    	</table>
		    </div>
		    <div class="col-sm-3">
		        <h5 class="title"><font color="#000644">Grupo D</font></h5>
		        <table id="Grupo D" class="table table-hover" >
		        <thead>
		            <th name = "club" scope="col" width="80%"><font color="#929292">Clubes</font></th>
		        </thead>
		        <tbody>
		          <?php
		          require_once "conexiones/conexion.php";
		          $query1="SELECT * FROM CLUBES WHERE ID_GRUPO = 'D'";
		          $consulta1=$mysqli->query($query1);
		          while($fila1=$consulta1->fetch_array(MYSQLI_ASSOC)){
		            echo "
		              <tr>
		              <td>".$fila1['NOMBRE']."</td>
		            </tr>"; 
		          }
		        ?>
		        </tbody>
		    	</table>
		    </div>
		    <div class="col-sm-3">
		        <h5 class="title"><font color="#000644">Grupo E</font></h5>
		        <table id="Grupo E" class="table table-hover" >
		        <thead>
		            <th name = "club" scope="col" width="80%"><font color="#929292">Clubes</font></th>
		        </thead>
		        <tbody>
		          <?php
		          require_once "conexiones/conexion.php";
		          $query1="SELECT * FROM CLUBES WHERE ID_GRUPO = 'E'";
		          $consulta1=$mysqli->query($query1);
		          while($fila1=$consulta1->fetch_array(MYSQLI_ASSOC)){
		            echo "
		              <tr>
		              <td>".$fila1['NOMBRE']."</td>
		            </tr>"; 
		          }
		        ?>
		        </tbody>
		    	</table>
		    </div>
		    <div class="col-sm-3">
		        <h5 class="title"><font color="#000644">Grupo F</font></h5>
		        <table id="Grupo F" class="table table-hover" >
		        <thead>
		            <th name = "club" scope="col" width="80%"><font color="#929292">Clubes</font></th>
		        </thead>
		        <tbody>
		          <?php
		          require_once "conexiones/conexion.php";
		          $query1="SELECT * FROM CLUBES WHERE ID_GRUPO = 'F'";
		          $consulta1=$mysqli->query($query1);
		          while($fila1=$consulta1->fetch_array(MYSQLI_ASSOC)){
		            echo "
		              <tr>
		              <td>".$fila1['NOMBRE']."</td>
		            </tr>"; 
		          }
		        ?>
		        </tbody>
		    	</table>
		    </div>
		    <div class="col-sm-3">
		        <h5 class="title"><font color="#000644">Grupo G</font></h5>
		        <table id="Grupo G" class="table table-hover" >
		        <thead>
		            <th name = "club" scope="col" width="80%"><font color="#929292">Clubes</font></th>
		        </thead>
		        <tbody>
		          <?php
		          require_once "conexiones/conexion.php";
		          $query1="SELECT * FROM CLUBES WHERE ID_GRUPO = 'G'";
		          $consulta1=$mysqli->query($query1);
		          while($fila1=$consulta1->fetch_array(MYSQLI_ASSOC)){
		            echo "
		              <tr>
		              <td>".$fila1['NOMBRE']."</td>
		            </tr>"; 
		          }
		        ?>
		        </tbody>
		    	</table>
		    </div>
		    <div class="col-sm-3">
		        <h5 class="title"><font color="#000644">Grupo H</font></h5>
		        <table id="Grupo H" class="table table-hover" >
		        <thead>
		            <th name = "club" scope="col" width="80%"><font color="#929292">Clubes</font></th>
		        </thead>
		        <tbody>
		          <?php
		          require_once "conexiones/conexion.php";
		          $query1="SELECT * FROM CLUBES WHERE ID_GRUPO = 'H'";
		          $consulta1=$mysqli->query($query1);
		          while($fila1=$consulta1->fetch_array(MYSQLI_ASSOC)){
		            echo "
		              <tr>
		              <td>".$fila1['NOMBRE']."</td>
		            </tr>"; 
		          }
		        ?>
		        </tbody>
		    	</table>
		    </div>
    	</div>
	</div>

	<div class="col-autobg-danger p-5 text-center" style = "background-color: #FFFFFF;">
        <h4 class="title"><font color="#000644">Partidos</font></h4>
        <br>
        <h5 class="title"><font color="#000644">Grupo A</font></h5>
            <table id="myTable" class="table table-bordered " border="1">
                <thead>
                	<th width="10%">ID_Partido</th>
                    <th>Casa</th>
                    <th>Goles</th>
                    <th> vs </th>
                    <th>Goles</th>
                    <th>Visitante</th>
                </thead>
            <thbody>
            	<?php
				require_once "conexiones/conexion.php";
				$query="SELECT * FROM PARTIDOS WHERE ID_GRUPO = 'A'";
				$consulta1=$mysqli->query($query);
				while($fila=$consulta1->fetch_array(MYSQLI_ASSOC)){
					echo "<tr>
						<td>".$fila['ID_PARTIDO']."</td>
						<td>".$fila['CASA']."</td>
						<td>".$fila['G_CASA']."</td>
						<td> vs </td>
						<td>".$fila['G_VISITANTE']."</td>
						<td>".$fila['VISITANTE']."</td>
					</tr>";
				}
			?>	
            </thbody>
          </table>

          <br>
        <h5 class="title"><font color="#000644">Grupo B</font></h5>
            <table id="myTable" class="table table-bordered " border="1">
                <thead>
                	<th width="10%">ID_Partido</th>
                    <th>Casa</th>
                    <th>Goles</th>
                    <th> vs </th>
                    <th>Goles</th>
                    <th>Visitante</th>
                </thead>
            <thbody>
            	<?php
				require_once "conexiones/conexion.php";
				$query="SELECT * FROM PARTIDOS WHERE ID_GRUPO= 'B'";
				$consulta1=$mysqli->query($query);
				while($fila=$consulta1->fetch_array(MYSQLI_ASSOC)){
					echo "<tr>
						<td>".$fila['ID_PARTIDO']."</td>
						<td>".$fila['CASA']."</td>
						<td>".$fila['G_CASA']."</td>
						<td> vs </td>
						<td>".$fila['G_VISITANTE']."</td>
						<td>".$fila['VISITANTE']."</td>
					</tr>";
				}
			?>	
            </thbody>
          </table>
        <br>
                <h5 class="title"><font color="#000644">Grupo C</font></h5>
            <table id="myTable" class="table table-bordered " border="1">
                <thead>
                  <th width="10%">ID_Partido</th>
                    <th>Casa</th>
                    <th>Goles</th>
                    <th> vs </th>
                    <th>Goles</th>
                    <th>Visitante</th>
                </thead>
            <thbody>
              <?php
        require_once "conexiones/conexion.php";
        $query="SELECT * FROM PARTIDOS WHERE ID_GRUPO= 'C'";
        $consulta1=$mysqli->query($query);
        while($fila=$consulta1->fetch_array(MYSQLI_ASSOC)){
          echo "<tr>
            <td>".$fila['ID_PARTIDO']."</td>
            <td>".$fila['CASA']."</td>
            <td>".$fila['G_CASA']."</td>
            <td> vs </td>
            <td>".$fila['G_VISITANTE']."</td>
            <td>".$fila['VISITANTE']."</td>
          </tr>";
        }
      ?>  
            </thbody>
          </table>
        <br>
                <h5 class="title"><font color="#000644">Grupo D</font></h5>
            <table id="myTable" class="table table-bordered " border="1">
                <thead>
                  <th width="10%">ID_Partido</th>
                    <th>Casa</th>
                    <th>Goles</th>
                    <th> vs </th>
                    <th>Goles</th>
                    <th>Visitante</th>
                </thead>
            <thbody>
              <?php
        require_once "conexiones/conexion.php";
        $query="SELECT * FROM PARTIDOS WHERE ID_GRUPO= 'D'";
        $consulta1=$mysqli->query($query);
        while($fila=$consulta1->fetch_array(MYSQLI_ASSOC)){
          echo "<tr>
            <td>".$fila['ID_PARTIDO']."</td>
            <td>".$fila['CASA']."</td>
            <td>".$fila['G_CASA']."</td>
            <td> vs </td>
            <td>".$fila['G_VISITANTE']."</td>
            <td>".$fila['VISITANTE']."</td>
          </tr>";
        }
      ?>  
            </thbody>
          </table>
        <br>
                <h5 class="title"><font color="#000644">Grupo E</font></h5>
            <table id="myTable" class="table table-bordered " border="1">
                <thead>
                  <th width="10%">ID_Partido</th>
                    <th>Casa</th>
                    <th>Goles</th>
                    <th> vs </th>
                    <th>Goles</th>
                    <th>Visitante</th>
                </thead>
            <thbody>
              <?php
        require_once "conexiones/conexion.php";
        $query="SELECT * FROM PARTIDOS WHERE ID_GRUPO= 'E'";
        $consulta1=$mysqli->query($query);
        while($fila=$consulta1->fetch_array(MYSQLI_ASSOC)){
          echo "<tr>
            <td>".$fila['ID_PARTIDO']."</td>
            <td>".$fila['CASA']."</td>
            <td>".$fila['G_CASA']."</td>
            <td> vs </td>
            <td>".$fila['G_VISITANTE']."</td>
            <td>".$fila['VISITANTE']."</td>
          </tr>";
        }
      ?>  
            </thbody>
          </table>
        <br>
                <h5 class="title"><font color="#000644">Grupo F</font></h5>
            <table id="myTable" class="table table-bordered " border="1">
                <thead>
                  <th width="10%">ID_Partido</th>
                    <th>Casa</th>
                    <th>Goles</th>
                    <th> vs </th>
                    <th>Goles</th>
                    <th>Visitante</th>
                </thead>
            <thbody>
              <?php
        require_once "conexiones/conexion.php";
        $query="SELECT * FROM PARTIDOS WHERE ID_GRUPO= 'F'";
        $consulta1=$mysqli->query($query);
        while($fila=$consulta1->fetch_array(MYSQLI_ASSOC)){
          echo "<tr>
            <td>".$fila['ID_PARTIDO']."</td>
            <td>".$fila['CASA']."</td>
            <td>".$fila['G_CASA']."</td>
            <td> vs </td>
            <td>".$fila['G_VISITANTE']."</td>
            <td>".$fila['VISITANTE']."</td>
          </tr>";
        }
      ?>  
            </thbody>
          </table>
        <br>
                <h5 class="title"><font color="#000644">Grupo G</font></h5>
            <table id="myTable" class="table table-bordered " border="1">
                <thead>
                  <th width="10%">ID_Partido</th>
                    <th>Casa</th>
                    <th>Goles</th>
                    <th> vs </th>
                    <th>Goles</th>
                    <th>Visitante</th>
                </thead>
            <thbody>
              <?php
        require_once "conexiones/conexion.php";
        $query="SELECT * FROM PARTIDOS WHERE ID_GRUPO= 'G'";
        $consulta1=$mysqli->query($query);
        while($fila=$consulta1->fetch_array(MYSQLI_ASSOC)){
          echo "<tr>
            <td>".$fila['ID_PARTIDO']."</td>
            <td>".$fila['CASA']."</td>
            <td>".$fila['G_CASA']."</td>
            <td> vs </td>
            <td>".$fila['G_VISITANTE']."</td>
            <td>".$fila['VISITANTE']."</td>
          </tr>";
        }
      ?>  
            </thbody>
          </table>
        <br>
                <h5 class="title"><font color="#000644">Grupo H</font></h5>
            <table id="myTable" class="table table-bordered " border="1">
                <thead>
                  <th width="10%">ID_Partido</th>
                    <th>Casa</th>
                    <th>Goles</th>
                    <th> vs </th>
                    <th>Goles</th>
                    <th>Visitante</th>
                </thead>
            <thbody>
              <?php
        require_once "conexiones/conexion.php";
        $query="SELECT * FROM PARTIDOS WHERE ID_GRUPO= 'H'";
        $consulta1=$mysqli->query($query);
        while($fila=$consulta1->fetch_array(MYSQLI_ASSOC)){
          echo "<tr>
            <td>".$fila['ID_PARTIDO']."</td>
            <td>".$fila['CASA']."</td>
            <td>".$fila['G_CASA']."</td>
            <td> vs </td>
            <td>".$fila['G_VISITANTE']."</td>
            <td>".$fila['VISITANTE']."</td>
          </tr>";
        }
      ?>  
            </thbody>
          </table>
        <br>

        <h4 class="title"><font color="#000644">Modificar partido</font></h4>

        <form action='procesos/enviar_resultados.php' name="form" method='POST'>
        <input size='9' placeholder="ID de partido" name='id' id='id'>
        <input size='9' placeholder="Goles Casa" name='gcasa' id='gcasa'>
        <input size='9' placeholder="Goles Visita" name='gvisita' id='gvisita'><br><br>
		<button class='btn btn-outline-primary' type='submit'>Enviar Resultados</button>
		</form>
    </div>



<br><br>

	<footer style="text-align: center;">

		  <section class="section footer-nav-neutral">
		    <div class="container-fluid">
		      <div class="row">
		        <div class="col-xs-12">
		          <div >
		            <p><font color="#006387">&copy; 1998-2022 UEFA. Todos los derechos reservados</font></p>
		            <p><font color="#006387">La palabra UEFA, el logo de la UEFA y todas las marcas relacionadas con las competiciones de la UEFA están protegidas por las marcas registradas y/o por el copyright de UEFA. Se prohíbe el uso de estas marcas registradas para uso comercial. El uso de UEFA.com significa la aceptación de sus Términos, Condiciones y Política de Privacidad.</font></p>
		          </div>
		        </div>
		      </div>
		    </div>
		  </section>
		</div>

     </footer>

</body>
</html>