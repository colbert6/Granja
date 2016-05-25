
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->


        <!-- jQuery 2.0.2 -->
        <script src="<?= base_url(); ?>js/jquery-1.12.3.min.js" type="text/javascript"></script>
        <!-- Bootstrap -->
        <script src="<?= base_url(); ?>js/bootstrap.min.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="<?= base_url(); ?>js/AdminLTE/app.js" type="text/javascript"></script>


        <link href="<?= base_url(); ?>css/jQueryUI/jquery-ui-1.10.3.custom.min.css" rel="stylesheet" type="text/css" />
        <script src="<?= base_url(); ?>js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>


        <link href="<?= base_url(); ?>css/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
        <script src="<?= base_url(); ?>js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="<?= base_url(); ?>js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>

        <script type="text/javascript">
            $(document).ready(function() {
                var base = window.location.pathname.split("/");
                var base_url = "/"+base[1]+"/";
                var fecha = new Date();
                var ano = fecha.getFullYear();
                $("#anio").val(ano);
                $("#reTabla").load(base_url+"index.php/reporte/mostrarTabla/"+ano);
                $("#avanzar").click(function(){
                    avanz = parseInt($("#anio").val())+1;
                   $("#anio").val(avanz);
                    $("#reTabla").load(base_url+"index.php/reporte/mostrarTabla/"+avanz); 
                });
                $("#retroceder").click(function(){
                    avanz = parseInt($("#anio").val())-1;
                    $("#anio").val(avanz);
                    $("#reTabla").load(base_url+"index.php/reporte/mostrarTabla/"+avanz);
                
                });
                
            });
        </script>

    </body>
</html>