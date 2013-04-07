<!-- muestra todos los datos del link seleccionado, solo para verlo -->
<h1><a href="{$link_entero_no_login->url}" target="_blank">{$link_entero_no_login->nombre}</a></h1>
<p>{$link_entero_no_login->descripcion}</p>
<p>Posteado por <a href="./mostrar_perfil.php?id={$link_entero_no_login->idUsuario}">{$link_entero_no_login->usuario}</a> el {$link_entero_no_login->fecha}</p>
<hr />
<br />
	

