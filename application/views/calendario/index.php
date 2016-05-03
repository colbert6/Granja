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
                            <td><?= $datos->ani_id; ?></td>
                            <td>
                                <?= $datos->ani_rp; ?>
                                <input type="hidden" id='id_animal' value="<?= $datos->ani_nombre; ?>"/>
                            </td>
                            <td><?= $datos->ani_nombre; ?></td>
                            <?php for ($j=1; $j <=12 ; $j++) { ?>
                                <td class='text-center' onclick="mostrarModal(<?php echo $i; ?>,<?php echo $j;?>,'<?php echo base_url(); ?>');" id='<?php echo $i.",".$j;?>'>

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
</style>

<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog" id="mdialTamanio">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Agregar Evento</h4>
      </div>
        <input type="hidden" id='fila' />
        <input type="hidden" id='mes' />
        <input type="hidden" id='url' />
      <div class="modal-body">

        
                <label>Evento:</label>
                <select class="form-control" id="sel1">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                  </select>
              
              
                <label>Fecha:</label>
                <div id='fecha'>

                </div>    


        
      </div>
      <div class="modal-footer">
        <button type="button" onclick='crearEvento();' class="btn btn-success" data-dismiss="modal">Guardar</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
         
      </div>
    </div>

  </div>
</div>
<script type="text/javascript">
    function daysInMonth(humanMonth, year) {
      return new Date(year || new Date().getFullYear(), humanMonth, 0).getDate();
    }
    function mostrarModal(fila,mes,url){
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
        $("#fecha").html("<input type='date'class='form-control' name='fecha_evento' step='1' min='"+anio+"-"+mex+"-01' max='"+anio+"-"+mex+"-"+dias+"' />");
        $("#myModal").modal("show");
           
    }
    function crearEvento() {
        document.getElementById($("#fila").val()+","+$("#mes").val()).innerHTML = "<img src='"+$("#url").val()+"img/calendar.png'>";
    }
    function mostrarCalendario(){
        

    }
</script>
