{foreach from=$eventos item=actual}
	<p>{$actual->titulo}</p>
	<p>{$actual->descripcion}</p>
	<p>Posteado por <a href="./mostrar_perfil.php?id={$actual->idUsuario}">{$actual->usuario}</a> el {$actual->fecha}</p>
	<a href="./ver_evento.php?id={$actual->id}"> Ver Evento </a>
	<hr>
{/foreach}
	

