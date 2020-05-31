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
      <form method="post" action="{{ route('tipousuario.store') }}">
          <div class="form-group">
              @csrf
              <label for="tipUsuDescripcion">Descripción del tipo de usuario:</label>
              <input type="text" class="form-control" name="tipUsuDescripcion"/>
          </div>
          <button type="submit" class="btn btn-primary">Crear tipo de usuario</button>
      </form>
  </div>
</div>
@endsection