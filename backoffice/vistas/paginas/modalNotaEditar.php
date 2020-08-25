<div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-success text-white">
            <h4 class="centrarContenido">EDITAR NOTA</h4>
            <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
        </div>
       <div class="modal-body"> 
       <?php   
        require_once "../../controladores/mdn.controlador.php";
        require_once "../../modelos/mdn.modelo.php";  
            $verNota = new ControladorMDN();
            $verNota -> ctrVerActualizarNotaMDN();
        ?>      
       </div>
     
    </div>
  </div>
