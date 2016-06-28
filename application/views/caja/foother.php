
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->


        <!-- jQuery 2.0.2 -->
        <script src="<?= base_url(); ?>js/jquery-1.12.3.min.js" type="text/javascript"></script>
        <!-- Bootstrap -->
        <script src="<?= base_url(); ?>js/bootstrap.min.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="<?= base_url(); ?>js/AdminLTE/app.js" type="text/javascript"></script>
        <!--<script src="<?= base_url(); ?>js/plugins/daterangepicker/moment.js" type="text/javascript"></script>
        <script src="<?= base_url(); ?>js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>-->
        

         <link href="<?= base_url(); ?>css/datepicker-viejo.css" rel="stylesheet" type="text/css" />
        <script src="<?= base_url(); ?>js/bootstrap-datepicker-viejo.js" type="text/javascript"></script>


        <link href="<?= base_url(); ?>css/jQueryUI/jquery-ui-1.10.3.custom.min.css" rel="stylesheet" type="text/css" />
        <script src="<?= base_url(); ?>js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>


        <link href="<?= base_url(); ?>css/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
        <script src="<?= base_url(); ?>js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="<?= base_url(); ?>js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>

        <script type="text/javascript">
        
            $(document).ready(function() {
				var base = window.location.pathname.split("/");
                var base_url = "/"+base[1]+"/";
                $("#retroceder").hide();
                var cont = parseInt($("#cont").val());
                $("#cont_hoja").val("HOJA # "+cont);
                $("#hoja").load(base_url+"index.php/caja/ver_hoja/"+cont);


                $("#avanzar").click(function(){
                    if(valida_paso()){
                        avanz = parseInt($("#cont").val())+1;
                        ant = parseFloat($("#st_10").val());
                        $("#cont").val(avanz);
                        $("#cont_hoja").val("HOJA # "+avanz);
                        $("#hoja").load(base_url+"index.php/caja/ver_hoja/"+avanz+"/"+ant);
                       if($("#cont").val()>1){
                            $("#retroceder").show();
                        }
                    }else{
                        alert("Hay Campos Vacios en la Hoja");
                    }
                    
                    
                });

                $("#retroceder").click(function(){
                    retro = parseInt($("#cont").val())-1;
                    $("#cont").val(retro);
                    $("#cont_hoja").val("HOJA # "+retro);
                    $("#hoja").load(base_url+"index.php/caja/ver_hoja/"+retro); 
                    if($("#cont").val()==1){
                        $("#retroceder").hide();
                    }
                    
                    
                });

            });

        </script>

    </body>
</html>