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
                                <td class='text-center' id='<?php echo $i.",".$j;?>'>

                           
								<button type="button" class="btn-event" onclick="$('#editEvent').modal('show');">
									 <img src="<?php echo base_url(); ?>img/home.png">
								  <span class="badge">4</span>
								</button>
								<button type="button" class="btn-event">
									 <img src="<?php echo base_url(); ?>img/envelope.png">
								  <span class="badge">4</span>
								</button>
								<a href="#" onclick="mostrarModal(<?php echo $datos->ani_id; ?>,<?php echo $i; ?>,<?php echo $j;?>,'<?php echo base_url(); ?>');" >[+]</a>

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
</style>

<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog" id="mdialTamanio">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header text-center">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">EVENTO</h4>
      </div>
        <input type="hidden" id='fila' />
        <input type="hidden" id='animal'/>
        <input type="hidden" id='mes' />
        <input type="hidden" id='url' />
      <div class="modal-body">

        
                <label>Evento:</label>
                <select class="form-control" id="id_evento">
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


        
      </div>
      <div class="modal-footer">
        <button type="button" onclick='crearEvento();' class="btn btn-success" data-dismiss="modal">Guardar</button>
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

    function daysInMonth(humanMonth, year) {
      return new Date(year || new Date().getFullYear(), humanMonth, 0).getDate();
    }
    function mostrarModal(id_animal,fila,mes,url){

        $("#animal").val(id_animal);
        $("#fila").val(fila);
        $("#mes").val(mes);
        $("#url").val(url);

        var anio = $("#anio").val();
        var dias = daysInMonth(mes,anio);

        if(mes<10){
            mex = "0"+mes;
        }else{
            mex = mes;
        }
        fecha_min = anio+"-"+mex+"-01";
        fecha_max = anio+"-"+mex+"-"+dias;

        mostrarFormulario('1');           
    }
    function mostrarFormulario(evento){
    	var formulario = "";
    	switch(evento){
    		case '1':
    			formulario 	  += "<label>Causa Aborto:</label>";
		        formulario    += "<select class='form-control' id='id_causa_aborto'>";
		        //Extraer las Causas de Aborto
		        //$.post("",{suggest: txt},function(data){});
		        formulario    += "<option value='1'>1</option>";
		        formulario    += "</select>";
		        formulario    += "<label>Fecha:</label>";
		        formulario    += "<input type='date'class='form-control' name='fecha_evento' step='1' min='"+fecha_min+"' max='"+fecha_max+"' />";
		        
				$("#content-form").html(formulario); 
				$("#id_evento").val('1');
				$("#myModal").modal("show");       
    			break;
    		case '2':
    			formulario 	  += "<label>Tipo Analisis:</label>";
    			formulario    += "<select class='form-control' id='id_tipan'>";
		        //Extraer los Tipos de Analisis
		        //$.post("",{suggest: txt},function(data){});
		        formulario    += "<option value='1'>1</option>";
		        formulario    += "</select>";
		        formulario 	  += "<label>Resultado Analisis:</label>";
		        formulario    += "<select class='form-control' id='id_resan'>";
		        //Extraer los Tipos de Analisis
		        //$.post("",{suggest: txt},function(data){});
		        formulario    += "<option value='1'>1</option>";
		        formulario    += "</select>";
		        formulario    += "<label>Fecha:</label>";
		        formulario    += "<input type='date'class='form-control' name='fecha_evento' step='1' min='"+fecha_min+"' max='"+fecha_max+"' />";

    			$("#content-form").html(formulario); 
				$("#myModal").modal("show");  
    			break;
    		case '3':
    			formulario 	  += "<label>Causa no Inseminal:</label>";
    			formulario    += "<select class='form-control' id='id_cni'>";
		        //Extraer los Tipos de Analisis
		        //$.post("",{suggest: txt},function(data){});
		        formulario    += "<option value='1'>1</option>";
		        formulario    += "</select>";
		        formulario 	  += "<label>Medicina Genital:</label>";
		        formulario    += "<select class='form-control' id='id_medget'>";
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
    		case '4':
    			formulario 	  += "<label>Tipo de Enfermedad:</label>";
    			formulario    += "<select class='form-control' id='id_tipen'>";
		        //Extraer los Tipos de Analisis
		        //$.post("",{suggest: txt},function(data){});
		        formulario    += "<option value='1'>1</option>";
		        formulario    += "</select>";
		        formulario 	  += "<label>Medicamento:</label>";
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
    	
    }
    function crearEvento() {
        document.getElementById($("#fila").val()+","+$("#mes").val()).innerHTML = "<img src='"+$("#url").val()+"img/calendar.png'>";
    }
</script>
