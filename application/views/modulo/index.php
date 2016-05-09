<div class="row">
	<div class="col-md-10">
		<div class="box-body table-responsive">
			<table  id="tab" class="table table-bordered table-striped">
			    <thead>
			        <tr>
			            <th>Id</th>
			            <th>Descripcion</th>
			            <th>Modulo Padre</th>
			            <th>Url</th>
			            <th>Acciones</th>
			        </tr>
			    </thead>
			    <tbody>
			        <?php foreach (@$modulo->result() as $datos) {	?>
			            <tr>
			                <td><?= $datos->mod_id; ?></td>
			                <td><?= $datos->mod_descripcion; ?></td>
			                <td><?= $datos->padre_desc; ?></td> 
			                <td><?= $datos->mod_url; ?></td>  
			                <td>
			                    <a href=<?php echo base_url()."index.php/modulo/editar/".$datos->mod_id; ?> class="btn  btn-minier"><i class="fa fa-pencil"></i></a>
		                		<a href=<?php echo base_url()."index.php/modulo/eliminar/".$datos->mod_id; ?> class="btn  btn-minier"><i class="fa fa-trash-o"></i></a>
			                </td>
			            </tr>
			        <?php } ?>
			    </tbody>
			</table>
			<div class="btn-group">
			        <a class="btn btn-primary" href="<?= base_url();?>index.php/modulo/nuevo" class="k-button">Nuevo</a>
			</div>
		</div>
 	</div>	 
</div>	
 				
