<div class="row">
	<div class="col-md-10">
		<div class="box-body table-responsive">
			<table  id="tab" class="table table-bordered table-striped">
			    <thead>
			        <tr>
			            <th>Id</th>
			            <th>Tipo Usuario</th>
			            <th>Acciones</th>
			        </tr>
			    </thead>
			    <tbody>
			        <?php foreach (@$tipo_usuario->result() as $datos) {	?>
			            <tr>
			                <td><?= $datos->tipusu_id; ?></td>
			                <td><?= $datos->tipusu_descripcion; ?></td>
			                <td>
			                    <a href=<?php echo base_url()."index.php/permiso/editar/".$datos->tipusu_id; ?> class="btn  btn-minier"><i class="fa fa-unlock"></i></a>
		                		
			                </td>
			            </tr>
			        <?php } ?>
			    </tbody>
			</table>
		</div>
 	</div>	 
</div>	
 				
