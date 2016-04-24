<?php 

    /**
    * 
    */
    class Calendario extends CI_Controller
    {
        
        public function index()
        {
            $this->load->view("/layout/header.php");
            $this->load->view("/calendario/index.php");
            $this->load->view("/calendario/foother.php");
            
        }

    }

/*
  <link href="../../css/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
  <script src="../../js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="../../js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>

        <script type="text/javascript">
            $(function() {
                $("#example1").dataTable({
                    
                    "bPaginate": true,
                    "bLengthChange": true,
                    "bFilter": true,
                    "bSort": true,
                    "bInfo": false,
                    "bAutoWidth": false,

                });

            });
        </script> */
?>