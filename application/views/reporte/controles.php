
<style type="text/css">    
th { white-space: nowrap; }
</style>
<div class="row">
    <div class="col-md-10">
        <div class="no-print">
        <div class='col-lg-2'><label>Fecha Inicio:</label></div>
        <div class='col-lg-3'>    
            <div class="input-group">
                <input type="date" onchange='asignarFecha();' class="form-control" id="fecha_inicio" name="fecha_inicio" >
            </div>
        </div>
        <div class='col-lg-2'><label>Fecha Fin:</label></div>
        <div class='col-lg-3'>    
            <div class="input-group">
                <input readonly type="date" class="form-control" id="fecha_fin" name="fecha_fin" >
            </div>
        </div>
        
            <span class="input-group-btn">
                        <button type='button' onclick="mostrarReporte('<?php echo base_url(); ?>')" name='seach' id='search-btn' class="btn btn-info btn-flat"><i class="fa fa-search"></i></button>
                </span>
        
        </div>
        <div id='mostrarDatos'>
            
        </div>
        

    </div>   
</div>  
<script type="text/javascript">
    function mostrarReporte(base){
        var fecha_ini = $("#fecha_inicio").val();
        var fecha_fin = $("#fecha_fin").val();
        if(fecha_ini!="" && fecha_fin!=""){
            $("#mostrarDatos").load(base+"index.php/reporte/mostrarTablaReporte/"+fecha_ini+"/"+fecha_fin);    
        }
    }
    function asignarFecha(){
        var fecha_ini = $("#fecha_inicio").val();
        var fecha_fin = updateDate(fecha_ini,7);
        $("#fecha_fin").val(fecha_fin);
    }
    function updateDate(fecha,days){
        fecha = new Date(fecha);
        tiempo = fecha.getTime();
        milisegundos=parseInt(days*24*60*60*1000);
        fecha.setTime(tiempo+milisegundos);
        day=fecha.getDate();
        month=fecha.getMonth()+1;
        if(day<10){dia = "0"+day;}else{dia = day;}
        if(month<10){mes = "0"+month;}else{mes = month;}
        year=fecha.getFullYear();
        fecha_final = year+"-"+mes+"-"+dia;
        return fecha_final;
    }

</script>