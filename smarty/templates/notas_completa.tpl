<!-- lista los datos de las notas de interes en notas_completa -->
{if $info_user}
	<h1>{$info_user}</h1>
{/if}
{foreach from=$notas_completa item=actual}
	<p>{$actual->titulo}</p>
	<p>{$actual->nota}</p>
	<p>Posteada por <a href="./mostrar_perfil.php?id={$actual->idUsuario}">{$actual->usuario}</a> el {$actual->fecha}</p>
	<a href='{$actual->link}' target="_blank"> Link De La Nota </a>
	<p>
	<a href="./eliminar_nota.php?id={$actual->id}"> Eliminar </a>
	</p>
	<hr>
{/foreach}	

