<!-- lista todos los datos de los links de interes en links_completos -->
{if $info_user}
	<h1>{$info_user}</h1>
{/if}
{foreach from=$links_completos item=actual}
	<p>{$actual->nombre}</p>
	<p>{$actual->descripcion}</p>
	<p>Posteado por <a href="./mostrar_perfil.php?id={$actual->idUsuario}">{$actual->usuario}</a> el {$actual->fecha}</p>
	<a href='{$actual->url}' target="_blank"> Link de Inter&eacute;s </a>
	<br>
	<br>
	<a href="./eliminar_link.php?id={$actual->id}"> Eliminar </a>
	<hr>
{/foreach}	

