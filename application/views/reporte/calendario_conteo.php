<div class="row">
    <div class="col-xs-12">
                                    
        <div class="box">
            <div class="no-print"><div class="box-header">
                <h3 class="box-title">Calendario de Eventos</h3>   

                
                <div class="col-xs-6">
                    <button class="btn btn-primary" onclick="window.print();"><i class="fa fa-print"></i> Imprimir</button>
                </div>
                                           
            </div><!-- /.box-header -->
            </div> 
            <div class="box-body table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th class='text-center' rowspan="2">item</th>
                            <th class='text-center' rowspan="2">Evento</th>
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

                     foreach (@$simbolos->result() as $datos) {  
                        $i++;

                        ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?= $datos->evento; ?></td>
                            <?php for ($j=1; $j <=12 ; $j++) { ?>

                                <td class='text-center' >
                                    <?php
                                    $cont=0;
                                    foreach (@$eventos->result() as $evento) {
                                            if($evento->sim_id == $datos->sim_id){
                                                $fecha = strtotime($evento->eve_fecha);
                                                if(date("m", $fecha)==$j && date("Y", $fecha)==date("Y")){
                                                    $cont++;
                                                }
                                            } 

                                        }
                                        echo $cont;
                                    ?>

                                </td>
                            <?php } ?>

                    <?php }?>                       
                         
                        
                        
                       
                    </tbody>
                    
                </table>
            </div><!-- /.box-body -->

        </div><!-- /.box -->
    </div>
</div>
