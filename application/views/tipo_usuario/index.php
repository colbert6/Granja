<div class="row">
	<div class="col-md-10">
		<div class="box-body table-responsive">
			<table  id="tab" class="table table-bordered table-striped">
			    <thead>
			        <tr>
			            <th>Id</th>
			            <th>Descripcion</th>
			            <th>Acciones</th>
			        </tr>
			    </thead>
			    <tbody>
			        <?php foreach (@$tipo_usuario->result() as $datos) {	?>
			            <tr>
			                <td><?= $datos->tipusu_id; ?></td>
			                <td><?= $datos->tipusu_descripcion; ?></td> 
			                <td>
			                    <a href=<?php echo base_url()."index.php/tipo_usuario/editar/".$datos->tipusu_id; ?> class="btn  btn-minier"><i class="fa fa-pencil"></i></a>
		                		<a href=<?php echo base_url()."index.php/tipo_usuario/eliminar/".$datos->tipusu_id; ?> class="btn  btn-minier"><i class="fa fa-trash-o"></i></a>
			                </td>
			            </tr>
			        <?php } ?>
			    </tbody>
			</table>
			<div class="btn-group">
			        <a class="btn btn-primary" href="<?= base_url();?>index.php/tipo_usuario/nuevo" class="k-button">Nuevo</a>
			</div>
		</div>
 	</div>	 
</div>	
 				
