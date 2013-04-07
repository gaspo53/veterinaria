{if $contenido}
	<!-- ESTA VARIALBE LA USAMOS PARA MOSTRAR TEXTO EN EL CENTRO DE LA PAGINA -->
	{foreach from=$contenido item=actual}
		<p>{$actual}</p>
	{/foreach}
{/if}