<div class="row">
    <div class="col-md-10">
        <div class="box-body table-responsive no-print">
            <table   class="table table-bordered table-striped">
                <thead>
                    <tr>
                  
                        <th class='text-center'>REPORTE</th>
                        <th class='text-center'>ACCION</th>
                    </tr>
                </thead>
                <tbody>
                        <tr>
                            
                           <td >Sacar por Preñez</td>
                           <td class='text-center'>
                                <button type='button' onclick="seleccionar_reporte('<?= base_url(); ?>','seca_preniez');" class="btn  btn-warning"><i class="fa fa-pencil"></i>&nbsp;&nbsp;Ver Datos</a>
                           </td>
                        </tr>
                        <tr>
                            
                           <td >Para Tacto</td>
                           <td class='text-center'>
                                <button type='button' onclick="seleccionar_reporte('<?= base_url(); ?>','para_tacto');" class="btn  btn-warning"><i class="fa fa-pencil"></i>&nbsp;&nbsp;Ver Datos</a>
                           </td>
                        </tr>
                        <tr>
                            
                           <td >A parir</td>
                           <td class='text-center'>
                                <button type='button' onclick="seleccionar_reporte('<?= base_url(); ?>','a_parir');" class="btn  btn-warning"><i class="fa fa-pencil"></i>&nbsp;&nbsp;Ver Datos</a>
                           </td> 
                        </tr>
                        <tr>
                            
                           <td >Repetidoras</td>
                           <td class='text-center'>
                                <button type='button' onclick="seleccionar_reporte('<?= base_url(); ?>','repetidoras');" class="btn  btn-warning"><i class="fa fa-pencil"></i>&nbsp;&nbsp;Ver Datos</a>
                           </td> 
                        </tr>
                        <tr>
                            
                           <td>Indicadores de Rechazo</td>
                           <td class='text-center'>
                                <button type='button' onclick="seleccionar_reporte('<?= base_url(); ?>','indicador_rechazo');" class="btn  btn-warning"><i class="fa fa-pencil"></i>&nbsp;&nbsp;Ver Datos</a>
                           </td>
                        </tr>
                </tbody>
            </table>
        </div>
        <legend><strong>RESULTADOS REPORTE</strong><button style='float: right;' type='button' class='btn btn-success' onclick="window.print()"><i class="fa fa-print"></i> Imprimir</button></legend>
        <div id='resultados'>
          <span><i>Seleccione una Reporte</i></span>
        </div>
    </div>   
</div>  

<script type="text/javascript">
    function seleccionar_reporte(base_url,metodo) {
      $("#resultados").load(base_url+"index.php/reporte/"+metodo);
    }

</script>