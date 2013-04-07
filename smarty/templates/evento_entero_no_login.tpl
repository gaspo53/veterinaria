	<h1>{$evento_entero_no_login->titulo}</h1>
	<p>{$evento_entero_no_login->descripcion}</p>
	<p>Este evento se realizar&aacute; entre las fechas {$evento_entero_no_login->fecha_comienzo} y {$evento_entero_no_login->fecha_fin}
	en {$evento_entero_no_login->lugar}</p>
	<p>Posteado por <a href="./mostrar_perfil.php?id={$evento_entero_no_login->idUsuario}">{$evento_entero_no_login->usuario}</a> el {$evento_entero_no_login->fecha}</p>
