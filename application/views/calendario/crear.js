// EVENTO 8
var animal = $("#animal").val();
var fecha_naci = $("#fecha_evento").val();
var estado_cria = $("#estcr").val();
var tipo_parto = $("#tippar").val();
var sexo_cria = $("#sexcr").val();
var servicio = $("#ser").val();

$.post(base+"index.php/parto/json_Nuevo",{rp:animal,fecha:fecha_naci,estado_cria:estado_cria,tipo_parto:tipo_parto,sexo_cria:sexo_cria,servicio:servicio},function(valor){
    var obj = JSON.parse(valor);
    var id_tabla = obj[0];
    var sim_id = num_evento;
    $.post(base+"index.php/eventos/json_Nuevo",{id_tabla:id_tabla,sim_id:sim_id,ani_id:animal,eve_fecha:fecha},function(){
        var id = String("#"+$("#fila").val()+""+$("#mes").val());
        $.post(base+"index.php/simbolo/json_BuscarID",{id:sim_id},function(simbolo){
            var sim = JSON.parse(simbolo);
            var res = fecha.split("-");
            boton = "<button type=\"button\" onclick=\"$('#editEvent').modal('show');\">";
            boton +="<img src=\""+base+"img/"+sim[0].sim_icono+"\"/>";
            boton +="<span class=\"badge\">"+res[2]+"</span>";
            boton +="</button><br>";
            $(id).append(boton);
        }); 
    });
});

//------------------------------------------------------------------------------------------------
// EVENTO 9
var animal = $("#animal").val();
var fecha = $("#fecha_evento").val();
var repro = $("#repro").val();
var per = $("#per").val();
var tipo_serv = $("#tipse").val();


$.post(base+"index.php/servicio/json_Nuevo",{animal:animal,fecha:fecha,reproductor:repro,personal:per,tipo_servicio:tipo_serv},function(valor){
    var obj = JSON.parse(valor);
    var id_tabla = obj[0];
    var sim_id = num_evento;
    $.post(base+"index.php/eventos/json_Nuevo",{id_tabla:id_tabla,sim_id:sim_id,ani_id:animal,eve_fecha:fecha},function(){
        var id = String("#"+$("#fila").val()+""+$("#mes").val());
        $.post(base+"index.php/simbolo/json_BuscarID",{id:sim_id},function(simbolo){
            var sim = JSON.parse(simbolo);
            var res = fecha.split("-");
            boton = "<button type=\"button\" onclick=\"$('#editEvent').modal('show');\">";
            boton +="<img src=\""+base+"img/"+sim[0].sim_icono+"\"/>";
            boton +="<span class=\"badge\">"+res[2]+"</span>";
            boton +="</button><br>";
            $(id).append(boton);
        }); 
    });
});

// EVENTO 10
var animal = $("#animal").val();
var fecha = $("#fecha_evento").val();
var diag_utero = $("#diaut").val();
var enfe_ovario = $("#enfov").val();
var via_aplicacion = $("#viaap").val();
var enfe_utero = $("#enfut").val();
var med_genital = $("#medget").val();



$.post(base+"index.php/tacto_rectal/json_Nuevo",{rp:animal,fecha:fecha,diag_utero:diag_utero,enfe_ovario:enfe_ovario,enfe_utero:enfe_utero,via_aplicacion:via_aplicacion,med_genital:med_genital},function(valor){
    var obj = JSON.parse(valor);
    var id_tabla = obj[0];
    var sim_id = num_evento;
    $.post(base+"index.php/eventos/json_Nuevo",{id_tabla:id_tabla,sim_id:sim_id,ani_id:animal,eve_fecha:fecha},function(){
        var id = String("#"+$("#fila").val()+""+$("#mes").val());
        $.post(base+"index.php/simbolo/json_BuscarID",{id:sim_id},function(simbolo){
            var sim = JSON.parse(simbolo);
            var res = fecha.split("-");
            boton = "<button type=\"button\" onclick=\"$('#editEvent').modal('show');\">";
            boton +="<img src=\""+base+"img/"+sim[0].sim_icono+"\"/>";
            boton +="<span class=\"badge\">"+res[2]+"</span>";
            boton +="</button><br>";
            $(id).append(boton);
        }); 
    });
});

