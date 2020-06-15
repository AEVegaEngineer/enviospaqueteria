@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Registráte ahora') }}</div>

                <div class="card-body">            
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Tipo de Usuario') }}</label>

                        <div class="col-md-6">
                            <div class="btn-group btn-group-toggle btn-block" data-toggle="buttons">            
                              <label class="btn btn-primary">
                              <input required="" type="radio" name="privilegio" id="personaRadio" autocomplete="off" value="persona">
                              Persona
                              </label>
                              <label class="btn btn-warning">
                              <input required="" type="radio" name="privilegio" id="comercioRadio" autocomplete="off" value="comercio"> Comercio
                              </label>
                              <label class="btn btn-success">
                              <input required="" type="radio" name="privilegio" id="shoppingRadio" autocomplete="off" value="shopping"> Shopping
                              </label>
                            </div>

                            @error('privilegio')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>                        
                    @include('templates.registerForms.Personas')
                    @include('templates.registerForms.Comercios')
                    @include('templates.registerForms.Shoppings')
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
