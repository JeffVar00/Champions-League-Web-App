<!DOCTYPE html>
<html>
<head>
	<title>Iniciar Sesion</title>
	<link href="../css/bootstrap.css" rel="stylesheet">
	<link rel="icon" type="image/x-icon" href="../img/logo.webp">
	<script type="text/javascript" src="../js/bootstrap.js"></script>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link href="../css/links.css" type="text/css" rel="stylesheet">

</head>

<body style="background-color: #000645;">
<div class="container">
	<br>
	<div class="container text-center" class="img-fluid">
	<img src="../img/champions.png" widht="350" height ="350"></img>
    <form action="login.php" method="POST">
    <div class="mb-3 mt-3">
      <label for="username"><font color="#FFFFFF">Nombre de usuario:</font></label>
      <input class="form-control"placeholder="Usuario" name="username">
    </div>
    <div class="mb-3">
      <label for="password"><font color="#FFFFFF">Contraseña:</font></label>
      <input  type="password" class="form-control" placeholder="Contraseña" name="password">
    </div>
   
    <div class="col-autobg-danger p-5 text-center" >
	<button type="submit" class="btn btn-outline-info">Iniciar Sesion</button>
	</div>
    </form>

    <?php
	if(isset($_POST['username']) && isset($_POST['password'])){
			require_once "conexiones/conexion.php";
			require_once "procesos/login.php";
	}
	?>

  </div>
</div>

</body>
</html>