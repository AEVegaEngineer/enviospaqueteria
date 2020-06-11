@extends('layouts.loginLayout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="row">
  <div class="col-md-4 offset-md-4">
    
  
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
        @if(Session::has('message-error'))
          <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times</span></button>
            {{Session::get('message-error')}}
          </div>
        @endif
          <form method="post" action="{{ route('auth.login') }}">
              <div class="form-group">
                  @csrf              
                  <label for="usuEmail">Email:</label>
                  <input type="email" class="form-control text-center" name="usuEmail"/>
                  <label for="usuContrasena">Contraseña:</label>
                  <input type="password" class="form-control text-center" name="usuContrasena"/>
              </div>
              <button type="submit" class="btn btn-primary center">Inicia Sesión</button>
              <br>
              <br>
              ¿No te has registrado?
              <br>
              <a href="{{ route('auth.registerForm') }}" class="btn btn-success">Registrate ahora!</a>
          </form>
      </div>
    </div>
  </div>
</div>
@endsection