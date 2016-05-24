
<style type="text/css">    
th { white-space: nowrap; }
</style>
<div class="row">
    <div class="col-md-10">
        
        <div class='col-lg-2'><label>Fecha Evento:</label></div>
        <div class='col-lg-3'>    
            <div class="input-group">
                <input type="date" class="form-control" id="fecha_contol" name="fecha_contol" >
                <span class="input-group-btn">
                        <button type='button' onclick="tabla('<?php echo base_url(); ?>')" name='seach' id='search-btn' class="btn btn-info btn-flat"><i class="fa fa-search"></i></button>
                </span>
            </div>
        </div>
        
        <div id='mostrarDatos'>
            
        </div>
        
    </div>   
</div>  
<script type="text/javascript" charset="utf-8">
    function tabla(base){
        var fecha = $("#fecha_contol").val();
        if(fecha!=""){
            $("#mostrarDatos").load(base+"index.php/controles/mostrarTabla/"+fecha);    
        }
    }
</script>
