{foreach from=$news_array item=actual}
	<p>{$actual->nombre_largo}</p>
	<p>{$actual->nombre_corto}</p>
	<p>{$actual->desc_corta}</p>
	<p>{$actual->desc_larga}</p>
	<p>{$actual->usuario}</p>
	<p>Posteado por <a href="./mostrar_perfil.php?id={$actual->idUsuario}">{$actual->usuario}</a> el {$actual->fecha}</p>
	<a href="./ver_novedad.php?id={$actual->id}"> Ver </a>
	<hr>
{/foreach}
{foreach from=$arts_array item=actual}
	<p>{$actual->nombre_largo}</p>
	<p>{$actual->nombre_corto}</p>
	<p>{$actual->desc_corta}</p>
	<p>{$actual->desc_larga}</p>
	<p>{$actual->usuario}</p>
	<a href="./ver_articulo.php?id={$actual->id}"> Ver </a>
	<hr>
{/foreach}