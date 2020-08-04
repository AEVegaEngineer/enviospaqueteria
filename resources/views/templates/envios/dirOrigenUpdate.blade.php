<div class="row mt-3">
      
      <div class="col-12 col-md-4 offset-md-2">
        <p class="text-center">Departamento *</p>
        <?php $departamentos = [
          "Rawson, Villa Krause",
          "Capital, San Juan",
          "Chimbas, Villa Paula Albarracín de Constanza",
          "Rivadavia",
          "Pocito, Aberastain",
          "Santa Lucía",
          "Caucete",
          "Albardón, General San Martín",
          "Sarmiento, Media Agua",
          "Jáchal, San José de Jáchal",
          "25 de Mayo, Santa Rosa",
          "San Martín",
          "9 de Julio",
          "Iglesia Rodeo",
          "Calingasta, Tamberías",
          "Angaco, Villa del Salvador",
          "Valle Fértil, San Agustín",
          "Ullum, Villa Ibáñez",
          "Zonda, Villa Basilio Nievas"
        ];?>
        {!! Form::select('dirDepartamento', $departamentos, $direccion->dirDepartamento, ['class' => 'form-control','required' => 'required']) !!}
        
        @error('dirDepartamento')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>
      <div class="col-12 col-md-4">
        <p class="text-center">Código Postal (Zip Code) *</p>
        <input id="dirZip" type="text" class="form-control @error('dirZip') is-invalid @enderror" name="dirZip" value="{{ $direccion->dirZip }}" required autocomplete="dirZip" autofocus>

        @error('dirZip')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>
      
    </div>
    <div class="row mt-3">
      <div class="col-12">
        <p class="text-center">Dirección Linea 1: Localidad / barrio, Calle, Número *</p>
        <input id="dirLinea1" type="text" class="form-control @error('dirLinea1') is-invalid @enderror" name="dirLinea1" value="{{ $direccion->dirLinea1 }}" required autocomplete="dirLinea1" autofocus>

        @error('dirLinea1')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>
    </div>
    <div class="row mt-3">
      <div class="col-12">
        <p class="text-center">Dirección Linea 2: Piso / Departamento, entre qué calles se encuentra, punto de referencia, indicaciones adicionales para encontrar el domicilio *</p>
        <input id="dirLinea2" type="text" class="form-control @error('dirLinea2') is-invalid @enderror" name="dirLinea2" value="{{ $direccion->dirLinea2 }}" required autocomplete="dirLinea2" autofocus>

        @error('dirLinea2')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>
    </div>