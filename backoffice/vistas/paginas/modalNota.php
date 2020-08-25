<div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-success text-white">
            <h4 class="centrarContenido">CREAR NOTA</h4>
            <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
        </div>
      <div class="modal-body"> 
       <form method="post">
              <p class="text-muted">Escriba la nota.</p>
               <div class="input-group mb-3">            
                <div class="input-group-prepend">
                    <span class="input-group-text">                 
                      <i class="fa fa-th-large"></i>
                    </span>
                </div>
                   <input type="text" class="form-control" placeholder="Nota" name="notaC" required />
                   <input type="hidden" value="<?php echo $_POST["id"]; ?>" name="tablaC"/>
                   <input type="hidden" value="<?php echo $_POST["id2"]; ?>" name="idPC"/>                     
              </div>
              <p class="text-muted">Elige un color para la nota.</p>
          <div class="input-group mb-3"> 
            <div class="form-group">
                   <div class="form-check">
                    <input class="form-check-input" type="radio" name="colorC" value="1" checked>
                    <label class="form-check-label">Amarillo</label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="colorC" value="2">
                    <label class="form-check-label">Naranja</label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="colorC" value="3">
                    <label class="form-check-label">Verde</label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="colorC" value="4">
                    <label class="form-check-label">Azul</label>
                  </div> 
              </div>           
          </div>           
                <input type="submit" class="btn btn-success btn-block" value="CREAR NOTA">
        </form>         
      </div>            
    </div>
</div>