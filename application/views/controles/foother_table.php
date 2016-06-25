//</section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->


        <!-- jQuery 2.0.2 -->
        <script src="<?= base_url(); ?>js/jquery-1.12.3.min.js" type="text/javascript"></script>
        <!-- Bootstrap -->
        <script src="<?= base_url(); ?>js/bootstrap.min.js" type="text/javascript"></script>

        <!--<script src="<?= base_url(); ?>js/validaciones.js" type="text/javascript"></script>-->
        <!-- AdminLTE App -->
        <script src="<?= base_url(); ?>js/AdminLTE/app.js" type="text/javascript"></script>
        <script src="<?= base_url(); ?>js/bootstrap-datepicker.js" type="text/javascript"></script>

        <link href="<?= base_url(); ?>css/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
        
        <script src="<?= base_url(); ?>js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="<?= base_url(); ?>js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
        <script type="text/javascript"> 
         //$(function() { 
         //  $("#fecha_contol").datepicker();
         //});
            /*$('#tab').DataTable( {
                "footerCallback": function ( row, data, start, end, display ) {
                    var api = this.api(), data;
         
                    // Remove the formatting to get integer data for summation
                    var intVal = function ( i ) {
                        return typeof i === 'string' ?
                            i.replace(/[\$,]/g, '')*1 :
                            typeof i === 'number' ?
                                i : 0;
                    };
         
                    // Total over all pages
                    total = api
                        .column( 1 )
                        .data()
                        .reduce( function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0 );
         
                    // Total over this page
                    pageTotal = api
                        .column( 1, { page: 'current'} )
                        .data()
                        .reduce( function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0 );
         
                    // Update footer
                    $( api.column( 3 ).footer() ).html(
                        '$'+pageTotal +' ( $'+ total +' total)'
                    );
                    $( api.column( 4 ).footer() ).html(
                        '$'+pageTotal +' ( $'+ total +' total)'
                    );
                }
            } );*/
        </script>

    </body>
</html>