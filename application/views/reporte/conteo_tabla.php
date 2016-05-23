<div class="box-body table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th class='text-center' rowspan="2">item</th>
                            <th class='text-center' rowspan="2">Evento</th>
                            <th class='text-center' colspan="12">MESES </th>
                            
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
                                                if(date("m", $fecha)==$j ){
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