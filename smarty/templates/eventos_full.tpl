{if $info_user}
	<!-- ESTA VARIALBE LA USAMOS PARA DAR INFO DEL USUARIO QUE POSTEO -->
	<h1>{$info_user}</h1>
{/if}
{foreach from=$eventos_full item=actual}
	<br>
	<h2>{$actual->titulo}</h2>
	<p>{$actual->descripcion}</p>
	<p>Este evento se realizar&aacute; entre las fechas {$actual->fecha_comienzo} y {$actual->fecha_fin}
	en {$actual->lugar}</p>
	<p>Posteado por <a href="./mostrar_perfil.php?id={$actual->idUsuario}">{$actual->usuario}</a> el {$actual->fecha}</p>
	<hr>
	<a href="./eliminar_evento.php?id={$actual->id}"> Eliminar </a>
	<br>
{/foreach}
	

