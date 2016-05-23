
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->


        <!-- jQuery 2.0.2 -->
        <script src="<?= base_url(); ?>js/jquery-1.12.3.min.js" type="text/javascript"></script>
        <!-- Bootstrap -->
        <script src="<?= base_url(); ?>js/bootstrap.min.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="<?= base_url(); ?>js/AdminLTE/app.js" type="text/javascript"></script>


        <link href="<?= base_url(); ?>css/jQueryUI/jquery-ui-1.10.3.custom.min.css" rel="stylesheet" type="text/css" />
        <script src="<?= base_url(); ?>js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>


        <link href="<?= base_url(); ?>css/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
        <script src="<?= base_url(); ?>js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="<?= base_url(); ?>js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>

        <script type="text/javascript">
            $(document).ready(function() {
                var fecha = new Date();
                var ano = fecha.getFullYear();
                $("#anio").val(ano);
                $("#reTabla").load( "/Granja/index.php/calendario/mostrarTabla/"+ano);
                
                $("#example1").dataTable({
                    
                    "bPaginate": true,
                    "bLengthChange": true,
                    "bFilter": true,
                    "bSort": true,
                    "bInfo": false,
                    "bAutoWidth": false,
                    "oLanguage" :{
                        'sProcessing':     'Cargando...',
                        'sLengthMenu':     'Mostrar _MENU_ registros',
                        'sZeroRecords':    'No se encontraron resultados',
                        'sEmptyTable':     'Ningún dato disponible en esta tabla',
                        'sInfo':           'Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros',
                        'sInfoEmpty':      'Mostrando registros del 0 al 0 de un total de 0 registros',
                        'sInfoFiltered':   '(filtrado de un total de _MAX_ registros)',
                        'sInfoPostFix':    '',
                        'sSearch':         'Buscar:',
                        'sUrl':            '',
                        'sInfoThousands':  '',
                        'sLoadingRecords': 'Cargando...',
                        'oPaginate': {
                            'sFirst':    'Primero',
                            'sLast':     'Último',
                            'sNext':     'Siguiente',
                            'sPrevious': 'Anterior'
                        },
                        'oAria': {
                            'sSortAscending':  ': Activar para ordenar la columna de manera ascendente',
                            'sSortDescending': ': Activar para ordenar la columna de manera descendente'
                        }
                    },
                    'aaSorting': [[ 0, 'asc' ]],//ordenar
                    'iDisplayLength': 5,
                    'aLengthMenu': [[5, 10, 20], [5, 10, 20]]

                });
                $("#avanzar").click(function(){
                    avanz = parseInt($("#anio").val())+1;
                    //alert(avanz);
                    $("#anio").val(avanz);
                    $("#reTabla").load( "/Granja/index.php/calendario/mostrarTabla/"+avanz);
                    
                });
                $("#retroceder").click(function(){
                    avanz = parseInt($("#anio").val())-1;
                    //alert(avanz);
                    $("#anio").val(avanz);
                    $("#reTabla").load( "/Granja/index.php/calendario/mostrarTabla/"+avanz);
                    
                });
                $("#evento").change(function(){
                    var op = $("#evento").val();
                    console.log(op);   
                    mostrarFormulario(op,'',1);
                    
                });
                
            });
        </script>

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
        //alert(fecha_min+" "+fecha_max);
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
                    
                    for (var i = 0; i < obj.length; i++) {
                        var seleccion = "";
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
                            var seleccion = "";
                            if(est!=1){
                                if(data[0].ana_tipo_analisis == tipan[i].tipan_id){
                                    seleccion = "selected";
                                }
                            }

                            formulario    += "<option "+seleccion+" value='"+tipan[i].tipan_id+"'>"+tipan[i].tipan_descripcion+"</option>";
                        }
                        
                        formulario    += "</select>";
                        formulario    += "<label>Resultado Analisis:</label>";
                        formulario    += "<select class='form-control' id='resan'>";
                        for (var i = 0; i < resana.length; i++) {
                            var seleccion = "";
                            if(est!=1){
                                if(data[0].ana_resul_analisis == resana[i].resan_id){
                                    seleccion = "selected";
                                }
                            }

                            formulario    += "<option "+seleccion+" value='"+resana[i].resan_id+"'>"+resana[i].resan_descripcion+"</option>";
                        }
                        
                        formulario    += "</select>";

                        var ant = "";
                        if(est!=1){
                            thedate = data[0].ana_fecha_evento.split(" ");
                            ant = "value='"+thedate[0]+"'";
                        }

                        formulario    += "<label>Fecha:</label>";
                        formulario    += "<input "+ant+" type='date'class='form-control' name='fecha_evento' id='fecha_evento' step='1' min='"+fecha_min+"' max='"+fecha_max+"' />";
                        $("#content-form").html(formulario); 
                        pie_formulario(est);
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
                                var seleccion = "";
                                if(est!=1){
                                    if(data[0].celo_causa_no_inseminal == cni[i].cni_id){
                                        seleccion = "selected";
                                    }
                                }
                                formulario    += "<option "+seleccion+" value='"+cni[i].cni_id+"'>"+cni[i].cni_descripcion+"</option>";
                            }

                            formulario    += "</select>";
                            formulario    += "<label>Medicina Genital:</label>";
                            formulario    += "<select class='form-control' id='medget'>";
                            for (var i = 0; i < medge.length; i++) {
                                var seleccion = "";
                                if(est!=1){
                                    if(data[0].celo_medicina_genital == medge[i].medge_id){
                                        seleccion = "selected";
                                    }
                                }
                                formulario    += "<option "+seleccion+" value='"+medge[i].medge_id+"'>"+medge[i].medge_descripcion+"</option>";
                            }
                            formulario    += "</select>";
                            formulario    += "<label>Via Aplicacion:</label>";
                            formulario    += "<select class='form-control' id='viaap'>";
                            for (var i = 0; i < viaap.length; i++) {
                                var seleccion = "";
                                if(est!=1){
                                    if(data[0].celo_via_aplicacion == viaap[i].viaap_id){
                                        seleccion = "selected";
                                    }
                                }
                                formulario    += "<option "+seleccion+" value='"+viaap[i].viaap_id+"'>"+viaap[i].viaap_descripcion+"</option>";
                            }
                            formulario    += "</select>";

                            var ant = "";
                            if(est!=1){
                                thedate = data[0].celo_fecha_evento.split(" ");
                                ant = "value='"+thedate[0]+"'";
                            }

                            formulario    += "<label>Fecha:</label>";
                            formulario    += "<input "+ant+" type='date'class='form-control' name='fecha_evento' id='fecha_evento' step='1' min='"+fecha_min+"' max='"+fecha_max+"' />";

                            $("#content-form").html(formulario); 
                            pie_formulario(est);
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
                                var seleccion = "";
                                if(est!=1){
                                  if(data[0].enf_tipo_enfermedad == tipen[i].tipen_id){
                                     seleccion = "selected";
                                  }
                                }
                                formulario    += "<option "+seleccion+" value='"+tipen[i].tipen_id+"'>"+tipen[i].tipen_descripcion+"</option>";
                            }
                            formulario    += "</select>";
                            formulario    += "<label>Medicamento:</label>";
                            formulario    += "<select class='form-control' id='id_medi'>";
                            for (var i = 0; i < medi.length; i++) {
                                var seleccion = "";
                                if(est!=1){
                                  if(data[0].enf_medicamento == medi[i].medi_id){
                                    seleccion = "selected";
                                    }
                                }
                                formulario    += "<option "+seleccion+" value='"+medi[i].medi_id+"'>"+medi[i].medi_descripcion+"</option>";
                            }
                            formulario    += "</select>";
                            formulario    += "<label>Via Aplicacion:</label>";
                            formulario    += "<select class='form-control' id='id_viaap'>";
                            for (var i = 0; i < viaap.length; i++) {
                                var seleccion = "";
                                if(est!=1){
                                  if(data[0].enf_via_aplicacion == viaap[i].viaap_id){
                                     seleccion = "selected";
                                    }
                                }
                                formulario    += "<option "+seleccion+" value='"+viaap[i].viaap_id+"'>"+viaap[i].viaap_descripcion+"</option>";
                            }
                            formulario    += "</select>";
                            var ant = "";
                            if(est!=1){
                                thedate = data[0].enf_fecha_evento.split(" ");
                                ant = "value='"+thedate[0]+"'";
                            }
                            formulario    += "<label>Fecha:</label>";
                            formulario    += "<input "+ant+" type='date'class='form-control' id='fecha_evento' name='fecha_evento' step='1' min='"+fecha_min+"' max='"+fecha_max+"' />";
                            $("#content-form").html(formulario); 
                            pie_formulario(est);
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
                        var seleccion = "";
                        if(est!=1){
                          if(data[0].indes_indicaciones_esp == indesp[i].indesp_id){
                                     seleccion = "selected";
                           }
                         }
                        formulario    += "<option "+seleccion+" value='"+indesp[i].indesp_id+"'>"+indesp[i].indesp_descripcion+"</option>";
                    }
                    formulario    += "</select>";
                    var ant = "";
                            if(est!=1){
                                thedate = data[0].indes_fecha_evento.split(" ");
                                ant = "value='"+thedate[0]+"'";
                            }
                    formulario    += "<label>Fecha:</label>";
                    formulario    += "<input "+ant+" type='date'class='form-control' name='fecha_evento' id='fecha_evento' step='1' min='"+fecha_min+"' max='"+fecha_max+"' />";
                    
                    $("#content-form").html(formulario); 
                      pie_formulario(est);
                    $("#myModal").modal("show"); 

                });
                break;
            case '6':
                $.post(base+"index.php/medicamentos/json_ExtraerTodo",function(medicamentos){
                    $.post(base+"index.php/via_aplicacion/json_ExtraerTodo",function(via_aplicacion){
                        var medi = JSON.parse(medicamentos);
                        var viaap = JSON.parse(via_aplicacion);
                        formulario    += "<label>Medicamentos:</label>";
                        formulario    += "<select class='form-control' id='medi'>";
                        for (var i = 0; i < medi.length; i++) {
                            var seleccion = "";
                        if(est!=1){
                          if(data[0].med_medicamentos == medi[i].medi_id){
                                     seleccion = "selected";
                           }
                         }
                            formulario    += "<option "+seleccion+" value='"+medi[i].medi_id+"'>"+medi[i].medi_descripcion+"</option>";
                        }
                        formulario    += "</select>";
                        formulario    += "<label>Via Aplicacion:</label>";
                        formulario    += "<select class='form-control' id='viaap'>";
                        for (var i = 0; i < viaap.length; i++) {
                             var seleccion = "";
                        if(est!=1){
                          if(data[0].med_via_aplicacion == viaap[i].viaap_id){
                                     seleccion = "selected";
                           }
                         }
                            formulario    += "<option "+seleccion+" value='"+viaap[i].viaap_id+"'>"+viaap[i].viaap_descripcion+"</option>";
                        }
                        formulario    += "</select>";
                        var ant = "";
                            if(est!=1){
                                thedate = data[0].med_fecha_evento.split(" ");
                                ant = "value='"+thedate[0]+"'";
                            }
                        formulario    += "<label>Fecha:</label>";
                        formulario    += "<input "+ant+" type='date'class='form-control' id='fecha_evento' name='fecha_evento' step='1' min='"+fecha_min+"' max='"+fecha_max+"' />";

                        $("#content-form").html(formulario); 
                           pie_formulario(est);
                        $("#myModal").modal("show"); 
    
                    });
                });
                
                break;
            case '7':
                $.post(base+"index.php/especificacion_muerte/json_ExtraerTodo",function(especificacion_muerte){
                    var espmu = JSON.parse(especificacion_muerte);
                    formulario    += "<label>Especificacion Muerte:</label>";
                    formulario    += "<select class='form-control' id='espmu'>";
                    for (var i = 0; i < espmu.length; i++) {
                        var seleccion = "";
                        if(est!=1){
                          if(data[0].mue_espec_muerte == espmu[i].espmu_id){
                                     seleccion = "selected";
                           }
                         }
                        formulario    += "<option "+seleccion+" value='"+espmu[i].espmu_id+"'>"+espmu[i].espmu_descripcion+"</option>";
                    }
                    formulario    += "</select>";
                    var ant = "";
                            if(est!=1){
                                thedate = data[0].mue_fecha_evento.split(" ");
                                ant = "value='"+thedate[0]+"'";
                            }
                    formulario    += "<label>Fecha:</label>";
                    formulario    += "<input "+ant+" type='date'class='form-control' id='fecha_evento' name='fecha_evento' step='1' min='"+fecha_min+"' max='"+fecha_max+"' />";
                    
                    $("#content-form").html(formulario); 
                           pie_formulario(est);
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
                                    var seleccion = "";
                                    if(est!=1){
                                         if(data[0].par_tipo_parto == tipar[i].tippar_id){
                                            seleccion = "selected";
                                          }
                                     }
                                    formulario    += "<option "+seleccion+"  value='"+tipar[i].tippar_id+"'>"+tipar[i].tippar_descripcion+"</option>";
                                }
                                formulario    += "</select>";
                                formulario    += "<label>Sexo Cria:</label>";
                                formulario    += "<select class='form-control' id='sexcr'>";
                                for (var i = 0; i < sexcri.length; i++) {
                                    var seleccion = "";
                                    if(est!=1){
                                         if(data[0].par_sexo_cria == sexcri[i].sexcr_id){
                                            seleccion = "selected";
                                          }
                                     }
                                    formulario    += "<option "+seleccion+" value='"+sexcri[i].sexcr_id+"'>"+sexcri[i].sexcr_descripcion+"</option>";
                                }
                                formulario    += "</select>";
                                formulario    += "<label>Estado Cria:</label>";
                                formulario    += "<select class='form-control' id='estcr'>";
                                for (var i = 0; i < estcri.length; i++) {
                                    var seleccion = "";
                                    if(est!=1){
                                         if(data[0].par_estado_cria == estcri[i].estcr_id){
                                            seleccion = "selected";
                                          }
                                     }
                                    formulario    += "<option "+seleccion+" value='"+estcri[i].estcr_id+"'>"+estcri[i].estcr_descripcion+"</option>";
                                }
                                formulario    += "</select>";
                                formulario    += "<label>Servicio:</label>";
                                formulario    += "<select class='form-control' id='ser'>";
                                for (var i = 0; i < serv.length; i++) {
                                    var seleccion = "";
                                    if(est!=1){
                                         if(data[0].par_servicio == serv[i].ser_id){
                                            seleccion = "selected";
                                          }
                                     }
                                    formulario    += "<option  "+seleccion+" value='"+serv[i].ser_id+"'>Servicio "+serv[i].ser_id+"</option>";
                                }
                                formulario    += "</select>";
                                var ant = "";
                                if(est!=1){
                                    thedate = data[0].par_fechanac.split(" ");
                                    ant = "value='"+thedate[0]+"'";
                                }
                                formulario    += "<label>Fecha Nacimiento:</label>";
                                formulario    += "<input "+ant+" type='date' class='form-control' id='fecha_evento' name='fecha_evento' step='1' min='"+fecha_min+"' max='"+fecha_max+"' />";
                                
                                $("#content-form").html(formulario); 
                                   pie_formulario(est);
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
                    var seleccion = "";
                     if(est!=1){
                          if(data[0].ser_tipo_servicio == tise[i].tipse_id){
                             seleccion = "selected";
                           }
                        }
                    formulario    += "<option "+seleccion+" value='"+tise[i].tipse_id+"'>"+tise[i].tipse_descripcion+"</option>";
                }
                formulario    += "</select>";
                formulario    += "<label>Reproductor:</label>";
                formulario    += "<select class='form-control' id='repro'>";
                for (var i = 0; i < re.length; i++) {
                    var seleccion = "";
                     if(est!=1){
                          if(data[0].ser_reproductor == re[i].repro_id){
                             seleccion = "selected";
                           }
                        }
                    formulario    += "<option "+seleccion+" value='"+re[i].repro_id+"'>"+re[i].repro_descripcion+"</option>";
                }
                formulario    += "</select>";
                formulario    += "<label>Personal:</label>";
                formulario    += "<select class='form-control' id='per'>";
                for (var i = 0; i < pe.length; i++) {
                    var seleccion = "";
                     if(est!=1){
                          if(data[0].ser_personal == pe[i].per_id){
                             seleccion = "selected";
                           }
                        }
                    formulario    += "<option "+seleccion+" value='"+pe[i].per_id+"'>"+pe[i].per_nombre+' '+pe[i].per_ape_paterno+' '+pe[i].per_ape_materno+"</option>";
                }
                formulario    += "</select>";
                var ant = "";
                 if(est!=1){
                     thedate = data[0].ser_fecha_evento.split(" ");
                     ant = "value='"+thedate[0]+"'";
                 }
                formulario    += "<label>Fecha:</label>";
                formulario    += "<input "+ant+"type='date'class='form-control' id='fecha_evento' name='fecha_evento' step='1' min='"+fecha_min+"' max='"+fecha_max+"' />";
                
                 $("#content-form").html(formulario); 
                    pie_formulario(est);
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
                console.log(du);
                for (var i = 0; i < du.length; i++) {
                    var seleccion = "";
                     if(est!=1){
                          if(data[0].tarec_diag_utero == du[i].diaut_id){
                             seleccion = "selected";
                           }
                        }
                    formulario    += "<option "+seleccion+" value='"+du[i].diaut_id+"'>"+du[i].diaut_descripcion+"</option>";
                }
                formulario    += "</select>";
                formulario    += "<label>Enfermedad de Ovario:</label>";
                formulario    += "<select class='form-control' id='enfov'>";
                for (var i = 0; i < eo.length; i++) {
                    var seleccion = "";
                     if(est!=1){
                          if(data[0].tarec_enfe_ovario == eo[i].enfov_id){
                             seleccion = "selected";
                           }
                        }
                    formulario    += "<option "+seleccion+" value='"+eo[i].enfov_id+"'>"+eo[i].enfov_descripcion+"</option>";
                }
                formulario    += "</select>";
                formulario    += "<label>Via Aplicacion:</label>";
                formulario    += "<select class='form-control' id='viaap'>";
                for (var i = 0; i < va.length; i++) {
                    var seleccion = "";
                     if(est!=1){
                          if(data[0].tarec_via_aplicacion == va[i].viaap_id){
                             seleccion = "selected";
                           }
                        }
                    formulario    += "<option "+seleccion+" value='"+va[i].viaap_id+"'>"+va[i].viaap_descripcion+"</option>";
                }
                formulario    += "</select>";
                formulario    += "<label>Enfermedad de Utero:</label>";
                formulario    += "<select class='form-control' id='enfut'>";
                for (var i = 0; i < eu.length; i++) {
                    var seleccion = "";
                     if(est!=1){
                          if(data[0].tarec_enfe_utero == eu[i].enfut_id){
                             seleccion = "selected";
                           }
                        }
                    formulario    += "<option "+seleccion+" value='"+eu[i].enfut_id+"'>"+eu[i].enfut_descripcion+"</option>";
                }
                formulario    += "</select>";
                formulario    += "<label>Medicina Genital:</label>";
                formulario    += "<select class='form-control' id='medget'>";
                for (var i = 0; i < mg.length; i++) {
                    var seleccion = "";
                     if(est!=1){
                          if(data[0].tarec_med_genital == mg[i].medge_id){
                             seleccion = "selected";
                           }
                        }
                    formulario    += "<option "+seleccion+" value='"+mg[i].medge_id+"'>"+mg[i].medge_descripcion+"</option>";
                }
                formulario    += "</select>";
                var ant = "";
                 if(est!=1){
                     thedate = data[0].tarec_fecha_evento.split(" ");
                     ant = "value='"+thedate[0]+"'";
                 }
                formulario    += "<label>Fecha:</label>";
                formulario    += "<input "+ant+" type='date'class='form-control' id='fecha_evento' name='fecha_evento' step='1' min='"+fecha_min+"' max='"+fecha_max+"' />";
                
                $("#content-form").html(formulario); 
                    pie_formulario(est);
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
                    var seleccion = "";
                     if(est!=1){
                          if(data[0].venta_especif_venta == ev[i].espve_id){
                             seleccion = "selected";
                           }
                        }
                    formulario    += "<option "+seleccion+" value='"+ev[i].espve_id+"'>"+ev[i].espve_descripcion+"</option>";
                }
                formulario    += "</select>";
                var ant = "";
                 if(est!=1){
                     thedate = data[0].venta_fecha_evento.split(" ");
                     ant = "value='"+thedate[0]+"'";
                 }
                formulario    += "<label>Fecha:</label>";
                formulario    += "<input "+ant+" type='date'class='form-control' id='fecha_evento' name='fecha_evento' step='1' min='"+fecha_min+"' max='"+fecha_max+"' />";
                
                $("#content-form").html(formulario); 
                    pie_formulario(est);
                $("#myModal").modal("show");              
                });
                break;
            case '12':
                $.post(base+"index.php/medicina_cuarto_mamarios/json_ExtraerTodo",function(medicina_cuarto_mamario){
                               var mcm = JSON.parse(medicina_cuarto_mamario);
                formulario    += "<label>Cuartos Mamarios:</label>";
                formulario    += "<select class='form-control' id='cuama'>";
                for (var i = 0; i < mcm.length; i++) {
                     var seleccion = "";
                    if(est!=1){
                          if(data[0].sec_cuarto_mamarios == mcm[i].mecu_id){
                             seleccion = "selected";
                           }
                    }
                    formulario    += "<option "+seleccion+" value='"+mcm[i].mecu_id+"'>"+mcm[i].mecu_descripcion+"</option>";
                }
                formulario    += "</select>";
                var ant = "";
                 if(est!=1){
                     thedate = data[0].sec_fecha_evento.split(" ");
                     ant = "value='"+thedate[0]+"'";
                 }
                formulario    += "<label>Fecha:</label>";
                formulario    += "<input "+ant+" type='date'class='form-control' id='fecha_evento' name='fecha_evento' step='1' min='"+fecha_min+"' max='"+fecha_max+"' />";
 
                $("#content-form").html(formulario); 
                    pie_formulario(est);
                $("#myModal").modal("show");
                 });
                break;
            case '13':
                $.post(base+"index.php/causa_rechazo/json_ExtraerTodo",function(causa_rechazo){
                    var crr = JSON.parse(causa_rechazo);

                    formulario    += "<label>Causa Rechazo:</label>";
                    formulario    += "<select class='form-control' id='caure'>";
                    for (var i = 0; i < crr.length; i++) {
                        var seleccion = "";
                        if(est!=1){
                          if(data[0].recha_causa_rechazo == crr[i].cr_id){
                             seleccion = "selected";
                           }
                    }
                        formulario    += "<option "+seleccion+" value='"+crr[i].cr_id+"'>"+crr[i].cr_descripcion+"</option>";
                    }
                    formulario    += "</select>";
                    var ant = "";
                    if(est!=1){
                        thedate = data[0].recha_fecha_evento.split(" ");
                        ant = "value='"+thedate[0]+"'";
                    }
                    formulario    += "<label>Fecha:</label>";
                    formulario    += "<input "+ant+" type='date'class='form-control' name='fecha_evento' id='fecha_evento' step='1' min='"+fecha_min+"' max='"+fecha_max+"' />";
                    
                    $("#content-form").html(formulario); 
                      pie_formulario(est);
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
                            
                                $("#reTabla").load(base+"index.php/calendario/mostrarTabla/"+$("#anio").val());
                            });
                        });
                    }else{
                        var id_evento = $("#id_evento").val();
                        $.post(base+"index.php/eventos/json_Editar",{id:id_evento,eve_fecha:fecha},function(){
                            var id = $("#id_tabla").val();
                            $.post(base+"index.php/aborto/json_Editar",{id:id,animal:animal,cauabor:cuabor,fecha:fecha},function(){
                                $("#reTabla").load(base+"index.php/calendario/mostrarTabla/"+$("#anio").val());                 
                            });
                        });
                    }
                    break;
                case '2':
                    var animal = $("#animal").val();
                    var tipo_analisis = $("#tipan").val();
                    var resul_analisis = $("#resan").val();
                    var fecha = $("#fecha_evento").val();
                    if(est=='1'){
                        $.post(base+"index.php/analisis/json_Nuevo",{animal:animal,tipana:tipo_analisis,resultado_ana:resul_analisis,fecha:fecha},function(valor){
                            var obj = JSON.parse(valor);
                            var id_tabla = obj[0];
                            var sim_id = num_evento;
                            $.post(base+"index.php/eventos/json_Nuevo",{id_tabla:id_tabla,sim_id:sim_id,ani_id:animal,eve_fecha:fecha},function(){
                                $("#reTabla").load(base+"index.php/calendario/mostrarTabla/"+$("#anio").val());
                            });
                        });
                    }else{
                        var id_evento = $("#id_evento").val();
                        $.post(base+"index.php/eventos/json_Editar",{id:id_evento,eve_fecha:fecha},function(){
                            var id = $("#id_tabla").val();
                            $.post(base+"index.php/analisis/json_Editar",{id:id,animal:animal,tipana:tipo_analisis,resultado_ana:resul_analisis,fecha:fecha},function(){
                                $("#reTabla").load(base+"index.php/calendario/mostrarTabla/"+$("#anio").val());                 
                            });
                        });
                    }
                    break;
                case '3':
                    var animal = $("#animal").val();
                    var causa_no_inseminal = $("#cni").val();
                    var medicina_genital = $("#medget").val();
                    var via_aplicacion = $("#viaap").val();
                    var fecha = $("#fecha_evento").val();

                    if(est=='1'){

                        $.post(base+"index.php/celo/json_Nuevo",{rp:animal,cni:causa_no_inseminal,medget:medicina_genital,viaap:via_aplicacion,fecha:fecha},function(valor){
                            var obj = JSON.parse(valor);
                            var id_tabla = obj[0];
                            var sim_id = num_evento;
                            $.post(base+"index.php/eventos/json_Nuevo",{id_tabla:id_tabla,sim_id:sim_id,ani_id:animal,eve_fecha:fecha},function(){
                                $("#reTabla").load(base+"index.php/calendario/mostrarTabla/"+$("#anio").val());
                            });
                        });

                    }else{
                        var id_evento = $("#id_evento").val();
                        $.post(base+"index.php/eventos/json_Editar",{id:id_evento,eve_fecha:fecha},function(){
                            var id = $("#id_tabla").val();
                            $.post(base+"index.php/celo/json_Editar",{id:id,rp:animal,cni:causa_no_inseminal,medget:medicina_genital,viaap:via_aplicacion,fecha:fecha},function(){
                                $("#reTabla").load(base+"index.php/calendario/mostrarTabla/"+$("#anio").val());                 
                            });
                        });
                    }
                    break;
                case '4':
                    var animal = $("#animal").val();
                    var tipo_enfer = $("#id_tipen").val();
                    var medicamentos = $("#id_medi").val();
                    var via_aplicacion = $("#id_viaap").val();
                    var fecha = $("#fecha_evento").val();

                    if(est=='1'){
                        $.post(base+"index.php/enfermedad/json_Nuevo",{rp:animal,tipo_enfermedad:tipo_enfer,medicamentos:medicamentos,via_aplicacion:via_aplicacion,fecha:fecha},function(valor){
                            var obj = JSON.parse(valor);
                            var id_tabla = obj[0];
                            var sim_id = num_evento;
                            $.post(base+"index.php/eventos/json_Nuevo",{id_tabla:id_tabla,sim_id:sim_id,ani_id:animal,eve_fecha:fecha},function(){
                                $("#reTabla").load(base+"index.php/calendario/mostrarTabla/"+$("#anio").val());
                            });
                        });
                     }else{
                        var id_evento = $("#id_evento").val();
                        $.post(base+"index.php/eventos/json_Editar",{id:id_evento,eve_fecha:fecha},function(){
                            var id = $("#id_tabla").val();
                            $.post(base+"index.php/enfermedad/json_Editar",{id:id,rp:animal,tipo_enfermedad:tipo_enfer,medicamentos:medicamentos,via_aplicacion:via_aplicacion,fecha:fecha},function(){
                                $("#reTabla").load(base+"index.php/calendario/mostrarTabla/"+$("#anio").val());                 
                            });
                        });
                     }
                    break;
                case '5':
                    var animal = $("#animal").val();
                    var ind_especiale = $("#indesp").val();
                    var fecha = $("#fecha_evento").val();
                    if(est=='1'){
                        $.post(base+"index.php/indicaciones_especiale/json_Nuevo",{rp:animal,indicaciones_esp:ind_especiale,fecha:fecha},function(valor){
                            var obj = JSON.parse(valor);
                            var id_tabla = obj[0];
                            var sim_id = num_evento;
                            $.post(base+"index.php/eventos/json_Nuevo",{id_tabla:id_tabla,sim_id:sim_id,ani_id:animal,eve_fecha:fecha},function(){
                                $("#reTabla").load(base+"index.php/calendario/mostrarTabla/"+$("#anio").val());   
                            });

                        });
                    }else{
                        var id_evento = $("#id_evento").val();
                        $.post(base+"index.php/eventos/json_Editar",{id:id_evento,eve_fecha:fecha},function(){
                            var id = $("#id_tabla").val();
                            $.post(base+"index.php/indicaciones_especiale/json_Editar",{id:id,rp:animal,indicaciones_esp:ind_especiale,fecha:fecha},function(){
                                $("#reTabla").load(base+"index.php/calendario/mostrarTabla/"+$("#anio").val());                 
                            });
                        });
                    }
                    break;
                case '6':
                    var animal = $("#animal").val();
                    var medicamentos = $("#medi").val();
                    var via_aplicacion = $("#viaap").val();
                    var fecha = $("#fecha_evento").val();

                    if(est=='1'){

                        $.post(base+"index.php/medicacion/json_Nuevo",{rp:animal,medicamentos:medicamentos,via_aplicacion:via_aplicacion,fecha:fecha},function(valor){
                    
                            var obj = JSON.parse(valor);
                            var id_tabla = obj[0];
                            var sim_id = num_evento;
                            $.post(base+"index.php/eventos/json_Nuevo",{id_tabla:id_tabla,sim_id:sim_id,ani_id:animal,eve_fecha:fecha},function(){
                                $("#reTabla").load(base+"index.php/calendario/mostrarTabla/"+$("#anio").val());
                            });
                        });
                    }else{
                        var id_evento = $("#id_evento").val();
                        //console.log(animal+"-"+medicamentos+"-"+via_aplicacion+"-"+fecha);
                        $.post(base+"index.php/eventos/json_Editar",{id:id_evento,eve_fecha:fecha},function(){
                            var id = $("#id_tabla").val();
                            $.post(base+"index.php/medicacion/json_Editar",{id:id,rp:animal,medicamentos:medicamentos,via_aplicacion:via_aplicacion,fecha:fecha},function(){
                                $("#reTabla").load(base+"index.php/calendario/mostrarTabla/"+$("#anio").val());                 
                            });
                        });
                    }
                    break;
                case '7':
                    var animal = $("#animal").val();
                    var especificacion_muerte = $("#espmu").val();
                    var fecha = $("#fecha_evento").val();
                    if(est=='1'){

                        $.post(base+"index.php/muerte/json_Nuevo",{rp:animal,espec_muerte:especificacion_muerte,fecha:fecha},function(valor){
                            var obj = JSON.parse(valor);
                            var id_tabla = obj[0];
                            var sim_id = num_evento;
                            $.post(base+"index.php/eventos/json_Nuevo",{id_tabla:id_tabla,sim_id:sim_id,ani_id:animal,eve_fecha:fecha},function(){
                                $("#reTabla").load(base+"index.php/calendario/mostrarTabla/"+$("#anio").val()); 
                            });
                        });
                    }else{
                        var id_evento = $("#id_evento").val();
                        $.post(base+"index.php/eventos/json_Editar",{id:id_evento,eve_fecha:fecha},function(){
                            var id = $("#id_tabla").val();
                            $.post(base+"index.php/muerte/json_Editar",{id:id,rp:animal,espec_muerte:especificacion_muerte,fecha:fecha},function(){
                                $("#reTabla").load(base+"index.php/calendario/mostrarTabla/"+$("#anio").val());                 
                            });
                        });
                    }
                    break;
                case '8':
                    var animal = $("#animal").val();
                    var fecha = $("#fecha_evento").val();
                    var estado_cria = $("#estcr").val();
                    var tipo_parto = $("#tippar").val();
                    var sexo_cria = $("#sexcr").val();
                    var servicio = $("#ser").val();

                    if(est=='1'){
                        $.post(base+"index.php/parto/json_Nuevo",{rp:animal,fecha:fecha,estado_cria:estado_cria,tipo_parto:tipo_parto,sexo_cria:sexo_cria,servicio:servicio},function(valor){
                            var obj = JSON.parse(valor);
                            var id_tabla = obj[0];
                            var sim_id = num_evento;
                            $.post(base+"index.php/eventos/json_Nuevo",{id_tabla:id_tabla,sim_id:sim_id,ani_id:animal,eve_fecha:fecha},function(){
                                $("#reTabla").load(base+"index.php/calendario/mostrarTabla/"+$("#anio").val());    
                            });
                        });
                    }else{
                        console.log(tipo_parto);
                        var id_evento = $("#id_evento").val();
                        $.post(base+"index.php/eventos/json_Editar",{id:id_evento,eve_fecha:fecha},function(){
                            var id = $("#id_tabla").val();
                            $.post(base+"index.php/parto/json_Editar",{id:id,rp:animal,fecha:fecha,estado_cria:estado_cria,tipo_parto:tipo_parto,sexo_cria:sexo_cria,servicio:servicio},function(){
                                $("#reTabla").load(base+"index.php/calendario/mostrarTabla/"+$("#anio").val());                 
                            });
                        });   
                    }
                    break;
                case '9':
                    var animal = $("#animal").val();
                    var fecha = $("#fecha_evento").val();
                    var repro = $("#repro").val();
                    var per = $("#per").val();
                    var tipo_serv = $("#tipse").val();

                    if(est=='1'){
                        $.post(base+"index.php/servicio/json_Nuevo",{animal:animal,fecha:fecha,reproductor:repro,personal:per,tipo_servicio:tipo_serv},function(valor){
                            var obj = JSON.parse(valor);
                            var id_tabla = obj[0];
                            var sim_id = num_evento;
                            $.post(base+"index.php/eventos/json_Nuevo",{id_tabla:id_tabla,sim_id:sim_id,ani_id:animal,eve_fecha:fecha},function(){
                               $("#reTabla").load(base+"index.php/calendario/mostrarTabla/"+$("#anio").val());  
                            });
                        });
                    }else{
                        var id_evento = $("#id_evento").val();
                        $.post(base+"index.php/eventos/json_Editar",{id:id_evento,eve_fecha:fecha},function(){
                            var id = $("#id_tabla").val();
                            $.post(base+"index.php/servicio/json_Editar",{id:id,animal:animal,fecha:fecha,reproductor:repro,personal:per,tipo_servicio:tipo_serv},function(){
                                $("#reTabla").load(base+"index.php/calendario/mostrarTabla/"+$("#anio").val());                 
                            });
                        });    
                    }

                    break;
                case '10':

                    var animal = $("#animal").val();
                    var fecha = $("#fecha_evento").val();
                    var diag_utero = $("#diaut").val();
                    var enfe_ovario = $("#enfov").val();
                    var via_aplicacion = $("#viaap").val();
                    var enfe_utero = $("#enfut").val();
                    var med_genital = $("#medget").val();

                    if(est=='1'){
                        $.post(base+"index.php/tacto_rectal/json_Nuevo",{rp:animal,fecha:fecha,diag_utero:diag_utero,enfe_ovario:enfe_ovario,enfe_utero:enfe_utero,via_aplicacion:via_aplicacion,med_genital:med_genital},function(valor){
                            var obj = JSON.parse(valor);
                            var id_tabla = obj[0];
                            var sim_id = num_evento;
                            $.post(base+"index.php/eventos/json_Nuevo",{id_tabla:id_tabla,sim_id:sim_id,ani_id:animal,eve_fecha:fecha},function(){
                                $("#reTabla").load(base+"index.php/calendario/mostrarTabla/"+$("#anio").val());
                            });
                        });
                    }else{
                        var id_evento = $("#id_evento").val();
                        $.post(base+"index.php/eventos/json_Editar",{id:id_evento,eve_fecha:fecha},function(){
                            var id = $("#id_tabla").val();
                            $.post(base+"index.php/tacto_rectal/json_Editar",{id:id,rp:animal,fecha:fecha,diag_utero:diag_utero,enfe_ovario:enfe_ovario,enfe_utero:enfe_utero,via_aplicacion:via_aplicacion,med_genital:med_genital},function(){
                                $("#reTabla").load(base+"index.php/calendario/mostrarTabla/"+$("#anio").val());                 
                            });
                        });   
                    }



                    break;
                case '11':
                    var animal = $("#animal").val();
                    var fecha = $("#fecha_evento").val();
                    var espe_venta = $("#espve").val();

                    if(est=='1'){
                        $.post(base+"index.php/venta/json_Nuevo",{rp:animal,fecha:fecha,especif_venta:espe_venta},function(valor){
                            var obj = JSON.parse(valor);
                            var id_tabla = obj[0];
                            var sim_id = num_evento;
                            $.post(base+"index.php/eventos/json_Nuevo",{id_tabla:id_tabla,sim_id:sim_id,ani_id:animal,eve_fecha:fecha},function(){
                                $("#reTabla").load(base+"index.php/calendario/mostrarTabla/"+$("#anio").val());
                            });
                        });
                    }else{
                        var id_evento = $("#id_evento").val();
                        $.post(base+"index.php/eventos/json_Editar",{id:id_evento,eve_fecha:fecha},function(){
                            var id = $("#id_tabla").val();
                            $.post(base+"index.php/venta/json_Editar",{id:id,rp:animal,fecha:fecha,especif_venta:espe_venta},function(){
                                $("#reTabla").load(base+"index.php/calendario/mostrarTabla/"+$("#anio").val());                 
                            });
                        });    
                    }
                    break;
                case '12':
                    var animal = $("#animal").val();
                    var fecha = $("#fecha_evento").val();
                    var cuartos_mamarios = $("#cuama").val();
                    if(est=='1'){
                        $.post(base+"index.php/secado/json_Nuevo",{rp:animal,fecha:fecha,cuarto_mamarios:cuartos_mamarios},function(valor){
                            var obj = JSON.parse(valor);
                            var id_tabla = obj[0];
                            var sim_id = num_evento;
                            $.post(base+"index.php/eventos/json_Nuevo",{id_tabla:id_tabla,sim_id:sim_id,ani_id:animal,eve_fecha:fecha},function(){
                                $("#reTabla").load(base+"index.php/calendario/mostrarTabla/"+$("#anio").val());
                            });
                        });
                    }else{
                        var id_evento = $("#id_evento").val();
                        $.post(base+"index.php/eventos/json_Editar",{id:id_evento,eve_fecha:fecha},function(){
                            var id = $("#id_tabla").val();
                            $.post(base+"index.php/secado/json_Editar",{id:id,rp:animal,fecha:fecha,cuarto_mamarios:cuartos_mamarios},function(){
                                $("#reTabla").load(base+"index.php/calendario/mostrarTabla/"+$("#anio").val());                 
                            });
                        });   
                    }
                    break;
                case '13':
                    var animal = $("#animal").val();
                    var fecha = $("#fecha_evento").val();
                    var causa_rechazo = $("#caure").val();
                    if(est=='1'){
                        $.post(base+"index.php/rechazo/json_Nuevo",{rp:animal,fecha:fecha,causa_rechazo:causa_rechazo},function(valor){
                            var obj = JSON.parse(valor);
                            var id_tabla = obj[0];
                            var sim_id = num_evento;
                            $.post(base+"index.php/eventos/json_Nuevo",{id_tabla:id_tabla,sim_id:sim_id,ani_id:animal,eve_fecha:fecha},function(){
                                $("#reTabla").load(base+"index.php/calendario/mostrarTabla/"+$("#anio").val());
                            });
                        });
                    }else{
                        var id_evento = $("#id_evento").val();
                        $.post(base+"index.php/eventos/json_Editar",{id:id_evento,eve_fecha:fecha},function(){
                            var id = $("#id_tabla").val();
                            $.post(base+"index.php/rechazo/json_Editar",{id:id,rp:animal,fecha:fecha,causa_rechazo:causa_rechazo},function(){
                                $("#reTabla").load(base+"index.php/calendario/mostrarTabla/"+$("#anio").val());
                                                 
                            });
                        });    
                    }
                    break;
            }    
            $("#myModal").modal("hide");

    }
    function editarEvento(id,base2){
            $("#id_evento").val(id);
           // alert(id);
            $.post(base2+"index.php/eventos/json_BuscarID",{id:id},function(valor){

                var obj = JSON.parse(valor);
                $("#id_tabla").val(obj[0].id_tabla);
                $("#animal").val(obj[0].ani_id);
                $.post(base2+"index.php/simbolo/json_BuscarID",{id:obj[0].sim_id},function(valor2){
                    var obj2 = JSON.parse(valor2);
                    //alert(obj2[0].evento);
                    
                    $.post(base2+"index.php/"+obj2[0].evento+"/json_BuscarID",{id:obj[0].id_tabla},function(datos){
                        var data = JSON.parse(datos);
                  //      alert(id);
                        var fec=obj[0].eve_fecha.split("-");
                        console.log(data);
                        cabecera_formulario(fec[1],base2,0);
                        mostrarFormulario(obj2[0].sim_id,data,0);
                        $("#evento").val(obj2[0].sim_id);
                    });

                });

                
            });

    }
 
    function validar_formulario(){
        frm=document.forms.form;
        cant_elementos = frm.elements.length;
        for (var i = 0; i < cant_elementos; i++) {
            var elemento = frm.elements[i]; 
            if(elemento.type=="date"){
                //alert(elemento.value);
            } 
        }
        return true;
    }
</script>

    </body>
</html>