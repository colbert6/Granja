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

                                <div id='<?php echo $i."".$j;?>'>
                                <?php
                                    foreach (@$eventos->result() as $evento) {
                                        if($evento->ani_id == $datos->ani_id){
                                            $fecha = strtotime($evento->eve_fecha);
                                            if(date("m", $fecha)==$j && date("Y", $fecha)==date("Y")){
                                                foreach (@$simbolos->result() as $simbolo) {
                                                    if($simbolo->sim_id == $evento->sim_id){

                                                    
                                ?>                                  
                                    <button type="button"  onclick="editarEvento('<?php echo $evento->eve_id; ?>','<?= base_url(); ?>',this);">
                                         <img src="<?php echo base_url(); ?>img/<?php echo $simbolo->sim_icono; ?>">
                                      <span class="badge"><?php echo date("d", $fecha)?></span>
                                    </button><br>
                                <?php 
                                                   }
                                                }          
                                            }
                                        } 
                                    }
                                ?>
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
        <input type="hidden" id='id_evento' />
        <input type="hidden" id='id_tabla' />
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
      <div class="modal-footer" id='pie'>
         
      </div>
    </div>

  </div>
</div>



<script type="text/javascript">
	var fecha_min = "";
	var fecha_max = "";
    var base = "";
    var meses = ["Enero", "Febrero", "Marzo","Abril","Mayo","Junio","Julio","Agosto","Setiembre","Octubre","Noviembre","Diciembre"];
    function daysInMonth(humanMonth, year) {
      return new Date(year || new Date().getFullYear(), humanMonth, 0).getDate();
    }

    function mostrarModal(id_animal,fila,mes,url){
    	
        $("#animal").val(id_animal);
        $("#fila").val(fila);
        $("#mes").val(mes);
        $("#url").val(url);
        
        cabecera_formulario(mes,url,1);
        mostrarFormulario('1','',1);           
    }
    function pie_formulario(est){
        var funcion = "";
        var text = "";
        if(est==1){
            funcion="crearEvento('"+est+"')";
            text='Guardar';
        }else{
            funcion="crearEvento('"+est+"')";
            text='Modificar';
        }
        var pie = "<button type='button' onclick=\""+funcion+"\" class='btn btn-success' data-dismiss='modal'>"+text+"</button>";
         pie += "<button type='button' class='btn btn-default' data-dismiss='modal'>Cerrar</button>";
        $("#pie").html(pie);

    }
    function cabecera_formulario(mes,url,est){
        var anio = $("#anio").val();
        var dias = daysInMonth(mes,anio);
        base = url;
        if(est==1){
            if(mes<10){
                mex = "0"+mes;
            }else{
                mex = mes;
            }  
        }else{
            mex=mes;
        }
        
        fecha_min = anio+"-"+mex+"-01";
        fecha_max = anio+"-"+mex+"-"+dias;
        var cabezera = "<h4 class='modal-title'><strong><u>AGREGAR EVENTO</u></strong></h4>";
            cabezera += "<span class='text-center'>Mes: <strong>"+meses[mes-1]+"</strong></span>";
        $("#cabezera").html(cabezera);
    }
    function mostrarFormulario(evento,data,est){
        if(est!=1){
            $("#evento").attr("disabled","true");
        }else{
            $("#evento").removeAttr("disabled");
        }
    	var formulario = "";
    	switch(evento){
    		case '1':
    			
		        $.post(base+"index.php/causa_aborto/json_ExtraerTodo/",function(causa_a){
                    var obj = JSON.parse(causa_a);
                    //console.log(obj);
                    formulario    += "<label>Causa Aborto:</label>";
                    formulario    += "<select class='form-control' id='causa_aborto'>";
                    var seleccion = "";
                    for (var i = 0; i < obj.length; i++) {
                        if(est!=1){
                            if(data[0].ab_causa_aborto == obj[i].ca_id){
                                seleccion = "selected";
                            }
                        }
                        formulario    += "<option "+seleccion+" value='"+obj[i].ca_id+"'>"+obj[i].ca_descripcion+"</option>";
                    }
                    
                    
                    var ant = "";
                    if(est!=1){
                        thedate = data[0].ab_fecha_evento.split(" ");
                        console.log(thedate[0]);
                        ant = "value='"+thedate[0]+"'";
                    }
                    formulario    += "</select>";
                    formulario    += "<label>Fecha:</label>";
                    formulario    += "<input "+ant+" type='date'class='form-control' name='fecha_evento' id='fecha_evento' step='1' min='"+fecha_min+"' max='"+fecha_max+"' />";
                    $("#content-form").html(formulario); 
                    $("#evento").val('1');
                    pie_formulario(est);
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
                        formulario    += "<select class='form-control' id='tipan'>";
                        
                        for (var i = 0; i < tipan.length; i++) {
                            formulario    += "<option value='"+tipan[i].tipan_id+"'>"+tipan[i].tipan_descripcion+"</option>";
                        }
                        
                        formulario    += "</select>";
                        formulario    += "<label>Resultado Analisis:</label>";
                        formulario    += "<select class='form-control' id='resan'>";
                        for (var i = 0; i < resana.length; i++) {
                            formulario    += "<option value='"+resana[i].resan_id+"'>"+resana[i].resan_descripcion+"</option>";
                        }
                        
                        formulario    += "</select>";
                        formulario    += "<label>Fecha:</label>";
                        formulario    += "<input type='date'class='form-control' name='fecha_evento' id='fecha_evento' step='1' min='"+fecha_min+"' max='"+fecha_max+"' />";
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
                            formulario    += "<select class='form-control' id='cni'>";
                            for (var i = 0; i < cni.length; i++) {
                                    formulario    += "<option value='"+cni[i].cni_id+"'>"+cni[i].cni_descripcion+"</option>";
                            }
                            formulario    += "</select>";
                            formulario    += "<label>Medicina Genital:</label>";
                            formulario    += "<select class='form-control' id='medget'>";
                            for (var i = 0; i < medge.length; i++) {
                                    formulario    += "<option value='"+medge[i].medge_id+"'>"+medge[i].medge_descripcion+"</option>";
                            }
                            formulario    += "</select>";
                            formulario    += "<label>Via Aplicacion:</label>";
                            formulario    += "<select class='form-control' id='viaap'>";
                            for (var i = 0; i < viaap.length; i++) {
                                    formulario    += "<option value='"+viaap[i].viaap_id+"'>"+viaap[i].viaap_descripcion+"</option>";
                            }
                            formulario    += "</select>";
                            formulario    += "<label>Fecha:</label>";
                            formulario    += "<input type='date'class='form-control' name='fecha_evento' id='fecha_evento' step='1' min='"+fecha_min+"' max='"+fecha_max+"' />";

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
                            formulario    += "<input type='date'class='form-control' id='fecha_evento' name='fecha_evento' step='1' min='"+fecha_min+"' max='"+fecha_max+"' />";

                            $("#content-form").html(formulario); 
                            $("#myModal").modal("show");
                        });
                    });
                    
                });
    			
    			break;
    		case '5':
    			
	            $.post(base+"index.php/indicacion_especial/json_ExtraerTodo",function(indicaciones_especiales){
                    var indesp = JSON.parse(indicaciones_especiales);
                    formulario    += "<label>Indicaciones Especiales:</label>";
                    formulario    += "<select class='form-control' id='indesp'>";
                    for (var i = 0; i < indesp.length; i++) {
                        formulario    += "<option value='"+indesp[i].indesp_id+"'>"+indesp[i].indesp_descripcion+"</option>";
                    }
                    formulario    += "</select>";
                    formulario    += "<label>Fecha:</label>";
                    formulario    += "<input type='date'class='form-control' name='fecha_evento' id='fecha_evento' step='1' min='"+fecha_min+"' max='"+fecha_max+"' />";
                    
                    $("#content-form").html(formulario); 
                    $("#myModal").modal("show"); 

                });
		        
		        
    			break;
    		case '6':
				$.post(base+"index.php/medicamentos/json_ExtraerTodo",function(medicamentos){
					$.post(base+"index.php/via_aplicacion/json_ExtraerTodo",function(via_aplicacion){
						var medi = JSON.parse(medicamentos);
						var viaap = JSON.parse(via_aplicacion);
						formulario 	  += "<label>Medicamentos:</label>";
						formulario    += "<select class='form-control' id='medi'>";
						for (var i = 0; i < medi.length; i++) {
							formulario    += "<option value='"+medi[i].medi_id+"'>"+medi[i].medi_descripcion+"</option>";
						}
						formulario    += "</select>";
						formulario 	  += "<label>Via Aplicacion:</label>";
						formulario    += "<select class='form-control' id='viaap'>";
						for (var i = 0; i < viaap.length; i++) {
                            formulario    += "<option value='"+viaap[i].viaap_id+"'>"+viaap[i].viaap_descripcion+"</option>";
                        }
						formulario    += "</select>";
						formulario    += "<label>Fecha:</label>";
						formulario    += "<input type='date'class='form-control' id='fecha_evento' name='fecha_evento' step='1' min='"+fecha_min+"' max='"+fecha_max+"' />";

						$("#content-form").html(formulario); 
						$("#myModal").modal("show"); 
					});
				});
    			
    			break;
    		case '7':
				$.post(base+"index.php/especificacion_muerte/json_ExtraerTodo",function(especificacion_muerte){
					var espmu = JSON.parse(especificacion_muerte);
					formulario 	  += "<label>Especificacion Muerte:</label>";
					formulario    += "<select class='form-control' id='espmu'>";
					for (var i = 0; i < espmu.length; i++) {
                        formulario    += "<option value='"+espmu[i].espmu_id+"'>"+espmu[i].espmu_descripcion+"</option>";
                    }
					formulario    += "</select>";
					formulario    += "<label>Fecha:</label>";
					formulario    += "<input type='date'class='form-control' id='fecha_evento' name='fecha_evento' step='1' min='"+fecha_min+"' max='"+fecha_max+"' />";
					
					$("#content-form").html(formulario); 
					$("#myModal").modal("show"); 
				});
    			
    			break;
    		case '8':
                $.post(base+"index.php/tipo_parto/json_ExtraerTodo",function(tipo_parto){
                    $.post(base+"index.php/sexo_cria/json_ExtraerTodo",function(sexo_cria){
                        $.post(base+"index.php/estado_cria/json_ExtraerTodo",function(estado_cria){
                            $.post(base+"index.php/servicio/json_ExtraerTodo",function(servicio){
                                var tipar = JSON.parse(tipo_parto);
                                var sexcri = JSON.parse(sexo_cria);
                                var estcri = JSON.parse(estado_cria);
                                var serv = JSON.parse(servicio);
                                formulario    += "<label>Tipo Parto:</label>";
                                formulario    += "<select class='form-control' id='tippar'>";
                                for (var i = 0; i < tipar.length; i++) {
                                    formulario    += "<option value='"+tipar[i].tippar_id+"'>"+tipar[i].tippar_descripcion+"</option>";
                                }
                                formulario    += "</select>";
                                formulario    += "<label>Sexo Cria:</label>";
                                formulario    += "<select class='form-control' id='sexcr'>";
                                for (var i = 0; i < sexcri.length; i++) {
                                    formulario    += "<option value='"+sexcri[i].sexcr_id+"'>"+sexcri[i].sexcr_descripcion+"</option>";
                                }
                                formulario    += "</select>";
                                formulario    += "<label>Estado Cria:</label>";
                                formulario    += "<select class='form-control' id='estcr'>";
                                for (var i = 0; i < estcri.length; i++) {
                                    formulario    += "<option value='"+estcri[i].estcr_id+"'>"+estcri[i].estcr_descripcion+"</option>";
                                }
                                formulario    += "</select>";
                                formulario    += "<label>Servicio:</label>";
                                formulario    += "<select class='form-control' id='ser'>";
                                for (var i = 0; i < serv.length; i++) {
                                    formulario    += "<option value='"+serv[i].ser_id+"'>Servicio "+serv[i].ser_id+"</option>";
                                }
                                formulario    += "</select>";
                                formulario    += "<label>Fecha Nacimiento:</label>";
                                formulario    += "<input type='date' class='form-control' id='fecha_evento' name='fecha_evento' step='1' min='"+fecha_min+"' max='"+fecha_max+"' />";
                                
                                $("#content-form").html(formulario); 
                                $("#myModal").modal("show"); 

                            });
                        });
                    }); 
                });

    			
    			break;
    		case '9':
    			$.post(base+"index.php/tipo_servicio/json_ExtraerTodo",function(tipo_servicio){
                    $.post(base+"index.php/reproductor/json_ExtraerTodo",function(reproductor){
                        $.post(base+"index.php/personal/json_ExtraerTodo",function(personal){
                                var tise = JSON.parse(tipo_servicio);
                                var re = JSON.parse(reproductor);
                                var pe = JSON.parse(personal);
                
                formulario      += "<label>Tipo Servicio:</label>";
                formulario    += "<select class='form-control' id='tipse'>";
                for (var i = 0; i < tise.length; i++) {
                                    formulario    += "<option value='"+tise[i].tipse_id+"'>"+tise[i].tipse_descripcion+"</option>";
                }
                formulario    += "</select>";
                formulario    += "<label>Reproductor:</label>";
                formulario    += "<select class='form-control' id='repro'>";
                for (var i = 0; i < re.length; i++) {
                                    formulario    += "<option value='"+re[i].repro_id+"'>"+re[i].repro_descripcion+"</option>";
                }
                formulario    += "</select>";
                formulario    += "<label>Personal:</label>";
                formulario    += "<select class='form-control' id='per'>";
                for (var i = 0; i < pe.length; i++) {
                                    formulario    += "<option value='"+pe[i].per_id+"'>"+pe[i].per_nombre+' '+pe[i].per_ape_paterno+' '+pe[i].per_ape_materno+"</option>";
                }
                formulario    += "</select>";
                formulario    += "<label>Fecha:</label>";
                formulario    += "<input type='date'class='form-control' id='fecha_evento' name='fecha_evento' step='1' min='"+fecha_min+"' max='"+fecha_max+"' />";
                
                $("#content-form").html(formulario); 
                $("#myModal").modal("show");                                 
                            
                        });
                    }); 
                });
                 
    			break;
    		case '10':
    			$.post(base+"index.php/enfermedad_ovario/json_ExtraerTodo",function(enfermedad_ovario){
                    $.post(base+"index.php/via_aplicacion/json_ExtraerTodo",function(via_aplicacion){
                        $.post(base+"index.php/diagnostico_utero/json_ExtraerTodo",function(diagnostico_utero){
                            $.post(base+"index.php/enfermedad_utero/json_ExtraerTodo",function(enfermedad_utero){
                                $.post(base+"index.php/medicina_genital/json_ExtraerTodo",function(medicina_genital){
                                var eo = JSON.parse(enfermedad_ovario);
                                var va = JSON.parse(via_aplicacion);
                                var du = JSON.parse(diagnostico_utero);
                                var eu = JSON.parse(enfermedad_utero);
                                var mg = JSON.parse(medicina_genital);

                formulario    += "<label>Diagnostico de Utero:</label>";
                formulario    += "<select class='form-control' id='diaut'>";
                for (var i = 0; i < du.length; i++) {
                    formulario    += "<option value='"+du[i].diaut_id+"'>"+du[i].diaut_descripcion+"</option>";
                }
                formulario    += "</select>";
                formulario    += "<label>Enfermedad de Ovario:</label>";
                formulario    += "<select class='form-control' id='enfov'>";
                for (var i = 0; i < eo.length; i++) {
                    formulario    += "<option value='"+eo[i].enfov_id+"'>"+eo[i].enfov_descripcion+"</option>";
                }
                formulario    += "</select>";
                formulario    += "<label>Via Aplicacion:</label>";
                formulario    += "<select class='form-control' id='viaap'>";
                for (var i = 0; i < va.length; i++) {
                    formulario    += "<option value='"+va[i].viaap_id+"'>"+va[i].viaap_descripcion+"</option>";
                }
                formulario    += "</select>";
                formulario    += "<label>Enfermedad de Utero:</label>";
                formulario    += "<select class='form-control' id='enfut'>";
                for (var i = 0; i < eu.length; i++) {
                    formulario    += "<option value='"+eu[i].enfut_id+"'>"+eu[i].enfut_descripcion+"</option>";
                }
                formulario    += "</select>";
                formulario    += "<label>Medicina Genital:</label>";
                formulario    += "<select class='form-control' id='medget'>";
                for (var i = 0; i < mg.length; i++) {
                    formulario    += "<option value='"+mg[i].medge_id+"'>"+mg[i].medge_descripcion+"</option>";
                }
                formulario    += "</select>";
                formulario    += "<label>Fecha:</label>";
                formulario    += "<input type='date'class='form-control' id='fecha_evento' name='fecha_evento' step='1' min='"+fecha_min+"' max='"+fecha_max+"' />";
                
                $("#content-form").html(formulario); 
                $("#myModal").modal("show"); 
                               }); 
                            });
                        });
                    }); 
                });
                break;
    		case '11':
    			$.post(base+"index.php/especificacion_venta/json_ExtraerTodo",function(especificacion_venta){
                                var ev = JSON.parse(especificacion_venta);

                formulario    += "<label>Especificacion Venta:</label>";
                formulario    += "<select class='form-control' id='espve'>";
                for (var i = 0; i < ev.length; i++) {
                    formulario    += "<option value='"+ev[i].espve_id+"'>"+ev[i].espve_descripcion+"</option>";
                }
                formulario    += "</select>";

               
                formulario    += "<label>Fecha:</label>";
                formulario    += "<input type='date'class='form-control' id='fecha_evento' name='fecha_evento' step='1' min='"+fecha_min+"' max='"+fecha_max+"' />";
                
                $("#content-form").html(formulario); 
                $("#myModal").modal("show");             
                });
    			break;
    		case '12':
    			$.post(base+"index.php/medicina_cuarto_mamarios/json_ExtraerTodo",function(medicina_cuarto_mamario){
                               var mcm = JSON.parse(medicina_cuarto_mamario);
                formulario    += "<label>Cuartos Mamarios:</label>";
                formulario    += "<select class='form-control' id='cuama'>";
                for (var i = 0; i < mcm.length; i++) {
                    formulario    += "<option value='"+mcm[i].mecu_id+"'>"+mcm[i].mecu_descripcion+"</option>";
                }
                formulario    += "</select>";
                formulario    += "<label>Fecha:</label>";
                formulario    += "<input type='date'class='form-control' id='fecha_evento' name='fecha_evento' step='1' min='"+fecha_min+"' max='"+fecha_max+"' />";
 
                $("#content-form").html(formulario); 
                $("#myModal").modal("show");
                 }); 
    			break;
    		case '13':
    			$.post(base+"index.php/causa_rechazo/json_ExtraerTodo",function(causa_rechazo){
                    var crr = JSON.parse(causa_rechazo);

                    formulario    += "<label>Causa Rechazo:</label>";
                    formulario    += "<select class='form-control' id='caure'>";
                    for (var i = 0; i < crr.length; i++) {
                        formulario    += "<option value='"+crr[i].cr_id+"'>"+crr[i].cr_descripcion+"</option>";
                    }
                    formulario    += "</select>";
                   
                    formulario    += "<label>Fecha:</label>";
                    formulario    += "<input type='date'class='form-control' name='fecha_evento' id='fecha_evento' step='1' min='"+fecha_min+"' max='"+fecha_max+"' />";
                    
                    $("#content-form").html(formulario); 
                    $("#myModal").modal("show");
                }); 
    			break;
    	}
    	
    }
    function crearEvento(est) {
        //var guardar = validar_formulario();
        //console.log(guardar);
        num_evento = $("#evento").val();
        //if(guardar){
        switch(num_evento){
                case '1':
                    var animal = $("#animal").val();
                    var cuabor = $("#causa_aborto").val();
                    var fecha = $("#fecha_evento").val();
                    if(est=='1'){
                    $.post(base+"index.php/aborto/json_Nuevo",{animal:animal,cauabor:cuabor,fecha:fecha},function(valor){
                        var obj = JSON.parse(valor);
                        var id_tabla = obj[0];
                        var sim_id = num_evento;
                        $.post(base+"index.php/eventos/json_Nuevo",{id_tabla:id_tabla,sim_id:sim_id,ani_id:animal,eve_fecha:fecha},function(ult_event){
                            console.log(id_tabla+","+sim_id+","+animal+","+fecha);
                            //Extraer ID de Evento:
                            var id_evento= JSON.parse(ult_event);
                            console.log(id_evento);
                            
                            //----------------------
                            var id = String("#"+$("#fila").val()+""+$("#mes").val());
                            $.post(base+"index.php/simbolo/json_BuscarID",{id:sim_id},function(simbolo){
                                var sim = JSON.parse(simbolo);
                                var res = fecha.split("-");
                                boton = "<button type=\"button\" onclick=\"editarEvento('"+id_evento+"','"+base+"');\">";
                                boton +="<img src=\""+base+"img/"+sim[0].sim_icono+"\"/>";
                                boton +="<span class=\"badge\" id='dia'>"+res[2]+"</span>";
                                boton +="</button><br>";
                                $(id).append(boton);
                            }); 
                        });
                    });
                    }else{
                        var id_evento = $("#id_evento").val();
                        alert(id_evento+" "+fecha);
                        $.post(base+"index.php/eventos/json_Editar",{id:id_evento,eve_fecha:fecha},function(){
                            /*var id = $("#id_tabla").val();
                            $.post(base+"index.php/aborto/json_Editar",{id:id,animal:animal,cauabor:cuabor,fecha:fecha},function(){
                                alert("edit success");                                
                            });*/
                            var res = fecha.split("-");
                            $("#dia").html(String(res[2]));
                            alert("sda");
                        });

                    }
                    break;
                case '2':
                    var animal = $("#animal").val();
                    var tipo_analisis = $("#tipan").val();
                    var resul_analisis = $("#resan").val();
                    var fecha = $("#fecha_evento").val();
                    $.post(base+"index.php/analisis/json_Nuevo",{animal:animal,tipana:tipo_analisis,resultado_ana:resul_analisis,fecha:fecha},function(valor){
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

                    break;
                case '3':
                    var animal = $("#animal").val();
                    var causa_no_inseminal = $("#cni").val();
                    var medicina_genital = $("#medget").val();
                    var via_aplicacion = $("#viaap").val();
                    var fecha = $("#fecha_evento").val();
                    $.post(base+"index.php/celo/json_Nuevo",{rp:animal,cni:causa_no_inseminal,medget:medicina_genital,viaap:via_aplicacion,fecha:fecha},function(valor){
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

                    break;
                case '4':
                    var animal = $("#animal").val();
                    var tipo_enfer = $("#id_tipen").val();
                    var medicamentos = $("#id_medi").val();
                    var via_aplicacion = $("#id_viaap").val();
                    var fecha = $("#fecha_evento").val();
                    $.post(base+"index.php/enfermedad/json_Nuevo",{rp:animal,tipo_enfermedad:tipo_enfer,medicamentos:medicamentos,via_aplicacion:via_aplicacion,fecha:fecha},function(valor){
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
                    break;
                case '5':
					var animal = $("#animal").val();
                    var ind_especiale = $("#indesp").val();
                    var fecha = $("#fecha_evento").val();
                    $.post(base+"index.php/indicaciones_especiale/json_Nuevo",{rp:animal,indicaciones_esp:ind_especiale,fecha:fecha},function(valor){
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
                    break;
                case '6':
					var animal = $("#animal").val();
                    var medicamentos = $("#medi").val();
					var via_aplicacion = $("#viaap").val();
                    var fecha = $("#fecha_evento").val();
                    $.post(base+"index.php/medicacion/json_Nuevo",{rp:animal,medicamentos:medicamentos,via_aplicacion:via_aplicacion,fecha:fecha},function(valor){
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
                    break;
                case '7':
					var animal = $("#animal").val();
                    var especificacion_muerte = $("#espmu").val();
                    var fecha = $("#fecha_evento").val();
                    $.post(base+"index.php/muerte/json_Nuevo",{rp:animal,espec_muerte:especificacion_muerte,fecha:fecha},function(valor){
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
                    break;
                case '8':
                    var animal = $("#animal").val();
                    var fecha = $("#fecha_evento").val();
                    var estado_cria = $("#estcr").val();
                    var tipo_parto = $("#tippar").val();
                    var sexo_cria = $("#sexcr").val();
                    var servicio = $("#ser").val();
                    //console.log(animal+","+fecha_naci+","+estado_cria+","+tipo_parto+","+sexo_cria+","+servicio);
                    $.post(base+"index.php/parto/json_Nuevo",{rp:animal,fecha:fecha,estado_cria:estado_cria,tipo_parto:tipo_parto,sexo_cria:sexo_cria,servicio:servicio},function(valor){
                        alert("ho");
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
                    break;
                case '9':
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

                    break;
                case '10':

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




                    break;
                case '11':
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
                    break;
                case '12':
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
                    break;
                case '13':
                    var animal = $("#animal").val();
                    var fecha = $("#fecha_evento").val();
                    var causa_rechazo = $("#caure").val();

                    $.post(base+"index.php/rechazo/json_Nuevo",{rp:animal,fecha:fecha,causa_rechazo:causa_rechazo},function(valor){
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
                    break;
            }    
            $("#myModal").modal("hide");
        //}
        //document.getElementById($("#fila").val()+","+$("#mes").val()).innerHTML = "<img src='"+$("#url").val()+"img/calendar.png'>";
    }
    function editarEvento(id,base2,btn){
            $("#id_evento").val(id);
            $.post(base2+"index.php/eventos/json_BuscarID",{id:id},function(valor){
                var obj = JSON.parse(valor);
                $("#id_tabla").val(obj[0].id_tabla);
                $("#animal").val(obj[0].ani_id);
                $.post(base2+"index.php/simbolo/json_BuscarID",{id:obj[0].sim_id},function(valor2){
                    var obj2 = JSON.parse(valor2);
                    
                    $.post(base2+"index.php/"+obj2[0].evento+"/json_BuscarID",{id:obj[0].id_tabla},function(datos){
                        var data = JSON.parse(datos);
                        var fec=obj[0].eve_fecha.split("-");
                        console.log(data);
                        cabecera_formulario(fec[1],base2,0);
                        mostrarFormulario(obj2[0].sim_id,data,0);
                    });

                });

                
            });

    }
    function modificarEvento(){

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
