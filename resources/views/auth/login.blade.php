<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Iniciar Sesión</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="{{ route('auth.login') }}">
        <div class="modal-body">
          <div class="form-group">
            @csrf          
            <div class="row">
              <div class="col-md-12">
                <label for="usuEmail">Email:</label>
                <input type="email" class="form-control" name="usuEmail" id="usuEmail"/>
              </div>
              <div class="col-md-12">
                <label for="usuContrasena">Contraseña:</label>
                <input type="password" class="form-control" name="usuContrasena" id="usuContrasena"/>
              </div>            
            </div> 
          </div>         
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Entrar</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        </div>
      </form>      
    </div>
  </div>
</div>