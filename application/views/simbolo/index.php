<div class="row">
	<div class="col-md-10">
		<div class="box-body table-responsive">
			<table  id="tab" class="table table-bordered table-striped">
			    <thead>
			        <tr>
			            <th>Id</th>
			            <th>Evento</th>
			            <th>Descripcion</th>
			            <th>Icono</th>
			            <th>ACIONES</th>
			        </tr>
			    </thead>
			    <tbody>
			        <?php foreach (@$simbolo->result() as $datos) {	?>
			            <tr>
			                <td><?= $datos->sim_id; ?></td>
			                <td><?= $datos->evento; ?></td> 
			                <td><?= $datos->sim_descripcion; ?></td> 
			                <td> <img src="<?php echo base_url(); ?>img/<?php echo $datos->sim_icono; ?>"></td> 
			                <td>
			                    <a href=<?php echo base_url()."index.php/simbolo/editar/".$datos->sim_id; ?> class="btn  btn-minier"><i class="fa fa-pencil"></i></a>
		                		<a href=<?php echo base_url()."index.php/simbolo/eliminar/".$datos->sim_id; ?> class="btn  btn-minier"><i class="fa fa-trash-o"></i></a>
			                </td>
			            </tr>
			        <?php } ?>
			    </tbody>
			</table>
			<div class="btn-group">
			        <a class="btn btn-primary" href="<?= base_url();?>index.php/simbolo/nuevo" class="k-button">Nuevo</a>
			</div>
		</div>
 	</div>	 
</div>	
 				
