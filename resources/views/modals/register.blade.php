<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Registro</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
            <label for="usuTipoUsuario">Seleccione el tipo de usuario a registrar:</label><br>
            <div class="btn-group btn-group-toggle btn-block" data-toggle="buttons">            
              <label class="btn btn-primary">
              <input type="radio" id="personaRadio" autocomplete="off" value="0">
              Persona
              </label>
              <label class="btn btn-warning">
              <input type="radio" id="comercioRadio" autocomplete="off" value="1"> Comercio
              </label>
              <label class="btn btn-success">
              <input type="radio" id="shoppingRadio" autocomplete="off" value="2"> Shopping
              </label>
            </div>
          </div>
        </div>
        <div id="registerFormPersonas">
          <form method="post" action="{{ route('persona.store') }}">
            <div class="form-group">
              @csrf
              <div class="row">
                <div class="col-md-12">
                  <label for="usuEmail">Correo Electrónico:</label>
                  <input type="email" class="form-control" name="usuEmail" id="usuEmail"/>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <label for="usuContrasena">Contraseña:</label>
                  <input type="password" class="form-control" name="usuContrasena" id="usuContrasena"/>
                </div>
                <div class="col-md-6">
                  <label for="usuContrasenaConfirm">Confirme Contraseña:</label>
                  <input type="password" class="form-control" name="usuContrasenaConfirm" id="usuContrasenaConfirm"/>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <label for="perNombre">Nombres:</label>
                  <input type="text" class="form-control" name="perNombre" id="perNombre"/>
                </div>
                <div class="col-md-6">
                  <label for="perApellido">Apellidos:</label>
                  <input type="text" class="form-control" name="perApellido" id="perApellido"/>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <label for="perDni">DNI:</label>
                  <input type="text" class="form-control" name="perDni" id="perDni"/>
                </div>
                <div class="col-md-6">
                  <label for="usuTelefono">Teléfono:</label>
                  <input type="text" class="form-control" name="usuTelefono" id="usuTelefono"/>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <label for="usuDireccion">Dirección:</label>
                  <input type="text" class="form-control" name="usuDireccion" id="usuDireccion"/>
                </div>
              </div>
            </div>
            <button type="submit" class="btn btn-primary">Registrar</button>
          </form>
        </div>
        <div id="registerFormComercios">
          <form method="post" action="{{ route('comercio.store') }}">            
            <div class="form-group">
              @csrf
              <div class="row">
                <div class="col-md-12">
                  <label for="usuEmail">Correo Electrónico:</label>
                  <input type="email" class="form-control" name="usuEmail" id="usuEmail"/>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <label for="usuContrasena">Contraseña:</label>
                  <input type="password" class="form-control" name="usuContrasena" id="usuContrasena"/>
                </div>
                <div class="col-md-6">
                  <label for="usuContrasenaConfirm">Confirme Contraseña:</label> 
                  <input type="password" class="form-control" name="usuContrasenaConfirm" id="usuContrasenaConfirm"/>             
                </div>
              </div>              
              <div class="row">
                <div class="col-md-6">
                  <label for="comCuit">CUIT del Comercio:</label> 
                  <input type="text" class="form-control" name="comCuit" id="comCuit"/>            
                </div>
                <div class="col-md-6">
                  <label for="comNombre">Nombre del Comercio:</label>
                  <input type="text" class="form-control" name="comNombre" id="comNombre"/>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <label for="usuTelefono">Teléfono:</label>              
                  <input type="text" class="form-control" name="usuTelefono" id="usuTelefono"/>
                </div>
                <div class="col-md-6">
                  
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <label for="usuDireccion">Dirección:</label>
                  <input type="text" class="form-control" name="usuDireccion" id="usuDireccion"/>
                </div>
              </div>              
            </div>           

            <button type="submit" class="btn btn-primary">Registrar</button>
          </form>
        </div>
        <div id="registerFormShoppings">
          <form method="post" action="{{ route('shopping.store') }}">            
            <div class="form-group">
              @csrf
              <div class="row">
                <div class="col-md-12">
                  <label for="usuEmail">Correo Electrónico:</label>
                  <input type="email" class="form-control" name="usuEmail" id="usuEmail"/>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <label for="usuContrasena">Contraseña:</label>
                  <input type="password" class="form-control" name="usuContrasena" id="usuContrasena"/>
                </div>
                <div class="col-md-6">
                  <label for="usuContrasenaConfirm">Confirme Contraseña:</label>   
                  <input type="password" class="form-control" name="usuContrasenaConfirm" id="usuContrasenaConfirm"/>           
                </div>
              </div>              
              <div class="row">
                <div class="col-md-6">
                  <label for="shopCuit">CUIT del Shopping:</label> 
                  <input type="text" class="form-control" name="shopCuit" id="shopCuit"/>
                </div>
                <div class="col-md-6">
                  <label for="shopNombre">Nombre del Shopping:</label>
                  <input type="text" class="form-control" name="shopNombre" id="shopNombre"/>
                </div>
              </div>              
              <div class="row">
                <div class="col-md-6">
                  <label for="usuTelefono">Teléfono:</label>   
                  <input type="text" class="form-control" name="usuTelefono" id="usuTelefono"/>
                </div>
                <div class="col-md-6">
                  
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <label for="usuDireccion">Dirección:</label>
                  <input type="text" class="form-control" name="usuDireccion" id="usuDireccion"/>
                </div>
              </div>              
            </div>
            <button type="submit" class="btn btn-primary">Registrar</button>
          </form>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" id="btnMostrarLoginForm" class="btn btn-default">¿Ya estas registrado? Iniciá sesión aquí</button>
        <button type="button" class="btn btn-danger btn-small" data-dismiss="modal">Cancelar</button>        
      </div>
    </div>
  </div>
</div>