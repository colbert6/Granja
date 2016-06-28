
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->


        <!-- jQuery 2.0.2 -->
        <script src="<?= base_url(); ?>js/jquery-1.12.3.min.js" type="text/javascript"></script>
        <!-- Bootstrap -->
        <script src="<?= base_url(); ?>js/bootstrap.min.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="<?= base_url(); ?>js/AdminLTE/app.js" type="text/javascript"></script>

        <link href="<?= base_url(); ?>css/datepicker-viejo.css" rel="stylesheet" type="text/css" />
        <script src="<?= base_url(); ?>js/bootstrap-datepicker-viejo.js" type="text/javascript"></script>

       <!-- <script src="<?= base_url(); ?>js/jquery.validate.min.js" type="text/javascript"></script>-->
        <script src="<?= base_url(); ?>js/bootstrap-datepicker.js" type="text/javascript"></script>
        <script src="<?= base_url(); ?>js/validaciones.js" type="text/javascript"></script>
        
        <!--<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>-->
        <script type="text/javascript">
$(function() { 
  //  $( "#fecha" ).datepicker();
  //  $( "#fechar" ).datepicker();
    $('#fecha').datepicker({
                format: "yyyy-mm-dd"
        })
          .on('changeDate', function(e) {
                    
            var fecha_ini = $("#fecha").val();
              alert(fecha_ini);
            });
    $('#fechar').datepicker({
                format: "yyyy-mm-dd"
        })
          .on('changeDate', function(e) {
                    
            var fecha_ini = $("#fechar").val();
              alert(fecha_ini);
            });
  });
</script>
    </body>
</html>