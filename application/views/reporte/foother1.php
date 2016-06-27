
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


        <link href="<?= base_url(); ?>css/jQueryUI/jquery-ui-1.10.3.custom.min.css" rel="stylesheet" type="text/css" />
        <script src="<?= base_url(); ?>js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>


        <link href="<?= base_url(); ?>css/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
        <script src="<?= base_url(); ?>js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="<?= base_url(); ?>js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
        <script src="<?= base_url(); ?>js/plugins/flot/jquery.flot.min.js" type="text/javascript"></script>
        
       <!-- <script src="<?= base_url(); ?>js/plugins/flot/jquery.flot.resize.min.js" type="text/javascript"></script>
        <script src="<?= base_url(); ?>js/plugins/flot/jquery.flot.pie.min.js" type="text/javascript"></script>-->
        <script src="<?= base_url(); ?>js/plugins/flot/jquery.flot.categories.min.js" type="text/javascript"></script>

        <script type="text/javascript">
        $(function() { 
           //$("#fecha_inicio").datepicker();

            

            $('#fecha_inicio').datepicker({
                format: "yyyy-mm-dd"
            })
                .on('changeDate', function(e) {
                    
                    var fecha_ini = $("#fecha_inicio").val();
                 //   alert(fecha_ini);
                    var fecha_fin = updateDate(fecha_ini,7);
                    $("#fecha_fin").val(fecha_fin);
                });
        });
        
         /*   $(document).ready(function() {
                var base = window.location.pathname.split("/");
                var base_url = "/"+base[1]+"/";
                var fecha = new Date();
                var ano = fecha.getFullYear();
                $("#anio").val(ano);
                $("#reTabla").load(base_url+"index.php/reporte/conteoTabla/"+ano);
                
                $("#example1").dataTable({
                    
                    "bPaginate": false,
                    "bLengthChange": true,
                    "bFilter": false,
                    "bSort": true,
                    "bInfo": false,
                    "bAutoWidth": false,
                    "oLanguage" :{
                        'sProcessing':     'Cargando...',
                        'sLengthMenu':     'Mostrar _MENU_ registros',
                        'sZeroRecords':    'No se encontraron resultados',
                        'sEmptyTable':     'Ningún dato disponible en esta tabla',
                        'sInfo':           'Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros',
                        'sInfoEmpty':      'Mostrando registros del 0 al 0 de un total de 0 registros',
                        'sInfoFiltered':   '(filtrado de un total de _MAX_ registros)',
                        'sInfoPostFix':    '',
                        'sSearch':         'Buscar:',
                        'sUrl':            '',
                        'sInfoThousands':  '',
                        'sLoadingRecords': 'Cargando...',
                        'oPaginate': {
                            'sFirst':    'Primero',
                            'sLast':     'Último',
                            'sNext':     'Siguiente',
                            'sPrevious': 'Anterior'
                        },
                        'oAria': {
                            'sSortAscending':  ': Activar para ordenar la columna de manera ascendente',
                            'sSortDescending': ': Activar para ordenar la columna de manera descendente'
                        }
                    },
                    'aaSorting': [[ 0, 'asc' ]],//ordenar
                    'iDisplayLength': 20,
                    'aLengthMenu': [[5, 10, 20], [5, 10, 20]]

                });
                $("#avanzar").click(function(){
                    avanz = parseInt($("#anio").val())+1;
                   $("#anio").val(avanz);
                    $("#reTabla").load(base_url+"index.php/reporte/conteoTabla/"+avanz); 
                });
                $("#retroceder").click(function(){
                    avanz = parseInt($("#anio").val())-1;
                    $("#anio").val(avanz);
                    $("#reTabla").load(base_url+"index.php/reporte/conteoTabla/"+avanz);
                
                });
                
            });*/
        </script>

    </body>
</html>