<?php
//IMPRIME CÓDIGO HTML PARA MOSTRAR LA VENTANA DEL CALENDARIO (PARA SELECCIONAR UNA FECHA)
echo "
<!DOCTYPE html PUBLIC '-//W3C//DTD HTML 4.01 Transitional//EN' 'http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd'>
<html>
<head>
<title>Calendario</title></head>
<body style='font-family: Verdana' onload='thisMonth()'>
<script language='javascript' src='./scripts/funciones.js' type='text/javascript'></script>

<table border=1 bgcolor='#BAA0A0' align=center>
<tr>
<td>
<form action='#'>
    <!-- CAMPOS OCULTOS -->

    <input type=hidden name=month value=''>
    <input type=hidden name=year value=''>
    <input type=hidden name=currMonth value=''>
    <input type=hidden name=currYear value=''>


    <!-- FIN CAMPOS OCULTOS -->

    <p>
     <input type='button' name='prev' onclick='prevMonth()'
     value='<<'>
     <input type='text' size='15' name='monthYear'
     value=''>
     <input type='button' name='next' onclick='nextMonth()' value='>>'>
   </p>

    <table bgcolor='#D4D4D4' align=center border='1' cellpadding='0' cellspacing='0'
    width='150'>
        <tr bgcolor='#10A0A0'>

            <td width='14%'><font size='1'><strong>DOM</strong></font></td>
            <td width='14%'><font size='1'><strong>LUN</strong></font></td>
            <td width='14%'><font size='1'><strong>MAR</strong></font></td>
            <td width='14%'><font size='1'><strong>MI&Eacute;</strong></font></td>
            <td width='14%'><font size='1'><strong>JUE</strong></font></td>
            <td width='15%'><font size='1'><strong>VIE</strong></font></td>

            <td width='15%'><font size='1'><strong>S&Aacute;B</strong></font></td>
        </tr>
        <tr>
            <td align='center' width='14%'><input type='button'
            onclick='setDate(this.value);'
	    name='s1' value=' 1 '></td>
            <td align='center' width='14%'><input type='button'
            onclick='setDate(this.value);'
            name='s2' value=' 2 '></td>
            <td align='center' width='14%'><input type='button'
            onclick='setDate(this.value);'
            name='s3' value=' 3 '></td>
            <td align='center' width='14%'><input type='button'
            onclick='setDate(this.value);'
            name='s4' value=' 4 '></td>
            <td align='center' width='14%'><input type='button'
            onclick='setDate(this.value);'
            name='s5' value=' 5 '></td>

            <td align='center' width='15%'><input type='button'
            onclick='setDate(this.value);'
            name='s6' value=' 6 '></td>
            <td align='center' width='15%'><input type='button'
            onclick='setDate(this.value);'
            name='s7' value=' 7 '></td>
        </tr>
        <tr>
            <td align='center' width='14%'><input type='button'
            onclick='setDate(this.value);'
            name='s8' value=' 8 '></td>
            <td align='center' width='14%'><input type='button'
            onclick='setDate(this.value);'
            name='s9' value=' 9 '></td>
            <td align='center' width='14%'><input type='button'
            onclick='setDate(this.value);'
            name='s10' value='10'></td>
            <td align='center' width='14%'><input type='button'
            onclick='setDate(this.value);'
            name='s11' value='11'></td>
            <td align='center' width='14%'><input type='button'
            onclick='setDate(this.value);'
            name='s12' value='12'></td>

            <td align='center' width='15%'><input type='button'
            onclick='setDate(this.value);'
            name='s13' value='13'></td>
            <td align='center' width='15%'><input type='button'
            onclick='setDate(this.value);'
            name='s14' value='14'></td>
        </tr>
        <tr>
            <td align='center' width='14%'><input type='button'
            onclick='setDate(this.value);'
            name='s15' value='15'></td>
            <td align='center' width='14%'><input type='button'
            onclick='setDate(this.value);'
            name='s16' value='16'></td>
            <td align='center' width='14%'><input type='button'
            onclick='setDate(this.value);'
            name='s17' value='17'></td>
            <td align='center' width='14%'><input type='button'
            onclick='setDate(this.value);'
            name='s18' value='18'></td>
            <td align='center' width='14%'><input type='button'
            onclick='setDate(this.value);'
            name='s19' value='19'></td>

            <td align='center' width='15%'><input type='button'
            onclick='setDate(this.value);'
            name='s20' value='20'></td>
            <td align='center' width='15%'><input type='button'
            onclick='setDate(this.value);'
            name='s21' value='21'></td>
        </tr>
        <tr>
            <td align='center' width='14%'><input type='button'
            onclick='setDate(this.value);'
            name='s22' value='22'></td>
            <td align='center' width='14%'><input type='button'
            onclick='setDate(this.value);'
            name='s23' value='23'></td>
            <td align='center' width='14%'><input type='button'
            onclick='setDate(this.value);'
            name='s24' value='24'></td>
            <td align='center' width='14%'><input type='button'
            onclick='setDate(this.value);'
            name='s25' value='25'></td>
            <td align='center' width='14%'><input type='button'
            onclick='setDate(this.value);'
            name='s26' value='26'></td>

            <td align='center' width='15%'><input type='button'
            onclick='setDate(this.value);'
            name='s27' value='27'></td>
            <td align='center' width='15%'><input type='button'
            onclick='setDate(this.value);'
            name='s28' value='28'></td>
        </tr>
        <tr>
            <td align='center'><input type='button' name='s29'
            onclick='setDate(this.value);'
            value='29'></td>
            <td align='center'><input type='button' name='s30'
            onclick='setDate(this.value);'
            value='30'></td>
            <td align='center'><input type='button' name='s31'
            onclick='setDate(this.value);'
            value='   '></td>
            <td align='center'><input type='button' name='s32'
            onclick='setDate(this.value);'
            value='   '></td>
            <td align='center'><input type='button' name='s33'
            onclick='setDate(this.value);'
            value='   '></td>

            <td align='center'><input type='button' name='s34'
            onclick='setDate(this.value);'
            value='   '></td>
            <td align='center'><input type='button' name='s35'
            onclick='setDate(this.value);'
            value='   '></td>
        </tr>
        <tr>
            <td align='center'><input type='button' name='s36'
            onclick='setDate(this.value);'
            value='   '></td>
            <td align='center'><input type='button' name='s37'
            onclick='setDate(this.value);'
            value='   '></td>
            <td align='center'><input type='button' name='s38'
            onclick='setDate(this.value);'
            value='   '></td>
            <td align='center'><input type='button' name='s39'
            onclick='setDate(this.value);'
            value='   '></td>
            <td align='center'><input type='button' name='s40'
            onclick='setDate(this.value);'
            value='   '></td>

            <td align='center'><input type='button' name='s41'
            onclick='setDate(this.value);'
            value='   '></td>
            <td align='center'><input type='button' name='s42'
            onclick='setDate(this.value);'
            value='   '></td>
        </tr>
    </table>
</form>
 <form action='#'>
  <table border=0 cellspacing=1 cellpadding=1>
  <tr>
  <td>

  Seleccionado:
  </td>
  <td align=center>
  <input type=text size='12' name=dateField>
  </td>
  </table>
 </form>
</td>
</tr>
</table>
</body>

</html>"
?>
