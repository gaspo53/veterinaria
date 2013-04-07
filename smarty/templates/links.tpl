<!-- lista todos los links de la variable linkkk, generalmente se usa para la barra lateral-->
{if $linkkk}
	<ul>
		{foreach from=$linkkk item=actual}
			<li><a href="{$actual->url}" target="_blank">{$actual->nombre}</a></li>
		{/foreach}
	</ul>
{/if}