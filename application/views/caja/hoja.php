<?php 
    $data_caja = $caja->result();
    //echo "<pre>";
    //print_r($saldo_anterior);

?>
<style type="text/css">
    table {
        display: block;
        overflow-x: auto;
    }
    .numeric{
        width: 80px;
        text-align: right;
        background: none;
        border:none;
    }
    .totales{
        text-align: right;
        width: 100px;
        background: none;
        border:none;   
    }
    .descripcion{
        width: 300px;
        background: none;
        border:none;
    }
    .fecha{
        background: block;
        border:none;   
    }
    .ident{
        width: 50px;
        background: none;
        border:none;
        text-align: center;
    }
</style>

<table id='tbl' class="table table-bordered table-striped">
    <thead>
        <tr>
            <th rowspan="2" class="text-center">#</th>
            <th rowspan="2" class="text-center">FECHA</th>
            <th rowspan="2" class="text-center">CANT.</th>
            <th rowspan="2" class="text-center">TIPO</th>
            <th rowspan="2" class="text-center">ESTADO</th>
            <th rowspan="2" class="text-center">DESCRIPCION</th>
            <th rowspan="2" class="text-center">INGRESO</th>
            <th rowspan="2" class="text-center">SALDO</th>
            <th colspan="4" class="text-center">EGRESO</th>
            <th rowspan="2" class="text-center">SALDO TOTAL</th>
        </tr>
        <tr>
            <th class="text-center">COMPRA</th>
            <th class="text-center">MED.</th>
            <th class="text-center">TRANSP.</th>
            <th class="text-center">TOTAL</th>
        </tr>
    </thead>
    <tbody>
        <input type='hidden' id='sa' value='<?= $saldo_anterior; ?>'>
        <?php $total_ant = $saldo_anterior;?>   
        <?php for ($i=1; $i <= 10; $i++) { ?>
        <tr>
            <td class="text-center"><input id='it_<?= $i; ?>' idtabla="<?php if(ISSET($data_caja[$i-1]->caj_id)){ECHO $data_caja[$i-1]->caj_id;}else{echo '0';}; ?>" readonly value='<?= $i; ?>' class="ident"/></td>
            <td><input id='f_<?= $i; ?>' type="date" value='<?php if(ISSET($data_caja[$i-1]->fecha)){ECHO $data_caja[$i-1]->fecha;}else{echo '';}; ?>' class='fechar' onblur="guardar('<?= $i; ?>','<?= base_url(); ?>',this);" /></td>
            <td><input id='c_<?= $i; ?>' type="number" onblur="guardar('<?= $i; ?>','<?= base_url(); ?>',this);" value='<?php if(ISSET($data_caja[$i-1]->cantidad)){ECHO $data_caja[$i-1]->cantidad;}else{echo '';}; ?>' style="width: 50px;"></td>
            <td>
                <select id='t_<?= $i; ?>' onblur="guardar('<?= $i; ?>','<?= base_url(); ?>',this);">
                    <?php 
                        $total_e=0;$saldo_t=0;$ingreso=0;$saldo=0; 
                        setlocale(LC_MONETARY, 'en_US');
                        $tipo = array("","Mayor","Menor");
                        if(ISSET($data_caja[$i-1]->tipo)){ 
                            for ($f=0; $f <count($tipo) ; $f++) { 
                                if($data_caja[$i-1]->tipo==$tipo[$f]){
                                   echo "<option selected value='".$tipo[$f]."'>".$tipo[$f]."</option>"; 
                               }else{
                                echo "<option value='".$tipo[$f]."'>".$tipo[$f]."</option>";
                               }
                                
                            }
                        }else{?>
                            <option value=""></option>   
                            <option value="Mayor">Mayor</option>
                            <option value="Menor">Menor</option>
                    <?php    }
                    ?>
                     
                </select>
            </td>
            <td>
            <?php 
                
            ?>
                <select id='e_<?= $i; ?>' onblur="guardar('<?= $i; ?>','<?= base_url(); ?>',this);">
                    <?php 
                        $estado = array("","Vendido");
                        if(ISSET($data_caja[$i-1]->estado)){ 
                            for ($f=0; $f <count($estado) ; $f++) { 
                                if($data_caja[$i-1]->estado==$estado[$f]){
                                   echo "<option selected value='".$estado[$f]."'>".$estado[$f]."</option>"; 
                               }else{
                                echo "<option value='".$estado[$f]."'>".$estado[$f]."</option>";
                               }
                                
                            }
                        }else{?>
                            <option  value=""></option>   
                            <option  value="Vendido">Vendido</option>
                    <?php    }
                    ?>
                     
                </select>
            </td>
            <td><input id='d_<?= $i; ?>' value='<?php if(ISSET($data_caja[$i-1]->descripcion)){ECHO $data_caja[$i-1]->descripcion;}else{echo '';}; ?>' type='text' class='descripcion' onblur="guardar('<?= $i; ?>','<?= base_url(); ?>',this);"/></td>
            <td><input id='i_<?= $i; ?>'  value='<?php if(ISSET($data_caja[$i-1]->ingreso)){ECHO $data_caja[$i-1]->ingreso;$saldo+=$data_caja[$i-1]->ingreso;}else{echo '';}; ?>' type='text' class='numeric' onblur="guardar('<?= $i; ?>','<?= base_url(); ?>',this);"/></td>
            <td><input id='s_<?= $i; ?>' value='<?php if(ISSET($data_caja[$i-1]->ingreso)){$saldo+=$total_ant; echo $saldo;}else{echo "";} ?> ' type='text' readonly class='totales'/></td>
            <td><input id='ec_<?= $i; ?>' value='<?php if(ISSET($data_caja[$i-1]->e_compra)){ECHO $data_caja[$i-1]->e_compra; $total_e +=$data_caja[$i-1]->e_compra;}else{echo '';}; ?>' type='text' class='numeric' onblur="guardar('<?= $i; ?>','<?= base_url(); ?>',this);" /></td>
            <td><input id='em_<?= $i; ?>' value='<?php if(ISSET($data_caja[$i-1]->e_medicina)){ECHO $data_caja[$i-1]->e_medicina;$total_e +=$data_caja[$i-1]->e_medicina;}else{echo '';}; ?>' type='text' class='numeric' onblur="guardar('<?= $i; ?>','<?= base_url(); ?>',this);"/></td>
            <td><input id='et_<?= $i; ?>' value='<?php if(ISSET($data_caja[$i-1]->e_transporte)){ECHO $data_caja[$i-1]->e_transporte;$total_e +=$data_caja[$i-1]->e_transporte;}else{echo '';}; ?>' type='text' class='numeric' onblur="guardar('<?= $i; ?>','<?= base_url(); ?>',this);"/></td>
            
            <td><input id='te_<?= $i; ?>' value='<?php if(ISSET($data_caja[$i-1]->ingreso)){ echo $total_e;}else{echo "";} ?>' type='text' readonly class='totales'/></td>
            <td><input id='st_<?= $i; ?>' value='<?php if(ISSET($data_caja[$i-1]->ingreso)){ echo $saldo-$total_e; }else{echo "";} ?>' type='text' readonly class='totales'/></td>
            <?php $total_ant = $saldo-$total_e;?>
        </tr>
        <?php } ?>
        
    </tbody>
