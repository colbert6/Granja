<div class="row">
    <div class="col-md-10">
        <div class="box-body table-responsive">
          <?php foreach (@$animales->result() as $datos) {   ?>
            <div>NOMBRE&nbsp;:<?= $datos->ani_nombre; ?></div>
            <div>RP&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:<?= $datos->ani_rp; ?></div>
            <!--<a href=<?php echo base_url()."index.php/reporte/evento_animal/".$datos->ani_id; ?> class="btn  btn-minier"><i class="fa fa-trash-o"></i></a>-->
            <table  id="example2" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th rowspan='2'>#</th>
                        <th rowspan='2'>FECHA</th>
                        <th rowspan='2'>EVENTO</th>
                    </tr>
                </thead>
                <tbody>
                  <?php $i = 1; ?>
                  <?php foreach (@$eventos->result() as $eve) {   ?>
                      <?php if ($eve->id==$datos->ani_id) {   ?>
                        <tr>
                           <td><?= $i++; ?></td> 
                           <td><?= $eve->fecha; ?></td>
                           <td><?php echo strtoupper($eve->evento); ?></td> 
                        </tr>
                      <?php } ?>
                  <?php } ?>
                   
                </tbody>
            </table>
          <?php } ?>
        </div>
    </div>   
</div>  