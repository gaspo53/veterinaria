	<h1>{$evento_entero->titulo}</h1>
	<p>{$evento_entero->descripcion}</p>
	<p>Este evento se realizar&aacute; entre las fechas {$evento_entero->fecha_comienzo} y {$evento_entero->fecha_fin}
	en {$evento_entero->lugar}</p>
	<p>Posteado por <a href="./mostrar_perfil.php?id={$evento_entero->idUsuario}">{$evento_entero->usuario}</a> el {$evento_entero->fecha}</p>
	<a href="./eliminar_evento.php?id={$evento_entero->id}"> Eliminar evento </a>
