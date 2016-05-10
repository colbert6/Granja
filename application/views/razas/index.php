<div class="row">
	<div class="col-md-10">
		<div class="box-body table-responsive">
			<table  id="tab" class="table table-bordered table-striped">
			    <thead>
			        <tr>
			            <th>ID</th>
			            <th>DESCRIPCION</th>
			            <th>ABREVIACION</th>
			            <th>ACIONES</th>
			        </tr>
			    </thead>
			    <tbody>
			        <?php foreach (@$razas->result() as $datos) {	?>
			            <tr>
			                <td><?= $datos->raz_id; ?></td>
			                <td><?= $datos->raz_descripcion; ?></td> 
			                <td><?= $datos->raz_abreviacion; ?></td> 
			                <td>
			                    <a href=<?php echo base_url()."index.php/razas/editar/".$datos->raz_id; ?> class="btn  btn-minier"><i class="fa fa-pencil"></i></a>
		                		<a href=<?php echo base_url()."index.php/razas/eliminar/".$datos->raz_id; ?> class="btn  btn-minier"><i class="fa fa-trash-o"></i></a>
			                </td>
			            </tr>
			        <?php } ?>
			    </tbody>
			</table>
			<div class="btn-group">
			        <a class="btn btn-primary" href="<?= base_url();?>index.php/razas/nuevo" class="k-button">Nuevo</a>
			</div>
			
		</div>
 	</div>	 
</div>	
 				
