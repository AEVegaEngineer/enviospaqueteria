@extends('layouts.frontLayout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Agrega un tipo de usuario
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
      <form method="post" action="{{ route('auth.store') }}">
          <div class="form-group">
              @csrf
              <label for="usuEmail">Correo Electrónico:</label>
              <input type="email" class="form-control" name="usuEmail" id="usuEmail"/>
          </div>

          <div class="form-group">
              <label for="usuContrasena">Contraseña:</label>
              <input type="password" class="form-control" name="usuContrasena" id="usuContrasena"/>
          </div>

          <div class="form-group">
              <label for="usuContrasenaConfirm">Confirme Contraseña:</label>
              <input type="password" class="form-control" name="usuContrasenaConfirm" id="usuContrasenaConfirm"/>
          </div>

          <div class="form-group">
              <label for="usuNombre">Nombres:</label>
              <input type="text" class="form-control" name="usuNombre" id="usuNombre"/>
          </div>

          <div class="form-group">
              <label for="usuApellido">Apellidos:</label>
              <input type="text" class="form-control" name="usuApellido" id="usuApellido"/>
          </div>

          <div class="form-group">
              <label for="usuDni">DNI:</label>
              <input type="text" class="form-control" name="usuDni" id="usuDni"/>
          </div>

          <div class="form-group">
              <label for="usuDireccion">Dirección:</label>
              <input type="text" class="form-control" name="usuDireccion" id="usuDireccion"/>
          </div>

          <button type="submit" class="btn btn-primary">Crear Usuario</button>
      </form>
  </div>
</div>
@endsection