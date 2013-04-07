<?php
// ESTE PHP LSITA LOS USUARIOS ONLINE CON UNA ACTIVIDAD NO MAYOR A 5 MIN
include_once("DB.php");
include_once("./inicializar.php");
if (hay_alguien()){
		$con = conectar_DB();
		$username = getSessionUsername();
		$idUsuario = getSessionId();
		$time = 5 ;
		// Momento que entra en línea
		$date = time() ;
		// Recuperamos su IP
		$limite = $date-$time*60 ;
		// si se supera el tiempo limite (5 minutos) lo borramos
		$consulta ="DELETE FROM usuarios_online WHERE date < '$limite'";
		$con->query($consulta);
		// tomamos todos los usuarios en linea
		$resp ="SELECT * FROM usuarios_online WHERE username = '$username'";
		$resul = $con->query($resp);
		// Si son los mismo actualizamos la tabla gente_online
		if ( ($lineax = $resul->fetchRow(DB_FETCHMODE_OBJECT)) ){
			$actulizar = "UPDATE usuarios_online SET date='$date' WHERE username='$username'";
		}else 
			{
			$actulizar = "INSERT INTO usuarios_online (id,date,username,idUsuario) VALUES (NULL,'$date','$username','$idUsuario')" ;
		}
		$con->query($actulizar);
		// Seleccionamos toda la tabla
		$query = "SELECT * FROM usuarios_online ORDER BY username ASC";
		$usuarios = $con->query($query);
		$arrd = array();
		$cont = 0;
		while ($lineax = $usuarios->fetchRow(DB_FETCHMODE_OBJECT)){
				if ($username == $lineax->username)
					$lineax->username = $username." (usted)";
				$arrd[$cont] = $lineax;
				$cont++;
		}
		$smarty->assign('usuarios_online',$arrd);
		$con-> disconnect();
}
?>