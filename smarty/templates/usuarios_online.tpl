<!-- muestra un link al perfil de los usuarios online -->
{if $usuarios_online}
	{foreach from=$usuarios_online item=actual}
		<p>
		<a href="./mostrar_perfil.php?id={$actual->idusuario}">{$actual->username}</a>
		</p>
	{/foreach}
{else}
	<h4>Nadie est&aacute; conectado al sistema. Adem&aacute;s debe iniciar sesi&oacute;n para poder ver los participantes online<br></h4>
{/if}