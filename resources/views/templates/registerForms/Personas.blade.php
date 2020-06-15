<div id="registerFormPersonas">                        
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Correo Electrónico') }}</label>

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
            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>

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
            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirma Contraseña') }}</label>

            <div class="col-md-6">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
            </div>
        </div>

        <div class="form-group row">
            <label for="perNombres" class="col-md-4 col-form-label text-md-right">{{ __('Nombres') }}</label>

            <div class="col-md-6">
                <input id="perNombres" type="text" class="form-control @error('perNombres') is-invalid @enderror" name="perNombres" value="{{ old('perNombres') }}" required autocomplete="perNombres" autofocus>

                @error('perNombres')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="perApellidos" class="col-md-4 col-form-label text-md-right">{{ __('Apellidos') }}</label>

            <div class="col-md-6">
                <input id="perApellidos" type="text" class="form-control @error('perApellidos') is-invalid @enderror" name="perApellidos" value="{{ old('perApellidos') }}" required autocomplete="perApellidos" autofocus>

                @error('perApellidos')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="perDni" class="col-md-4 col-form-label text-md-right">{{ __('DNI') }}</label>

            <div class="col-md-6">
                <input id="perDni" type="number" class="form-control @error('perDni') is-invalid @enderror" name="perDni" value="{{ old('perDni') }}" required autocomplete="perDni" autofocus>

                @error('perDni')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>  
        <div class="form-group row">
            <label for="usuTelefono" class="col-md-4 col-form-label text-md-right">{{ __('Teléfono') }}</label>

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
            <label for="usuDireccion" class="col-md-4 col-form-label text-md-right">{{ __('Dirección') }}</label>

            <div class="col-md-6">
                <input id="usuDireccion" type="text" class="form-control @error('usuDireccion') is-invalid @enderror" name="usuDireccion" value="{{ old('usuDireccion') }}" required autocomplete="usuDireccion" autofocus>

                @error('usuDireccion')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <input type="hidden" name="privilegio" value="persona">  
        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Register') }}
                </button>
            </div>
        </div>
    </form>  
</div>