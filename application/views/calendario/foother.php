
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->


        <!-- jQuery 2.0.2 -->
        <script src="<?= base_url(); ?>js/jquery-1.12.3.min.js" type="text/javascript"></script>
        <!-- Bootstrap -->
        <script src="<?= base_url(); ?>js/bootstrap.min.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="<?= base_url(); ?>js/AdminLTE/app.js" type="text/javascript"></script>

        <link href="<?= base_url(); ?>css/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
        <script src="<?= base_url(); ?>js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="<?= base_url(); ?>js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>

        <script type="text/javascript">
            $(function() {
                var fecha = new Date();
                var ano = fecha.getFullYear();
                $("#anio").val(ano);
                $("#avanzar").hide();
                $("#example1").dataTable({
                    
                    "bPaginate": true,
                    "bLengthChange": true,
                    "bFilter": true,
                    "bSort": true,
                    "bInfo": false,
                    "bAutoWidth": false,

                });
                $("#avanzar").click(function(){
                    avanz = parseInt($("#anio").val())+1;
                    //alert(avanz);
                    $("#anio").val(avanz);
                    if($("#anio").val() == ano){
                        $("#avanzar").hide();
                    }else{
                        $("#avanzar").show();
                    }
                });
                $("#retroceder").click(function(){
                    avanz = parseInt($("#anio").val())-1;
                    //alert(avanz);
                    $("#anio").val(avanz);
                    if($("#anio").val() == ano){
                        $("#avanzar").hide();
                    }else{
                        $("#avanzar").show();
                    }
                });
            });
        </script>

    </body>
</html>