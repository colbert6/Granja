<div class="row">
    <div class="col-xs-12">
                                    
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Data Table With Full Features</h3>                                    
            </div><!-- /.box-header -->
            <div class="box-body table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th class='text-center' rowspan="2">ID</th>
                            <th class='text-center' rowspan="2">RP</th>
                            <th class='text-center' rowspan="2">Nombre</th>
                            <th class='text-center' colspan="12">
                                <div style="float:left";>
                                    <a href="#" id='retroceder'><img  src="<?= base_url(); ?>img/retroceder.png"/></a>
                                </div>
                                <div class="text-center" style="font-size:17px;float:left;width: 820px";>
                                    <input id='anio' style="border:none;font-weight:bold" class="text-center" type='text' value='2015' readonly />
                                </div>
                                <div style="float:left";>
                                    <a href="#" id='avanzar'><img src="<?= base_url(); ?>img/adelantar.png"/></a>
                                </div>

                            </th>
                            
                        </tr>
                        <tr>
                            <th class='text-center'>Ene</th>
                            <th class='text-center'>Feb</th>
                            <th class='text-center' >Mar</th>
                            <th class='text-center' >Abr</th>
                            <th class='text-center' >May</th>
                            <th class='text-center' >Jun</th>
                            <th class='text-center' >Jul</th>
                            <th class='text-center' >Ago</th>
                            <th class='text-center' >Sep</th>
                            <th class='text-center' >Oct</th>
                            <th class='text-center' >Nov</th>
                            <th class='text-center' >Dic</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $i=0;

                     foreach (@$animales->result() as $datos) {  
                        $i++;
                        ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td>
                                <?= $datos->ani_rp; ?>
                                <input type="hidden" id='id_animal' value="<?= $datos->ani_nombre; ?>"/>
                            </td>
                            <td><?= $datos->ani_nombre; ?></td>
                            <?php for ($j=1; $j <=12 ; $j++) { ?>
                                <td class='text-center' >

                                <div class='bnt' id='<?php echo $i."".$j;?>'>
                                    <button type="button" class="btn-event" onclick="$('#editEvent').modal('show');">
                                         <img src="<?php echo base_url(); ?>img/home.png">
                                      <span class="badge">4</span>
                                    </button>
                                </div>
                                <div>
                                    <a href="#" onclick="mostrarModal(<?php echo $datos->ani_id; ?>,<?php echo $i; ?>,<?php echo $j;?>,'<?php echo base_url(); ?>');" >[+]</a>
                                </div>
								
								

                                </td>
                            <?php } 
                                
                            ?>
                            
                        </tr>
                    <?php }?>                        
                        
                        
                        
                       
                    </tbody>
                    
                </table>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div>
</div>

<style>
    #mdialTamanio{
      width: 25% !important;
    }
    .btn-event{
    	margin: 2px 0 2px 0;
    }
    .bnt{
        display: block;
    }
</style>

<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog" id="mdialTamanio">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header text-center">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <div id='cabezera'>
        	
        </div>
        
      </div>
        <input type="hidden" id='fila' />
        <input type="hidden" id='animal'/>
        <input type="hidden" id='mes' />
        <input type="hidden" id='url' />
      <div class="modal-body">

            <form method='post' id='form' name='form'>
                <label>Evento:</label>
                <select class="form-control" id="evento">
                    <option value="1">Aborto</option>
                    <option value="2">Analisis</option>
                    <option value="3">Celo</option>
                    <option value="4">Enfermedad</option>
                    <option value="5">Indicaciones Especiales</option>
                    <option value="6">Medicacion</option>
                    <option value="7">Muerte</option>
                    <option value="8">Parto</option>
                    <option value="9">Servicio</option>
                    <option value="10">Tacto Rectal</option>
                    <option value="11">Venta</option>
                    <option value="12">Secado</option>
                    <option value="13">Rechazo</option>
                  </select>
              
              
                <!--label>Fecha:</label>
                <div id='fecha'>

                </div-->    
                <div id='content-form'>
                	
                </div>
            </form>
      </div>
      <div class="modal-footer">
        <button type="button" onclick='crearEvento();' class="btn btn-success">Guardar</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
         
      </div>
    </div>

  </div>
