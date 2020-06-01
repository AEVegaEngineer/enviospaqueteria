@extends('layouts.frontLayout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Login
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
      <form method="post" action="{{ route('auth.login') }}">
          <div class="form-group">
              @csrf
              <label for="usuEmail">Correo Electrónico:</label>
              <input type="email" class="form-control" name="usuEmail" id="usuEmail"/>
          </div>

          <div class="form-group">
              <label for="usuContrasena">Contraseña:</label>
              <input type="password" class="form-control" name="usuContrasena" id="usuContrasena"/>
          </div>

          <button type="submit" class="btn btn-primary">Inicia Sesión</button>
      </form>
  </div>
</div>
@endsection