// EVENTO 11
var animal = $("#animal").val();
var fecha = $("#fecha_evento").val();
var espe_venta = $("#espve").val();


$.post(base+"index.php/venta/json_Nuevo",{rp:animal,fecha:fecha,especif_venta:espe_venta},function(valor){
    var obj = JSON.parse(valor);
    var id_tabla = obj[0];
    var sim_id = num_evento;
    $.post(base+"index.php/eventos/json_Nuevo",{id_tabla:id_tabla,sim_id:sim_id,ani_id:animal,eve_fecha:fecha},function(){
        var id = String("#"+$("#fila").val()+""+$("#mes").val());
        $.post(base+"index.php/simbolo/json_BuscarID",{id:sim_id},function(simbolo){
            var sim = JSON.parse(simbolo);
            var res = fecha.split("-");
            boton = "<button type=\"button\" onclick=\"$('#editEvent').modal('show');\">";
            boton +="<img src=\""+base+"img/"+sim[0].sim_icono+"\"/>";
            boton +="<span class=\"badge\">"+res[2]+"</span>";
            boton +="</button><br>";
            $(id).append(boton);
        }); 
    });
});

// EVENTO 12
var animal = $("#animal").val();
var fecha = $("#fecha_evento").val();
var cuartos_mamarios = $("#cuama").val();


$.post(base+"index.php/secado/json_Nuevo",{rp:animal,fecha:fecha,cuarto_mamarios:cuartos_mamarios},function(valor){
    var obj = JSON.parse(valor);
    var id_tabla = obj[0];
    var sim_id = num_evento;
    $.post(base+"index.php/eventos/json_Nuevo",{id_tabla:id_tabla,sim_id:sim_id,ani_id:animal,eve_fecha:fecha},function(){
        var id = String("#"+$("#fila").val()+""+$("#mes").val());
        $.post(base+"index.php/simbolo/json_BuscarID",{id:sim_id},function(simbolo){
            var sim = JSON.parse(simbolo);
            var res = fecha.split("-");
            boton = "<button type=\"button\" onclick=\"$('#editEvent').modal('show');\">";
            boton +="<img src=\""+base+"img/"+sim[0].sim_icono+"\"/>";
            boton +="<span class=\"badge\">"+res[2]+"</span>";
            boton +="</button><br>";
            $(id).append(boton);
        }); 
    });
});

// EVENTO 13
var animal = $("#animal").val();
var fecha = $("#fecha_evento").val();
var causa_rechazo = $("#caure").val();

$.post(base+"index.php/secado/json_Nuevo",{rp:animal,fecha:fecha,causa_rechazo:causa_rechazo},function(valor){
    var obj = JSON.parse(valor);
    var id_tabla = obj[0];
    var sim_id = num_evento;
    $.post(base+"index.php/eventos/json_Nuevo",{id_tabla:id_tabla,sim_id:sim_id,ani_id:animal,eve_fecha:fecha},function(){
        var id = String("#"+$("#fila").val()+""+$("#mes").val());
        $.post(base+"index.php/simbolo/json_BuscarID",{id:sim_id},function(simbolo){
            var sim = JSON.parse(simbolo);
            var res = fecha.split("-");
            boton = "<button type=\"button\" onclick=\"$('#editEvent').modal('show');\">";
            boton +="<img src=\""+base+"img/"+sim[0].sim_icono+"\"/>";
            boton +="<span class=\"badge\">"+res[2]+"</span>";
            boton +="</button><br>";
            $(id).append(boton);
        }); 
    });
});