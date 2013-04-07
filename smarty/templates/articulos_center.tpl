{foreach from=$arts_array item=actual}
	<p>{$actual->nombre_largo}</p>
	<p>{$actual->nombre_corto}</p>
	<p>{$actual->desc_corta}</p>
	<p>{$actual->desc_larga}</p>
	<p>{$actual->usuario}</p>
	<a href="./ver_articulo.php?id={$actual->id}"> Ver </a>
	<hr>
{/foreach}