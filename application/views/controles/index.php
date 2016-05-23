<style type="text/css">    
th { white-space: nowrap; }
</style>
<div class="row">
    <div class="col-md-10">
        <div class="col-md-3">
            <input type="hidden" id="t_animales" name="total_animales" value="<?php echo count($animales->result()); ?>">
            <div class="form-group">
                <label for="fechareg">Fecha Evento</label>
                <input type="date" class="form-control" id="fecha_contol" name="fecha_contol" >
            </div>
        </div>
        <br>
        <div class="box-body table-responsive">
            <table  id="tab" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>RP</th>
                        <th>NOMBRE</th>
                        <th>CONTROL 1</th>
                        <th>CONTROL 2</th>
                    </tr>
                </thead>
                
                <tbody>
                    <?php
                        $i=1;
                        foreach (@$animales->result() as $datos) {   ?>
                        <tr>
                            <td><?= $i;?><input type="hidden" name="id[]" id='id<?php echo $i; ?>' value="<?php echo $datos->ani_id; ?>"></td>
                            <td><?= $datos->ani_rp; ?></td> 
                            <td><?= $datos->ani_nombre; ?></td>
                            <td><input type="text" id='cont1<?php echo $i; ?>' name='cont1[]' onblur='sumar(this);' value="" /></td>
                            <td><input type="text"  id='cont2<?php echo $i;$i++;  ?>' name='cont2[]' onblur='sumar(this);' value="" /></td>
                        </tr>
                    <?php } ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="3" style="text-align:right">Total:</th>
                        <th><input type="text" id='cont1_t'  value="" /></th>
                        <th><input type="text" id='cont2_t'  value="" /></th>
                    </tr>
                </tfoot>
            </table>
            <div class="btn-group">
                    <a class="btn btn-primary" onclick='guardar()' class="k-button">Guardar</a>
            </div>
            
        </div>
    </div>   
</div>  
<script type="text/javascript" charset="utf-8">
    function sumar(val){
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
        /*$.post( "test.php", { 'id[]': id,'cont1[]': cont1,'cont2[]': cont2 },function(){

        });*/
    }
</script>
