<!-- FORM USADO PARA CARGAR UN EVENTO-->
<form action="./post_evento.php?user_id={$user_id}" id="formulario_evento" method="POST" onsubmit="return validar_blancos('titulo|lugar|descripcion|fecha_comienzo|fecha_fin');">
	<div class="formulario" >
		<h4>Todos los datos son obligatorios</h4>
		<br>
		<br>
		
		<p>	<label for="titulo"> T&iacute;tulo Completo: </label>
			<input type="text" name="titulo" id="titulo" >
		</p>

		<p>	<label for="lugar">Lugar: </label>
			<input type="text" name="lugar" id="lugar">
		</p>		

	  <p> 
			<label for="descripcion" > Descripci&oacute;n:</label>
		    <textarea id="descripcion" name="descripcion" cols="30" rows="10" ></textarea>
	  </p>	
	  <p> 
			<label for="fecha_comienzo"> Fecha Comienzo(aaaa-mm-dd): </label>
			<input type="text" readonly="" name="fecha_comienzo" id="fecha_comienzo"/>
			<a href="javascript:openCalendar('formulario_evento','fecha_comienzo')"><img class="calendar" src="./images/b_calendar.png" alt="Calendario"></a>
	  </p>	
  	  <p> 
			<label for="fecha_fin"> Fecha Fin(aaaa-mm-dd): </label>
			<input type="text"  readonly="" name="fecha_fin" id="fecha_fin"/>
			<a href="javascript:openCalendar('formulario_evento','fecha_fin')"><img class="calendar" src="./images/b_calendar.png" alt="Calendario"></a>
	  </p>	
		<input type="submit" name="Submit" value="Publicar" id="Submit">
		<input type="reset" name="Reset" value="Restablecer" id="Reset">
	</div><!--formulario_novedad-->
</form>