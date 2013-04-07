<?php

include_once("inicializar.php");

// ESTE PHP ES USADO SOLAMENTE POR AJAX PARA COMPROBAR LA DISPONIBILIDAD DE UN NOBRE DE USUARIO

	if (isset( $_POST['username'] )){
		$login = $_POST['username'];
		$rpta='';
		$con = conectar_DB();
		$consu = "SELECT * FROM usuarios WHERE username = '$login'";
		$re=$con->query($consu);
		if ($linea = $re->fetchRow(MDB2_FETCHMODE_OBJECT)){
			$rpta = 0;
		  } else 
				{
				$rpta = 1;
		}
		$con->disconnect();
		print $rpta;
} else
	{
		header("Location: index.php");
	}
?>