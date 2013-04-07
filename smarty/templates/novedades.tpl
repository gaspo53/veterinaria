<!--si hay alguna novedad en novex, muestra una pequenia descripcion de cada una, se usa para la barra lateral -->
{if $novex}
	{foreach from=$novex item=actual}
		<p> {$actual->nombre_corto}:
		<a href="./ver_novedad.php?id={$actual->id}">[m&aacute;s...] </a>
		</p>
	{/foreach}
{/if}