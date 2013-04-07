<!-- lista los datos de las novedades en news_array -->
{foreach from=$news_array item=actual}
	<p>{$actual->nombre_largo}</p>
	<p>{$actual->nombre_corto}</p>
	<p>{$actual->desc_corta}</p>
	<p>Posteado por <a href="./mostrar_perfil.php?id={$actual->idUsuario}">{$actual->usuario}</a> el {$actual->fecha}</p>
	<a href="./ver_novedad.php?id={$actual->id}"> Ver </a>
	<hr>
{/foreach}