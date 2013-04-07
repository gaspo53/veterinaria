<!-- arma y muestra los links para la suscripcion rss.-->
{foreach from=$rss_list item=feed}
	<a href="{$feed->getLink()}"> {$feed->getTitulo()} </a>
	<hr>
	<br>	
{/foreach}