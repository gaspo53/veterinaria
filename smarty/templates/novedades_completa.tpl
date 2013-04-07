<!-- lista todos los datos de las novedades de interes en novedades_completa -->
{if $info_user}
	<h1>{$info_user}</h1>
{/if}
{foreach from=$novedades_completa item=actual}
	<p>{$actual->nombre_largo}</p>
	<p>{$actual->nombre_corto}</p>
	<p>{$actual->desc_corta}</p>
	<p>{$actual->desc_larga}</p>
	<p>Posteada por <a href="./mostrar_perfil.php?id={$actual->idUsuario}">{$actual->usuario}</a> el {$actual->fecha}</p>
	<a href="./ver_novedad.php?id={$actual->id}"> Ver </a>
	<hr>
{/foreach}
