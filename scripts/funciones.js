
/////////////////////// FUNCIONES PARA EL CALENDARIO, USADO AL AGREGAR UN NUEVO EVENTO

var dateField;


function openCalendar(form,field) {
	
	window.open("./calendar.php?", "calendar", "width=290,height=230,status=yes");
	dateField  = eval("document.forms['" + form +"']"+ "." + field);
	//return(unaFecha);
}



function asignarpadre( obj , str)
{
	window.opener.asignartext(obj, str);
} 

function setDate(str,win) {

if (str == "   ") {
  return;
 }

 mnth1 = document.forms[0].month.value;
 mnth = mnth1;
 mnth++;
 year = document.forms[0].year.value;
// dateStr = mnth+"/"+str+"/"+year;
 dateStr = year+"-"+mnth+"-"+str;
 dateStr = trim(dateStr);
 window.opener.dateField.value = dateStr; 
 window.close();


}

function trim(str) {

 res="";

 for(var i=0; i< str.length; i++) {
   if (str.charAt(i) != " ") {
     res +=str.charAt(i);
  }
 }
   
 return res;

}
function getMonthName(mnth) {

 if (mnth == 0) {
  name = "Enero";
 }else if(mnth==1) {
  name = "Febrero";
 }else if(mnth==2) {
  name = "Marzo";
 }else if(mnth==3) {
  name = "Abril";
 }else if(mnth==4) {
  name = "Mayo";
 } else if(mnth==5) {
  name = "Junio";
 } else if(mnth==6) {
  name = "Julio";
 } else if(mnth==7) {
  name = "Agosto";
 } else if(mnth==8) {
  name = "Septiembre";
 } else if(mnth==9) {
  name = "Octubre";
 } else if(mnth==10) {
  name = "Noviembre";
 } else if(mnth==11) {
  name = "Diciembre";
 }

 return name;

}

function getNoOfDaysInMnth(mnth,yr) {
 
 rem = yr % 4;

 if(rem ==0) {
   leap = 1;
 } else {
  leap = 0;
 }

 noDays=0;

 if ( (mnth == 1) || (mnth == 3) || (mnth == 5) ||
      (mnth == 7) || (mnth == 8) || (mnth == 10) ||
      (mnth == 12)) {
  noDays=31;
 } else if (mnth == 2) {
           noDays=28+leap;
        } else {
           noDays=30;
 }

 //alert(noDays);
 return noDays;
 
      
}

function fillDates(dayOfWeek1,noOfDaysInmnth) {

 for(var i=1; i<43; i++) {
   str = "s"+i;
   document.forms[0].elements[str].value="   ";
 }


 startSlotIndx = dayOfWeek1;
 slotIndx = startSlotIndx;

 for(var i=1; i<(noOfDaysInmnth+1); i++) {
  slotName = "s"+slotIndx;

  val="";
  if (i<10) {
    val = " "+i+" ";
  } else {
    val = i;
  }

  document.forms[0].elements[slotName].value = val;
  slotIndx++;
 }
  
}//fillDates()
 



function thisMonth() {

  dt = new Date();
  mnth  = dt.getMonth(); /* 0-11*/
  dayOfMnth = dt.getDate(); /* 1-31*/
  dayOfWeek = dt.getDay(); /*0-6*/
  yr = dt.getFullYear(); /*4-digit year*/

  
  mnthName = getMonthName(mnth)+ " ";
  document.forms[0].month.value = mnth;
  document.forms[0].year.value = yr;
  document.forms[0].currMonth.value = mnth;
  document.forms[0].currYear.value = yr;
  
  document.forms[0].monthYear.value = mnthName+yr;
  document.forms[1].dateField.value = (mnth+1)+"/"+dayOfMnth+"/"+yr;

  startStr = (mnth+1)+"/1/"+yr;
  dt1 = new Date(startStr);
  dayOfWeek1 = dt1.getDay(); /*0-6*/

  noOfDaysInMnth = getNoOfDaysInMnth(mnth+1,yr);
  fillDates(dayOfWeek1+1,noOfDaysInMnth);
 

}//thisMonth()

/**
 * The function that will be used to display the calendar of the next month.
 */

function nextMonth() {

 var currMnth = document.forms[0].month.value;
 currYr = document.forms[0].year.value;

 if (currMnth == "11") {
    nextMnth = 0;
    nextYr = currYr;
    nextYr++;
 } else {
   nextMnth=currMnth;
   nextMnth++;
   nextYr = currYr;
 }

 mnthName = getMonthName(nextMnth);
 document.forms[0].month.value=nextMnth;
 document.forms[0].year.value=nextYr;
 document.forms[0].monthYear.value= mnthName+" "+nextYr;

 str = (nextMnth+1)+"/1/"+nextYr;
 dt = new Date(str);
 dayOfWeek = dt.getDay();

 noOfDays = getNoOfDaysInMnth(nextMnth+1,nextYr);

 fillDates(dayOfWeek+1,noOfDays);
 

}//nextMonth()

/**
 * The method to display the calendar of the previous month.
 */

