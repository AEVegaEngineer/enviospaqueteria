<div id="registerFormComercios">                        
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="form-group row">
            <label for="email" class="col-md-6 col-form-label text-md-right">{{ __('Correo Electrónico') }}</label>

            <div class="col-md-6">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="password" class="col-md-6 col-form-label text-md-right">{{ __('Contraseña') }}</label>

            <div class="col-md-6">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="password-confirm" class="col-md-6 col-form-label text-md-right">{{ __('Confirma Contraseña') }}</label>

            <div class="col-md-6">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
            </div>
        </div>

        <div class="form-group row">
            <label for="comNombre" class="col-md-6 col-form-label text-md-right">{{ __('Nombre del Comercio') }}</label>

            <div class="col-md-6">
                <input id="comNombre" type="text" class="form-control @error('comNombre') is-invalid @enderror" name="comNombre" value="{{ old('comNombre') }}" required autocomplete="comNombre" autofocus>

                @error('comNombre')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="comCuit" class="col-md-6 col-form-label text-md-right">{{ __('CUIT del Comercio') }}</label>

            <div class="col-md-6">
                <input id="comCuit" type="text" class="form-control @error('comCuit') is-invalid @enderror" name="comCuit" value="{{ old('comCuit') }}" required autocomplete="comCuit" autofocus>

                @error('comCuit')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="usuTelefono" class="col-md-6 col-form-label text-md-right">{{ __('Teléfono') }}</label>

            <div class="col-md-6">
                <input id="usuTelefono" type="number" class="form-control @error('usuTelefono') is-invalid @enderror" name="usuTelefono" value="{{ old('usuTelefono') }}" required autocomplete="usuTelefono" autofocus>

                @error('usuTelefono')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div> 
        <div class="form-group row">
            <label for="usuDireccion" class="col-md-6 col-form-label text-md-right">{{ __('Dirección') }}</label>

            <div class="col-md-6">
                <input id="usuDireccion" type="text" class="form-control @error('usuDireccion') is-invalid @enderror" name="usuDireccion" value="{{ old('usuDireccion') }}" required autocomplete="usuDireccion" autofocus>

                @error('usuDireccion')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div> 
        <div class="form-group row">
            <label for="comShoppingId" class="col-md-6 col-form-label text-md-right">{{ __('Si su comercio se encuentra afiliado a algún shopping registrado, seleccionálo de la lista, si no lo está o su shopping no se encuentra en la lista, seleccioná "No"') }}</label>

            <div class="col-md-6">
                {!! Form::select('comShoppingId', $comShoppingIds, null, ['class' => 'form-control','required' => 'required']) !!}

                @error('comShoppingId')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            
        </div>        
        <input type="hidden" name="privilegio" value="2">  
        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Registrar') }}
                </button>
            </div>
        </div>  
    </form>  
</div>