<!-- muestra todos los datos del link de interes seleccionado -->
<h1><a href="{$link_entero->url}" target="_blank">{$link_entero->nombre}</a></h1>
<p>{$link_entero->descripcion}</p>
<p>Posteado por <a href="./mostrar_perfil.php?id={$link_entero->idUsuario}">{$link_entero->usuario}</a> el {$link_entero->fecha}</p>
<a href="./eliminar_link.php?id={$link_entero->id}"> Eliminar </a>
<hr />
	

