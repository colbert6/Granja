<?php 
if(isset ($simbolo))  {  $datos=$simbolo->row(); }
?>
 
<div class="col-md-6">
    <div class="box box-warning">
    
        <form role="form" action="<?= base_url()."index.php/".$action ?>" method="post">
            <input name="guardar" id="guardar" type="hidden" value="1">
            <div class="box-body">
                <?php if(isset ($simbolo)){?>  
                   
                <div class="form-group">
                        <!--<label for="descripcion">Identificador</label>-->
                        <input type="hidden" required class="form-control" id="id" name="id" placeholder="Ingrese descripcion" readonly="readonly"
                           value=<?= $datos->sim_id; ?>>
                </div>
                <div class="form-group">
                    <label for="descripcion">Evento</label>
                    <input type="text" readonly="readonly" class="form-control" id="evento" name="evento" placeholder="Ingrese descripcion"
                        value="<?= $datos->evento;?>">
                </div>

                <?php } ?> 

                <div class="form-group">
                    <label for="descripcion">Descripcion</label>
                    <input type="text" required class="form-control" id="descripcion" name="descripcion" placeholder="Ingrese descripcion"
                        value="<?php if(isset ($simbolo)) echo $datos->sim_descripcion; ?>" >
                </div>
                <div class="form-group">
                    <label for="abreviacion">Icono</label>
                    
                    <div class="input-group">
                        <span class="input-group-addon"><i class="<?php if(isset ($simbolo)) echo $datos->sim_icono; ?>"  id='v_icono'></i></span>
                        <input type="text" class="form-control" name='icono' id='icono' value="<?= $datos->sim_icono;?>">
                        <span class="input-group-btn">
                                <button type='button' onclick="mostrarIconos('<?= base_url(); ?>')" name='seach' id='search-btn' class="btn btn-info btn-flat"><i class="fa fa-search"></i></button>
                        </span>
                    </div>

                </div>
                <div class="modal fade" id="myModal" role="dialog">
                    <div class="modal-dialog">
                    
                      <!-- Modal content-->
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">Lista de Iconos</h4>
                        </div>
                        <div class="modal-body" id='cuerpo'>
                          

                        </div>
                        <br><br>
                        <div class="modal-footer">

                          <button type="button" class="btn btn-success" data-dismiss="modal">Cerrar</button>
                        </div>
                      </div>
                      
                    </div>

                </div>                  
                
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </form>
    </div>

<script type="text/javascript">
    var icons = ["hfsg","fa-ambulance","fa-anchor","fa-android","fa-apple","fa-archive",
"fa-arrows-alt","fa-arrows","fa-asterisk","fa-ban","fa-barcode","fa-bars","fa-beer","fa-bell",
"fa-bitbucket-square","fa-bitbucket","fa-bolt","fa-bookmark-o","fa-bookmark","fa-book","fa-briefcase",
"fa-btc","fa-bug","fa-building-o","fa-bullhorn","fa-bullseye","fa-calendar-o","fa-calendar","fa-camera-retro",
"fa-camera","fa-certificate","fa-chain-broken","fa-chain","fa-cloud","fa-code-fork","fa-coffee","fa-cogs","fa-cog","fa-columns","fa-comment-o",
"fa-comments-o","fa-comments","fa-comment","fa-compass","fa-compress","fa-copy","fa-credit-card","fa-crop",
"fa-crosshairs","fa-css3","fa-cutlery","fa-cut","fa-dashboard","fa-dedent","fa-desktop"]
    function mostrarIconos(base_url){
      //  alert("modal");
     
        aux = 0;
        $.post(base_url+"index.php/simbolo/json_ExtraerTodo", function(data) {
            var oe = JSON.parse(data);
            console.log(oe);
               var list = "";
            for (var j = 1; j < icons.length ; j++) {
                list += "<div class='col-lg-2'>";
                est = false;
                for (var i = 0; i < oe.length; i++) {
                    ext = String("fa "+icons[j]);
                    
                    if(ext==oe[i].sim_icono){
                        est = true;
                        break;
                    }
                };
                if(est){
                    list += "<span style='background:orange;' class=\"input-group-addon\"><i class=\"fa "+icons[j]+"\"></i></span>";
                }else{
                    list += "<span onclick=\"seleccion('"+j+"')\" class=\"input-group-addon\"><i class=\"fa "+icons[j]+"\"></i></span>";    
                }              
                
                list += "</div>";
                if(j%6==0){
                    list += "<br>";
                }    
            };
            list += "<br>";    
            $("#cuerpo").html(list);
            $("#myModal").modal("show");
        });
        
    }
    function seleccion(num){
        clase=String("fa "+icons[num]);
        $("#v_icono" ).removeClass().addClass(clase);
        $("#icono").val(clase);
        $("#myModal").modal("hide");

    }
</script>