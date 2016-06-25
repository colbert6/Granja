<style type="text/css">
    table {
        display: block;
        overflow-x: auto;
    }
    .numeric{
        width: 80px;
        text-align: center;
        background: none;
        border:none;
    }
    .totales{
        text-align: center;
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
        background: none;
        border:none;   
    }
    .ident{
        width: 50px;
        background: none;
        border:none;
        text-align: center;
    }
</style>

<table class="table table-bordered table-striped">
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
        <?php for ($i=1; $i <= 15; $i++) { ?>
        <tr>
            <td class="text-center"><input id='it_<?= $i; ?>' idtabla="0" readonly value='<?= $i; ?>' class="ident"/></td>
            <td><input id='f_<?= $i; ?>' type="date" class='fecha' onblur="guardar('<?= $i; ?>','<?= base_url(); ?>');" /></td>
            <td><input id='c_<?= $i; ?>' type="number" onblur="guardar('<?= $i; ?>','<?= base_url(); ?>');" style="width: 50px;"></td>
            <td>
                <select id='t_<?= $i; ?>' onblur="guardar('<?= $i; ?>','<?= base_url(); ?>');">
                     <option value=""></option>   
                     <option value="Mayor">Mayor</option>
                     <option value="Menor">Menor</option>
                </select>
            </td>
            <td>
                <select id='e_<?= $i; ?>' onblur="guardar('<?= $i; ?>','<?= base_url(); ?>');">
                     <option value=""></option>   
                     <option value="Vendido">Vendido</option>
                </select>
            </td>
            <td><input id='d_<?= $i; ?>' type='text' class='descripcion' onblur="guardar('<?= $i; ?>','<?= base_url(); ?>');"/></td>
            <td><input id='i_<?= $i; ?>' type='text' class='numeric' onblur="guardar('<?= $i; ?>','<?= base_url(); ?>');"/></td>
            <td><input id='s_<?= $i; ?>' type='text' readonly class='totales'/></td>
            <td><input id='ec_<?= $i; ?>' type='text' class='numeric' onblur="guardar('<?= $i; ?>','<?= base_url(); ?>');" /></td>
            <td><input id='em_<?= $i; ?>' type='text' class='numeric' onblur="guardar('<?= $i; ?>','<?= base_url(); ?>');"/></td>
            <td><input id='et_<?= $i; ?>' type='text' class='numeric' onblur="guardar('<?= $i; ?>','<?= base_url(); ?>');"/></td>
            <td><input id='te_<?= $i; ?>' type='text' readonly class='totales'/></td>
            <td><input id='st_<?= $i; ?>' type='text' readonly class='totales'/></td>
        </tr>
        <?php } ?>
        <tr class="warning">
            <th colspan="6" class="text-center">TOTALES</th>
            <th class="text-center"></th>
            <th class="text-center"></th>
            <th class="text-center"></th>
            <th class="text-center"></th>
            <th class="text-center"></th>
            <th class="text-center"></th>
            <th class="text-center"></th>
        </tr>
    </tbody>
</table>

<script type="text/javascript">
    function guardar(f,base) {
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
                e_transporte: data[8]
            },function(id){
                var obj = JSON.parse(id);
                
                $(String("#it_"+f)).attr("idtabla",obj);
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
                e_transporte: data[8]
            },function(){});
        }
        
    }

</script>