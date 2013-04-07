{if $info_user}
	<!-- ESTE TEMPLATE MUESTRA INFORMACION DE CUALQUEIR TIPO, GENERALMENTE USADO PARA AVISOS 
													(DE AHI SU NOMBRE) Y LINKS TEMPORALES-->
	<h1>{$info_user}</h1>
{/if}

<h2 class="error">{$error}</h2>
<br>
{if $link_temp}
 <a href="{$link_temp}">{$desc_temp}</a>
 <br>
 <br>
{/if}
{if $link_temp2}
 <a href="{$link_temp2}">{$desc_temp2}</a>
{/if}