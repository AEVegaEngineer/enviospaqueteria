@extends('layouts.loginLayout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="row">
  <div class="col-md-6 offset-md-3">
    
  
    <div class="card uper">
      <div class="card-header">
        Registro
      </div>
      <div class="card-body">
        @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
            </ul>
          </div><br />
        @endif
        @if(Session::has('message-error'))
          <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times</span></button>
            {{Session::get('message-error')}}
          </div>
        @endif
          <div class="row">
          <div class="col-md-12">
            <label for="usuTipoUsuario">Seleccione el tipo de usuario:</label><br>
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
    </div>
  </div>
</div>
@endsection