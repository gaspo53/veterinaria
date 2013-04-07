<!-- muestra la informacion del usuario seleccionado -->
<p>Nombre y Apellido: {$usuario->nombre} {$usuario->apellido}</p>
<p>Usuario: {$usuario->username}</p>
<p>Direcci&oacute;n: {$usuario->direccion}</p>
{if $usuario->tipo eq "1"}
	<p>Tipo: Administrador</p>
{elseif $usuario->tipo eq "2"}
	<p>Tipo: Participante</p>
{/if}
<p>Tel&eacute;fono: {$usuario->telefono}</p>
<p>E-Mail: <a href="mailto:{$usuario->email}">{$usuario->email}</a></p> 
<p>Profesi&oacute;n: {$usuario->profesion}</p>
<h5><a href="./escribir_mensaje.php?usuario_a_responder={$usuario->username}">Contactar participante </a></h5> 