</div>


<div id="editEvent" class="modal fade" role="dialog">
  <div class="modal-dialog" id="mdialTamanio">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header text-center">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Editar Evento</h4>
      </div>
    
      <div class="modal-body">


        
      </div>
      <div class="modal-footer">
        <button type="button" onclick='crearEvento();' class="btn btn-success" data-dismiss="modal">Guardar</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
         
      </div>
    </div>

  </div>
</div>

<script type="text/javascript">
	var fecha_min = "";
	var fecha_max = "";
    var base = "";

    function daysInMonth(humanMonth, year) {
      return new Date(year || new Date().getFullYear(), humanMonth, 0).getDate();
    }
    function mostrarModal(id_animal,fila,mes,url){
    	var meses = ["Enero", "Febrero", "Marzo","Abril","Mayo","Junio","Julio","Agosto","Setiembre","Octubre","Noviembre","Diciembre"];
        $("#animal").val(id_animal);
        $("#fila").val(fila);
        $("#mes").val(mes);
        $("#url").val(url);

        var anio = $("#anio").val();
        var dias = daysInMonth(mes,anio);
        var cabezera = "<h4 class='modal-title'><strong><u>AGREGAR EVENTO</u></strong></h4>";
        	cabezera += "<span class='text-center'>Mes: <strong>"+meses[mes-1]+"</strong></span>";
        $("#cabezera").html(cabezera);
        if(mes<10){
            mex = "0"+mes;
        }else{
            mex = mes;
        }
        fecha_min = anio+"-"+mex+"-01";
        fecha_max = anio+"-"+mex+"-"+dias;
        base = url; 
        mostrarFormulario('1');           
    }
    function mostrarFormulario(evento){
    	var formulario = "";
    	switch(evento){
    		case '1':
    			
		        //Extraer las Causas de Aborto
		        $.post(base+"index.php/causa_aborto/json_ExtraerTodo/",function(causa_a){
                    
                    var obj = JSON.parse(causa_a);
                    
                    
                    formulario    += "<label>Causa Aborto:</label>";
                    formulario    += "<select class='form-control' id='causa_aborto'>";
                    for (var i = 0; i < obj.length; i++) {
                        formulario    += "<option value='"+obj[i].ca_id+"'>"+obj[i].ca_descripcion+"</option>";
                    }
                    
                    formulario    += "</select>";
                    formulario    += "<label>Fecha:</label>";
                    formulario    += "<input type='date'class='form-control' name='fecha_evento' id='fecha_evento' step='1' min='"+fecha_min+"' max='"+fecha_max+"' />";
                    $("#content-form").html(formulario); 
                    $("#id_evento").val('1');
                    $("#myModal").modal("show");
                });
		              
    			break;
    		case '2':

		        //Extraer los Tipos de Analisis
                $.post(base+"index.php/tipo_analisis/json_ExtraerTodo",function(tipo_analisis){
                    //Extraer los Resultado  de Analisis
                    $.post(base+"index.php/resultado_analisis/json_ExtraerTodo",function(resultado_analisis){
                        var tipan = JSON.parse(tipo_analisis);
                        var resana = JSON.parse(resultado_analisis);
                        formulario    += "<label>Tipo Analisis:</label>";
                        formulario    += "<select class='form-control' id='id_tipan'>";
                        
                        for (var i = 0; i < tipan.length; i++) {
                            formulario    += "<option value='"+tipan[i].tipan_id+"'>"+tipan[i].tipan_descripcion+"</option>";
                        }
                        
                        formulario    += "</select>";
                        formulario    += "<label>Resultado Analisis:</label>";
                        formulario    += "<select class='form-control' id='id_resan'>";
                        for (var i = 0; i < resana.length; i++) {
                            formulario    += "<option value='"+resana[i].resan_id+"'>"+resana[i].resan_descripcion+"</option>";
                        }
                        
                        formulario    += "</select>";
                        formulario    += "<label>Fecha:</label>";
                        formulario    += "<input type='date'class='form-control' name='fecha_evento' step='1' min='"+fecha_min+"' max='"+fecha_max+"' />";
                        $("#content-form").html(formulario); 
                        $("#myModal").modal("show");  

                    });
                    
                });
		        
    			break;
    		case '3':
                
                $.post(base+"index.php/causa_no_inseminal/json_ExtraerTodo",function(causa_no_inseminal){
                    $.post(base+"index.php/medicina_genital/json_ExtraerTodo",function(medicina_genital){
                       $.post(base+"index.php/via_aplicacion/json_ExtraerTodo",function(via_aplicacion){

                            var cni = JSON.parse(causa_no_inseminal);
                            var medge = JSON.parse(medicina_genital);
                            var viaap = JSON.parse(via_aplicacion);

                            formulario    += "<label>Causa no Inseminal:</label>";
                            formulario    += "<select class='form-control' id='id_cni'>";
                            for (var i = 0; i < cni.length; i++) {
                                    formulario    += "<option value='"+cni[i].cni_id+"'>"+cni[i].cni_descripcion+"</option>";
                            }
                            formulario    += "</select>";
                            formulario    += "<label>Medicina Genital:</label>";
                            formulario    += "<select class='form-control' id='id_medget'>";
                            for (var i = 0; i < medge.length; i++) {
                                    formulario    += "<option value='"+medge[i].medge_id+"'>"+medge[i].medge_descripcion+"</option>";
                            }
                            formulario    += "</select>";
                            formulario    += "<label>Via Aplicacion:</label>";
                            formulario    += "<select class='form-control' id='id_viaap'>";
                            for (var i = 0; i < viaap.length; i++) {
                                    formulario    += "<option value='"+viaap[i].viaap_id+"'>"+viaap[i].viaap_descripcion+"</option>";
                            }
                            formulario    += "</select>";
                            formulario    += "<label>Fecha:</label>";
                            formulario    += "<input type='date'class='form-control' name='fecha_evento' step='1' min='"+fecha_min+"' max='"+fecha_max+"' />";

                            $("#content-form").html(formulario); 
                            $("#myModal").modal("show");  


                        });
                        
                    });
                    
                });
    			
    			break;
    		case '4':
                $.post(base+"index.php/tipo_enfermedad/json_ExtraerTodo",function(tipo_enfermedad){
                    $.post(base+"index.php/via_aplicacion/json_ExtraerTodo",function(via_aplicacion){
                        $.post(base+"index.php/medicamentos/json_ExtraerTodo",function(medicamentos){

                            var tipen = JSON.parse(tipo_enfermedad);
                            var viaap = JSON.parse(via_aplicacion);
                            var medi = JSON.parse(medicamentos);
                            formulario    += "<label>Tipo de Enfermedad:</label>";
                            formulario    += "<select class='form-control' id='id_tipen'>";
                            for (var i = 0; i < tipen.length; i++) {
                                formulario    += "<option value='"+tipen[i].tipen_id+"'>"+tipen[i].tipen_descripcion+"</option>";
                            }
                            formulario    += "</select>";
                            formulario    += "<label>Medicamento:</label>";
                            formulario    += "<select class='form-control' id='id_medi'>";
                            for (var i = 0; i < medi.length; i++) {
                                formulario    += "<option value='"+medi[i].medi_id+"'>"+medi[i].medi_descripcion+"</option>";
                            }
                            formulario    += "</select>";
                            formulario    += "<label>Via Aplicacion:</label>";
                            formulario    += "<select class='form-control' id='id_viaap'>";
                            for (var i = 0; i < viaap.length; i++) {
                                formulario    += "<option value='"+viaap[i].viaap_id+"'>"+viaap[i].viaap_descripcion+"</option>";
                            }
                            formulario    += "</select>";
                            formulario    += "<label>Fecha:</label>";
                            formulario    += "<input type='date'class='form-control' name='fecha_evento' step='1' min='"+fecha_min+"' max='"+fecha_max+"' />";

                            $("#content-form").html(formulario); 
                            $("#myModal").modal("show");
                        });
                    });
                    
                });
    			
    			break;
    		case '5':
    			formulario 	  += "<label>Indicaciones Especiales:</label>";
		        formulario    += "<select class='form-control' id='id_indesp'>";
		        //Extraer las Causas de Aborto
		        //$.post("",{suggest: txt},function(data){});
		        formulario    += "<option value='1'>1</option>";
		        formulario    += "</select>";
		        formulario    += "<label>Fecha:</label>";
		        formulario    += "<input type='date'class='form-control' name='fecha_evento' step='1' min='"+fecha_min+"' max='"+fecha_max+"' />";
		        
				$("#content-form").html(formulario); 
				$("#myModal").modal("show"); 
    			break;
    		case '6':
    			formulario 	  += "<label>Medicamentos:</label>";
    			formulario    += "<select class='form-control' id='id_medi'>";
		        //Extraer los Tipos de Analisis
		        //$.post("",{suggest: txt},function(data){});
		        formulario    += "<option value='1'>1</option>";
		        formulario    += "</select>";
		        formulario 	  += "<label>Via Aplicacion:</label>";
		        formulario    += "<select class='form-control' id='id_viaap'>";
		        //Extraer los Tipos de Analisis
		        //$.post("",{suggest: txt},function(data){});
		        formulario    += "<option value='1'>1</option>";
		        formulario    += "</select>";
		        formulario    += "<label>Fecha:</label>";
		        formulario    += "<input type='date'class='form-control' name='fecha_evento' step='1' min='"+fecha_min+"' max='"+fecha_max+"' />";

    			$("#content-form").html(formulario); 
				$("#myModal").modal("show"); 
    			break;
    		case '7':
    			formulario 	  += "<label>Especificacion Muerte:</label>";
		        formulario    += "<select class='form-control' id='id_espmuert'>";
		        //Extraer las Causas de Aborto
		        //$.post("",{suggest: txt},function(data){});
		        formulario    += "<option value='1'>1</option>";
		        formulario    += "</select>";
		        formulario    += "<label>Fecha:</label>";
		        formulario    += "<input type='date'class='form-control' name='fecha_evento' step='1' min='"+fecha_min+"' max='"+fecha_max+"' />";
		        
				$("#content-form").html(formulario); 
				$("#myModal").modal("show"); 
    			break;
    		case '8':
    			formulario 	  += "<label>RP:</label>";
    			formulario 	  += "<input type='text' class='form-control'/>";
    			formulario 	  += "<label>Tipo Parto:</label>";
		        formulario    += "<select class='form-control' id='id_tipa'>";
		        //Extraer las Causas de Aborto
		        //$.post("",{suggest: txt},function(data){});
		        formulario    += "<option value='1'>1</option>";
		        formulario    += "</select>";
		        formulario 	  += "<label>Sexo Cria:</label>";
		        formulario    += "<select class='form-control' id='id_sexcri'>";
		        //Extraer las Causas de Aborto
		        //$.post("",{suggest: txt},function(data){});
		        formulario    += "<option value='1'>1</option>";
		        formulario    += "</select>";
		        formulario 	  += "<label>Estado Cria:</label>";
		        formulario    += "<select class='form-control' id='id_escri'>";
		        //Extraer las Causas de Aborto
		        //$.post("",{suggest: txt},function(data){});
		        formulario    += "<option value='1'>1</option>";
		        formulario    += "</select>";
		        formulario 	  += "<label>Servicio:</label>";
		        formulario    += "<select class='form-control' id='id_servi'>";
		        //Extraer las Causas de Aborto
		        //$.post("",{suggest: txt},function(data){});
		        formulario    += "<option value='1'>1</option>";
		        formulario    += "</select>";
		        formulario    += "<label>Fecha Nacimiento:</label>";
		        formulario    += "<input type='date'class='form-control' name='fecha_evento' step='1'  />";
		        
				$("#content-form").html(formulario); 
				$("#myModal").modal("show"); 
    			break;
    		case '9':
    			formulario 	  += "<label>Tipo Servicio:</label>";
		        formulario    += "<select class='form-control' id='id_tiser'>";
		        //Extraer las Causas de Aborto
		        //$.post("",{suggest: txt},function(data){});
		        formulario    += "<option value='1'>1</option>";
		        formulario    += "</select>";
		        formulario 	  += "<label>Reproductor:</label>";
		        formulario    += "<select class='form-control' id='id_rep'>";
		        //Extraer las Causas de Aborto
		        //$.post("",{suggest: txt},function(data){});
		        formulario    += "<option value='1'>1</option>";
		        formulario    += "</select>";
		        formulario 	  += "<label>Personal:</label>";
		        formulario    += "<select class='form-control' id='id_pers'>";
		        //Extraer las Causas de Aborto
		        //$.post("",{suggest: txt},function(data){});
		        formulario    += "<option value='1'>1</option>";
		        formulario    += "</select>";
		        formulario    += "<label>Fecha:</label>";
		        formulario    += "<input type='date'class='form-control' name='fecha_evento' step='1' min='"+fecha_min+"' max='"+fecha_max+"' />";
		        
				$("#content-form").html(formulario); 
				$("#myModal").modal("show"); 
    			break;
    		case '10':
    			formulario 	  += "<label>RP:</label>";
    			formulario 	  += "<input type='text' class='form-control'/>";
    			formulario 	  += "<label>Diagnostico de Utero:</label>";
		        formulario    += "<select class='form-control' id='id_diaguter'>";
		        //Extraer las Causas de Aborto
		        //$.post("",{suggest: txt},function(data){});
		        formulario    += "<option value='1'>1</option>";
		        formulario    += "</select>";
		        formulario 	  += "<label>Enfermedad de Ovario:</label>";
		        formulario    += "<select class='form-control' id='id_enfova'>";
		        //Extraer las Causas de Aborto
		        //$.post("",{suggest: txt},function(data){});
		        formulario    += "<option value='1'>1</option>";
		        formulario    += "</select>";
		        formulario 	  += "<label>Via Aplicacion:</label>";
		        formulario    += "<select class='form-control' id='id_viaap'>";
		        //Extraer las Causas de Aborto
		        //$.post("",{suggest: txt},function(data){});
		        formulario    += "<option value='1'>1</option>";
		        formulario    += "</select>";
		        formulario 	  += "<label>Enfermedad de Utero:</label>";
		        formulario    += "<select class='form-control' id='id_enfuter'>";
		        //Extraer las Causas de Aborto
		        //$.post("",{suggest: txt},function(data){});
		        formulario    += "<option value='1'>1</option>";
		        formulario    += "</select>";
		        formulario 	  += "<label>Medicina Genital:</label>";
		        formulario    += "<select class='form-control' id='id_enfuter'>";
		        //Extraer las Causas de Aborto
		        //$.post("",{suggest: txt},function(data){});
		        formulario    += "<option value='1'>1</option>";
		        formulario    += "</select>";
		        formulario    += "<label>Fecha:</label>";
		        formulario    += "<input type='date'class='form-control' name='fecha_evento' step='1' min='"+fecha_min+"' max='"+fecha_max+"' />";
		        
				$("#content-form").html(formulario); 
				$("#myModal").modal("show"); 
    			break;
    		case '11':
    			formulario 	  += "<label>RP:</label>";
    			formulario 	  += "<input type='text' class='form-control'/>";
    			formulario 	  += "<label>Especificacion Venta:</label>";
		        formulario    += "<select class='form-control' id='id_espvent'>";
		        //Extraer las Causas de Aborto
		        //$.post("",{suggest: txt},function(data){});
		        formulario    += "<option value='1'>1</option>";
		        formulario    += "</select>";

		       
		        formulario    += "<label>Fecha:</label>";
		        formulario    += "<input type='date'class='form-control' name='fecha_evento' step='1' min='"+fecha_min+"' max='"+fecha_max+"' />";
		        
				$("#content-form").html(formulario); 
				$("#myModal").modal("show"); 
    			break;
    		case '12':
    			formulario 	  += "<label>RP:</label>";
    			formulario 	  += "<input type='text' class='form-control'/>";
    			formulario 	  += "<label>Cuartos Mamarios:</label>";
		        formulario    += "<select class='form-control' id='id_espvent'>";
		        //Extraer las Causas de Aborto
		        //$.post("",{suggest: txt},function(data){});
		        formulario    += "<option value='1'>1</option>";
		        formulario    += "</select>";
		       
		        formulario    += "<label>Fecha:</label>";
		        formulario    += "<input type='date'class='form-control' name='fecha_evento' step='1' min='"+fecha_min+"' max='"+fecha_max+"' />";
		        
				$("#content-form").html(formulario); 
				$("#myModal").modal("show"); 
    			break;
    		case '13':
    			formulario 	  += "<label>RP:</label>";
    			formulario 	  += "<input type='text' class='form-control'/>";
    			formulario 	  += "<label>Causa Rechazo:</label>";
		        formulario    += "<select class='form-control' id='id_espvent'>";
		        //Extraer las Causas de Aborto
		        //$.post("",{suggest: txt},function(data){});
		        formulario    += "<option value='1'>1</option>";
		        formulario    += "</select>";
		       
		        formulario    += "<label>Fecha:</label>";
		        formulario    += "<input type='date'class='form-control' name='fecha_evento' step='1' min='"+fecha_min+"' max='"+fecha_max+"' />";
		        
				$("#content-form").html(formulario); 
				$("#myModal").modal("show"); 
    			break;
    	}
    	
    }
    function crearEvento() {
        //var guardar = validar_formulario();
        //console.log(guardar);
        num_evento = $("#evento").val();
        alert("enter");
        //if(guardar){
        switch(num_evento){

                case '1':
                    var animal = $("#animal").val();
                    var cuabor = $("#causa_aborto").val();
                    var fecha = $("#fecha_evento").val();
                    $.post(base+"index.php/aborto/json_Nuevo",{animal:animal,cauabor:cuabor,fecha:fecha},function(){
                        alert("Se guardo Correctamente");
                        var id = String("#"+$("#fila").val()+""+$("#mes").val());
                        var boton = "<br><button type=\"button\" class=\"btn-event\" onclick=\"$('#editEvent').modal('show');\">";
                        boton+="<img src=\""+base+"img/home.png\"/>";
                        boton+="<span class=\"badge\">4</span>";
                        boton+="</button>";
                        $(id).append(boton);
                    });
                    break;
                case '2':
                    break;
                case '3':
                    break;
                case '4':
                    break;
                case '5':
                    break;
                case '6':
                    break;
                case '7':
                    break;
                case '8':
                    break;
                case '9':
                    break;
                case '10':
                    break;
                case '11':
                    break;
                case '12':
                    break;
                case '13':
                    break;
            }    
            $("#myModal").modal("hide");
        //}
        //document.getElementById($("#fila").val()+","+$("#mes").val()).innerHTML = "<img src='"+$("#url").val()+"img/calendar.png'>";
    }
    function validar_formulario(){
        /*frm=document.forms.form;
        cant_elementos = frm.elements.length;
        for (var i = 0; i < cant_elementos; i++) {
            var elemento = frm.elements[i];
            if(elemento.type=="text"){
                valor = elemento.value;
                if( valor == null || valor.length == 0 || /^\s+$/.test(valor) ) {
                    elemento.style.border = ""
                }
            }else if(elemento.type=="select-one"){
                indice = elemento.selectedIndex;
                if( indice == null || indice == 0 ) {
                    alert(indice);
                }
            }else if(elemento.type=="date"){
                //alert(elemento.value);
            } 
        }*/
        return true;
    }
</script>
