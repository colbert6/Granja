<?php 
	
		
	foreach ($razas->result() as $razas) {  
		echo $razas->raz_descripcion."\n";
	}

 	
 ?>

 				
    <div class="row ">
        <div class="col-xs-3">
            <a class="btn btn-primary pull-right" href="<?= base_url();?>index.php/razas/nuevo" style="margin-right: 5px;"><i class="fa fa-download"></i> Nuevo</a>
        </div>
    </div>

