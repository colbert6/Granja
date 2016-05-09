<div class="row">
	<div class="col-md-10">
		<div class="box-body table-responsive">
			<table  id="tab" class="table table-bordered table-striped">
			    <thead>
			        <tr>
			            <th>ID</th>
			            <th>DESCRIPCION</th>
			            <th>ACCIONES</th>
			        </tr>
			    </thead>
			    <tbody>
			        <?php foreach (@$tipo_registro->result() as $datos) {	?>
			            <tr>
			                <td><?= $datos->tipre_id; ?></td>
			                <td><?= $datos->tipre_descripcion; ?></td> 
			                <td>
			                    <a href=<?php echo base_url()."index.php/tipo_registro/editar/".$datos->tipre_id; ?> class="btn  btn-minier"><i class="fa fa-pencil"></i></a>
		                		<a href=<?php echo base_url()."index.php/tipo_registro/eliminar/".$datos->tipre_id; ?> class="btn  btn-minier"><i class="fa fa-trash-o"></i></a>
			                </td>
			            </tr>
			        <?php } ?>
			    </tbody>
			</table>
			<div class="btn-group">
			        <a class="btn btn-primary" href="<?= base_url();?>index.php/tipo_registro/nuevo" class="k-button">Nuevo</a>
			</div>
		</div>
 	</div>	 
</div>	
 				
