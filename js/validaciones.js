
function soloNumeros(evt){
	evt = (evt) ? evt : event; //Validar la existencia del objeto event
	var charCode = (evt.charCode) ? evt.charCode : ((evt.keyCode) ? evt.keyCode : ((evt.which) ? evt.which : 0)); //Extraer el codigo del caracter de uno de los diferentes grupos de codigos
	var respuesta = true; //Predefinir como valido
	if(charCode>31&&(charCode<48||charCode>57)){
		respuesta = false;
	}
	return respuesta;
}
function serieComprobante(evt){
	evt = (evt) ? evt : event; //Validar la existencia del objeto event
	var charCode = (evt.charCode) ? evt.charCode : ((evt.keyCode) ? evt.keyCode : ((evt.which) ? evt.which : 0)); //Extraer el codigo del caracter de uno de los diferentes grupos de codigos
	var respuesta = true; //Predefinir como valido
	if(charCode>31&&(charCode<48||charCode>57) && charCode!=45){
		respuesta = false;
	}
	return respuesta;
}
function numeroTelefonico(evt){
        evt = (evt) ? evt : event; //Validar la existencia del objeto event
	var charCode = (evt.charCode) ? evt.charCode : ((evt.keyCode) ? evt.keyCode : ((evt.which) ? evt.which : 0)); 
	var respuesta = true; //Predefinir como valido
	if(charCode>31&&(charCode<48||charCode>57) &&(charCode!=42&&charCode!=35&&charCode!=32&&charCode!=40&&charCode!=41&&charCode!=45)){
		respuesta = false;
	}
	return respuesta;
}
function soloLetras(e) {
        key = e.keyCode || e.which;
        tecla = String.fromCharCode(key).toLowerCase();
        letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
        especiales = [8,9,37,39,46];
        tecla_especial = false
        for(var i in especiales){
            if(key == especiales[i]){
                tecla_especial = true;
                break;
            } 
        }
 
        if(letras.indexOf(tecla)==-1 && !tecla_especial)
        return false;
}
function dosDecimales(e, field){
  key = e.keyCode ? e.keyCode : e.which
  // backspace
  if (key == 8) return true
  // 0-9
  if (key > 47 && key < 58) {
    if (field.value == "") return true
    regexp = /.[0-9]{3}$/
    return !(regexp.test(field.value))
  }
  // .
  if (key == 46) {
    if (field.value == "") return false
    regexp = /^[0-9]+$/
    return regexp.test(field.value)
  }
  // other key
  return false
}
function eliminar(url){
    if(confirm("Esta seguro que desea eliminar este registro")){
        href = url;
        window.location = href;
    } 
}

function editar(url){
    window.location = url;
}

$(function() {
  $.fn.required = function() {
    if ( $(this).val() == '' || $(this).val() == 0 ) {
        $(this).css('border','solid 1px red');
        $('#msg').html('<label class="lbl_msg">Debes llenar todos los campos necesarios</label>');
        $(this).focus();
        return false;
    }else {
        $(this).css('border','solid 1px #ccc');
        $('#msg').html('');
        return true;
    }
  };
});

$(function() {
    $.fn.email = function() {
        var filter = /[\w-\.]{3,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;
        if ( $.trim( $(this).val())!='' && filter.test($(this).val()) ) {
            $(this).css('border','solid 1px #ccc');
            return true;
        }else {
            $(this).css('border','solid 2px red');
            return false;
        }
    };
});

//****************dias de las fechas
function getDias(fecha_final,fecha_inicio) {
    var diastotales;
    //fecha de inicio
    var fecha_incio = new Date(fecha_inicio);
    var anio_i = fecha_incio.getFullYear();
    var mes_i = fecha_incio.getMonth() + 1;
    var dia_i = fecha_incio.getDate();

//fecha final
    var fecha_final = new Date(fecha_final);
    var anio_f = fecha_final.getFullYear();
    var mes_f = fecha_final.getMonth() + 1;
    var dia_f = fecha_final.getDate() + 1;

    var dif_anio = 0;
    var findemes;

    dif_anio = anio_f - anio_i;//1
    if (dif_anio > 0) {
        findemes = 12;
    } else {
        findemes = mes_f;
    }
    var diasmes = 0;
    var fin = dif_anio;                                        //1-----> 1-02-2014
    for (var i = 0; i <= fin; i++) {//2
        if (dif_anio > 0) {//2>0;1>0;
            findemes = 12;//12;12
            dif_anio = dif_anio - 1;//1;0
            if (i > 0) {
                mes_i = 0;
            }
        } else {
            if (i > 0) {
                mes_i = 0;
            }
            findemes = mes_f;
        }
        for (var j = mes_i + 1; j <= findemes; j++) {//1 a 12
            diasmes += diasMes(j, i);
        }

        if (i < 2) {
            diasmes = diasmes - i; //-1;
        }
    }

    dia_i = diasMes(mes_i, anio_i) - dia_i;
    dia_f = diasMes(mes_f, anio_f) - dia_f;

    diastotales = diasmes + (dia_i - dia_f);

    return diastotales;
}

function diasMes(humanMonth, year) {
    return new Date(year || new Date().getFullYear(), humanMonth, 0).getDate();
}
//-----------------------------------------------------------
function calendario(date){
      var x=new Date();
      var fecha = date.split("/");
      x.setFullYear(fecha[2],fecha[1]-1,fecha[0]);
      var today = new Date();
 
      if (x >= today)
        return false;
      else
        return true;
}
function seleccionaFecha(dd, mm, aa)	{
	var fecha = new Date();
	fecha.setDate(dd);
	fecha.setMonth(mm - 1);
	fecha.setFullYear(aa);
	var hoy = fecha.getDay();
	var Semana = ["Dominago","Lunes","Martes","Miércoles","Jueves","Viernes","Sabado"];
	var mes = ",enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre".split(",");
	cadena = Semana[hoy] + " " + dd + " de " + mes[mm] + " de " + aa;
	if (hoy == 0)
		alert("Los Domingos no trabajamos...");
	else
		document.forms.salida.comentario.value = cadena;
}
function existeFecha(fecha){
	alert(fecha);
      var fechaf = fecha.split("/");
      alert(fechaf);
      var day = fechaf[0];
      var month = fechaf[1];
      var year = fechaf[2];
      var date = new Date(year,month,'0');
      if((day-0)>(date.getDate()-0)){
            return false;
      }
      return true;
}