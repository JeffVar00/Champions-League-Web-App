<?php
	$user=$_POST['user'];
	$pass=md5($_POST['pass']);
	$query="SELECT * FROM usuario WHERE USER='$user' AND PASSWORD='password'";
	echo $query;
	$consulta2=$mysqli->query($query);
	if($consulta2->num_rows>=1){
		$fila=$consulta2->fetch_array(MYSQLI_ASSOC);
		session_start();
		$_SESSION['user'] = $fila['USER'];
		$_SESSION['verificar'] = true;
		header("Location: ../../html/menu_usuario.html");
	}else{
		echo "Los datos son incorrectos";
	}
	