</table>

<script type="text/javascript">
/*$(function() { 
        $('.fechar').datepicker({
            })
                .on('changeDate', function(e) {
                    var fecha_ini = $(".fechar").val();
                    $(".fechar").val(fecha_ini);
                });
var fecha_ini = $("#f_1").val();
                    alert(fecha_ini);
        });*/
    function guardar(f,base,c) {
        
            var ident = ["#f_", "#c_", "#t_", "#e_", "#d_", "#i_", "#ec_", "#em_", "#et_"];
            var data = new Array();
            for (var i = 0; i < ident.length; i++) {
                var dato = $(String(ident[i]+f)).val(); 
                data.push(dato);
            }
            var estado = $(String("#it_"+f)).attr("idtabla");
            if(estado=='0'){
                $.post(base+"index.php/caja/json_Nuevo",{
                    fecha:data[0],
                    cantidad:data[1],
                    tipo:data[2],
                    estado:data[3],
                    descripcion:data[4],
                    ingreso:data[5],
                    e_compra:data[6],
                    e_medicina:data[7],
                    e_transporte: data[8],
                    hoja: $("#cont").val()
                },function(id){
                    var obj = JSON.parse(id);
                    var otr = parseFloat($("#sa").val());
                    var scroll = $("#tbl").scrollLeft();
                    $("#hoja").load(base+"index.php/caja/ver_hoja/"+$("#cont").val()+"/"+otr,function(){
                        $("#tbl").scrollLeft(scroll);    
                    });
                    
                    
                });
            }else{
                $.post(base+"index.php/caja/json_Editar",{
                    id:estado,
                    fecha:data[0],
                    cantidad:data[1],
                    tipo:data[2],
                    estado:data[3],
                    descripcion:data[4],
                    ingreso:data[5],
                    e_compra:data[6],
                    e_medicina:data[7],
                    e_transporte: data[8],
                    hoja:$("#cont").val()
                },function(){
                    var otr = parseFloat($("#sa").val());
                    var scroll = $("#tbl").scrollLeft();
                    $("#hoja").load(base+"index.php/caja/ver_hoja/"+$("#cont").val()+"/"+otr,function(){
                        $("#tbl").scrollLeft(scroll);
                    }); 
                    
                    
                });
            }
        
        
    }
    function limpiar(c){
        c.value=parseFloat(c.value);    
    }
    function valida_paso(){
        var ident = ["#i_", "#ec_", "#em_", "#et_"];
        listo = true;
        for (var i = 1; i <= 10; i++) {
            for (var j = 0; j < ident.length; j++) {
                var dato = $(String(ident[j]+i)).val(); 
                if(dato==""){
                    listo=false;
                }
            }
        }
        return listo;
    }

</script>