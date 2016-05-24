
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
    /*function sumar(val){
        var oID = $(val).attr("id");
        var etq = oID.substr(0, 5);
        var t_animales = parseInt($("#t_animales").val());
        var t=0;
        for(var i=1;i<=t_animales;i++){
            var idv=String("#"+etq+i);
            val = $(idv).val();
            if(val!=""){
                console.log($(idv).val());
                if(isNaN($(idv).val())){
                    $(idv).focus()
                }else{
                    t+=parseFloat($(idv).val());
                }  
            }
        }
        console.log(t);
        $(String("#"+etq+"_t")).val(t);
    }
    function guardar(){
        var id = new Array();
        var cont1 = new Array();
        var cont2 = new Array();
        for (var i = 1; i <= parseInt($("#t_animales").val()); i++) {
            id.push($(String("#id"+i)).val());
            cont1.push($(String("#cont1"+i)).val());
            cont2.push($(String("#cont2"+i)).val());
        };
        for (var i = 1; i <= parseInt($("#t_animales").val()); i++) {
            console.log(id[i]+" "+cont1[i]+""+cont2[i]);
        };
        $.post( "test.php", { 'id[]': id,'cont1[]': cont1,'cont2[]': cont2 },function(){

        })
    }*/
</script>