function prevMonth() {

 var currMnth = document.forms[0].month.value;
 currYr = document.forms[0].year.value;

 if (currMnth == "0") {
    prevMnth = 11;
    prevYr = currYr;
    prevYr--;
 } else {
   prevMnth=currMnth;
   prevMnth--;
   prevYr = currYr;
 }

 str = (prevMnth+1)+"/1/"+prevYr;
 dt = new Date(str);
 dayOfWeek = dt.getDay();


// SE PROHIBE UN MES ANTERIOR AL ACTUAL AL AGREGAR 
 runningMonth = document.forms[0].currMonth.value;
 rMonth=runningMonth;
 rMonth++;
 runningYear = document.forms[0].currYear.value;
 rYear=runningYear;

 str = (rMonth)+"/1/"+rYear;
 dt1 = new Date(str);
 
 if (dt.valueOf() < dt1.valueOf()) {
   alert('No puede agregar un evento con fecha de comienzo anterior a este mes');
   return;
 }
// FIN PROHIBICION

 mnthName = getMonthName(prevMnth);
 document.forms[0].month.value=prevMnth;
 document.forms[0].year.value=prevYr;
 document.forms[0].monthYear.value= mnthName+" "+prevYr;

 noOfDays = getNoOfDaysInMnth(prevMnth+1,prevYr);
 fillDates(dayOfWeek+1,noOfDays);
 
}//prevMonth()

/////////////////////////////// FIN FUNCIONES DE CALENDARIO


function openCssWindow(form){ // FUNCION USADA PARA PREVISUALIZAR EL ESTILO ELEGIDO AL REGISTRARSE
var form = document.forms[form];
var css = form.CSS.value;
url = './preview_style.php?id_css=' + css;
window.open(url, 'Homepage', 'screenX=0,left=150,screenY=0,top=50,toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=yes,copyhistory=no,width=950,height=700')
}

/// FUINCIONES VARIAS PARA NAVEGAR EL SITIO
function goTo (page) {
	if (page != 'choose')
		document.location.href = page;
	return false;
}



//////////////////////////// FUNCION PARA DETECTAR SI BLOQ MAYUS ESTA ACTIVADO

var capslock = {
 init: function() {
 if (!document.getElementsByTagName) {
 return;
 }
 // Find all password fields in the page, and set a keypress event on them
 var inps = document.getElementsByTagName("input");
 for (var i=0, l=inps.length; i<l; i++) {
 if ( (inps[i].type == "password") ) {
 capslock.addEvent(inps[i], "keypress", capslock.keypress);
 }
 }
 },
 addEvent: function(obj,evt,fn) {
 if (document.addEventListener) {
 capslock.addEvent = function (obj,evt,fn) {
 obj.addEventListener(evt,fn,false);
 };
 capslock.addEvent(obj,evt,fn);
 } else if (document.attachEvent) {
 capslock.addEvent = function (obj,evt,fn) {
obj.attachEvent('on'+evt,fn);
 };
 capslock.addEvent(obj,evt,fn);
 } else {
 // no support for addEventListener *or* attachEvent, so quietly exit
 }
 },
 keypress: function(e) {
 var ev = e ? e : window.event;
 if (!ev) {
 return;
 }
 var targ = ev.target ? ev.target : ev.srcElement;
 // get key pressed
 var which = -1;
 if (ev.which) {
 which = ev.which;
 } else if (ev.keyCode) {
 which = ev.keyCode;
 }
 // get shift status
 var shift_status = false;
 if (ev.shiftKey) {
 shift_status = ev.shiftKey;
 } else if (ev.modifiers) {
 shift_status = !!(ev.modifiers & 4);
 }
 if (((which >= 65 && which <= 90) && !shift_status) ||
 ((which >= 97 && which <= 122) && shift_status)) {
 // uppercase, no shift key
 capslock.show_warning(targ);
 } else {
 capslock.hide_warning(targ);
 }
 },

 show_warning: function(targ) {
 if (!targ.warning) {
	 if (document.getElementById("bloq"))
		 targ.warning =  document.getElementById("bloq");
	 else
	 	targ.warning =  document.getElementById("bloq_login");
 	targ.warning.innerHTML="Cuidado, tiene las may&uacute;sculas activadas";
 }
 },
 hide_warning: function(targ) {
 if (targ.warning) {
   targ.warning.innerHTML="";
 	targ.warning = null;
 }
 }
};

(function(i) {var u =navigator.userAgent;var e=/*@cc_on!@*/false; var st =
setTimeout;if(/webkit/i.test(u)){st(function(){var dr=document.readyState;
if(dr=="loaded"||dr=="complete"){i()}else{st(arguments.callee,10);}},10);}
else if((/mozilla/i.test(u)&&!/(compati)/.test(u)) || (/opera/i.test(u))){
document.addEventListener("DOMContentLoaded",i,false); } else if(e){ (
function(){var t=document.createElement('doc:rdy');try{t.doScroll('left');
i();t=null;}catch(e){st(arguments.callee,0);}})();}else{window.onload=i;}})(capslock.init);/* */
