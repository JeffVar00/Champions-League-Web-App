<?php
	$user=$_POST['username'];
	$password=md5($_POST['password']);
	$query="SELECT * FROM USUARIOS WHERE USER='$user' AND PASSWORD='$password'";
	$consulta2=$mysqli->query($query);
	if($consulta2->num_rows>=1){
		$fila=$consulta2->fetch_array(MYSQLI_ASSOC);
		session_start();
		$_SESSION['tiempo'] = time();
		$_SESSION['user'] = $fila['USER'];
		$_SESSION['verificar'] = true;
		header("Location: menu_usuario.php");
	}else{
		echo "<font color='#FFFFFF'>Los datos son incorrectos</font>";
	}
	