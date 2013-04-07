{if $info_user}
	<!-- ESTA VARIALBE LA USAMOS PARA DAR INFO DEL USUARIO QUE POSTEO -->
	<h1>{$info_user}</h1>
{/if}
{foreach from=$articulos_completo item=actual}
	<p>{$actual->titulo}</p>
	<p>{$actual->descripcion}</p>
	<p>Posteado por <a href="./mostrar_perfil.php?id={$actual->idUsuario}">{$actual->usuario}</a> el {$actual->fecha}</p>
	<a href="./ver_articulo.php?id={$actual->id}"> Ver </a>
	<hr>
{/foreach}
