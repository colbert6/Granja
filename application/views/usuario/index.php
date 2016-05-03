<div class="row">
	<div class="col-md-10">
		<div class="box-body table-responsive">
			<table  id="tab" class="table table-bordered table-striped">
			    <thead>
			        <tr>
			            <th>Id</th>
			            <th>Descripcion</th>
			            <th>Tipo de Usuario</th>
			            <th>Empleado</th>
			            <th>Acciones</th>
			        </tr>
			    </thead>
			    <tbody>
			        <?php foreach (@$usuario->result() as $datos) {	?>
			            <tr>
			                <td><?= $datos->usu_id; ?></td>
			                <td><?= $datos->usu_nombre; ?></td> 
			                <td><?= $datos->usu_tipo_usuario; ?></td> 
			                <td><?= $datos->usu_personal ?></td> 
			                <td>
			                    <a href=<?php echo base_url()."index.php/usuario/editar/".$datos->usu_id; ?> class="btn  btn-minier"><i class="fa fa-pencil"></i></a>
		                		<a href=<?php echo base_url()."index.php/usuario/eliminar/".$datos->usu_id; ?> class="btn  btn-minier"><i class="fa fa-trash-o"></i></a>
			                </td>
			            </tr>
			        <?php } ?>
			    </tbody>
			</table>
			<div class="btn-group">
			        <a class="btn btn-primary" href="<?= base_url();?>index.php/usuario/nuevo" class="k-button">Nuevo</a>
			</div>
		</div>
 	</div>	 
</div>	
 				
