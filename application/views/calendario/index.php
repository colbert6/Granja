<div class="row">
    <div class="col-xs-12">
        <div class="panel panel-default">
            <div class="panel-heading text-center">
                <a href="#" id='retroceder'><img  src="<?= base_url(); ?>img/retroceder.png"/></a>
                <input id='anio' style="border:none;font-weight:bold;background-color: #f5f5f5" class="text-center" type='text' value='2016' readonly />
                <a href="#" id='avanzar'><img src="<?= base_url(); ?>img/adelantar.png"/></a>
            </div>
            <div class="panel-body" id='reTabla'> 

            <!--HASTA AQUI NOMAS-->
        </div>
          </div> 

    </div>
</div>

<style>
    #mdialTamanio{
      width: 25% !important;
    }
    .btn-event{
    	margin: 2px 0 2px 0;
    }
</style>

<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog" id="mdialTamanio">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header text-center">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <div id='cabezera'>
        	
        </div>
        
      </div>
        <input type="hidden" id='fila' />
        <input type="hidden" id='animal'/>
        <input type="hidden" id='mes' />
        <input type="hidden" id='url' />
        <input type="hidden" id='id_evento' />
        <input type="hidden" id='id_tabla' />
      <div class="modal-body">

            <form method='post' id='form' name='form'>
                <label>Evento:</label>
                <select class="form-control" id="evento">
                    <option value="1">Aborto</option>
                    <option value="2">Analisis</option>
                    <option value="3">Celo</option>
                    <option value="4">Enfermedad</option>
                    <option value="5">Indicaciones Especiales</option>
                    <option value="6">Medicacion</option>
                    <option value="7">Muerte</option>
                    <option value="8">Parto</option>
                    <option value="9">Servicio</option>
                    <option value="10">Tacto Rectal</option>
                    <option value="11">Venta</option>
                    <option value="12">Secado</option>
                    <option value="13">Rechazo</option>
                  </select>
              
              
                <!--label>Fecha:</label>
                <div id='fecha'>

                </div-->    
                <div id='content-form'>
                	
                </div>
            </form>
      </div>
      <div class="modal-footer" id='pie'>
         
      </div>
    </div>

  </div>
</div>




