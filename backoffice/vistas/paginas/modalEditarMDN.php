<!--=====================================
VENTANA MODAL EDITAR MODELO DE NEGOCIO
======================================-->
  <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-warning text-white">
            <h4 class="modal-title">EDITAR MODELO DE NEGOCIO</h4>
            <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
        </div>
       <div class="modal-body"> 
        <?php   
          require_once "../../controladores/mdn.controlador.php";
          require_once "../../modelos/mdn.modelo.php";  
            $verNota = new ControladorMDN();
            $verNota -> ctrVerActualizarMDN(); ///actualizar modelo de negocio
        ?>
       </div>
      </div>
    </div>