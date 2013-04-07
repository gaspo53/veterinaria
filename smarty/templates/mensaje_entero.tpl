<!-- muestra todos los datos del mensaje seleccionado -->
<h1>De: {$mensaje->remitente}</h1>
<br>
<h1>Asunto: {$mensaje->asunto}</h1>
<p>{$mensaje->mensaje}</p>
<a href="./eliminar_mensaje.php?id={$mensaje->id}"> Eliminar </a>
|
<a href="./marcar_mensaje.php?id={$mensaje->id}&amp;leido=0"> Marcar Como No Le&iacute;do</a>
|
<a href="./marcar_mensaje.php?id={$mensaje->id}&amp;leido=1"> Marcar Como Le&iacute;do</a>
|
<a href="./escribir_mensaje.php?usuario_a_responder={$mensaje->remitente}&amp;asunto='{$asunto_mensaje_link}'"> Responder</a>
<hr>
<br>	
<a href="./bandeja_entrada.php"> Bandeja de Entrada</a>
