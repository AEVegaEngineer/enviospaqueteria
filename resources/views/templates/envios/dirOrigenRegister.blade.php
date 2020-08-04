<div class="row mt-3">
      
      <div class="col-12 col-md-4 offset-md-2">
        <p class="text-center">Departamento *</p>
        <select id="dirDepartamento" class="form-control select2 @error('dirDepartamento') is-invalid @enderror" name="dirDepartamento" value="{{ old('dirDepartamento') }}" required autocomplete="dirDepartamento" autofocus style="width:100%;">
          <option selected disabled>Seleccione...</option>
          <option value="Rawson, Villa Krause">Rawson, Villa Krause</option>
          <option value="Capital, San Juan">Capital, San Juan</option>
          <option value="Chimbas, Villa Paula Albarracín de Constanza">Chimbas, Villa Paula Albarracín de Constanza</option>
          <option value="Rivadavia">Rivadavia</option>
          <option value="Pocito, Aberastain">Pocito, Aberastain</option>
          <option value="Santa Lucía">Santa Lucía</option>
          <option value="Caucete">Caucete</option>
          <option value="Albardón, General San Martín">Albardón, General San Martín</option>
          <option value="Sarmiento, Media Agua">Sarmiento, Media Agua</option>
          <option value="Jáchal, San José de Jáchal">Jáchal, San José de Jáchal</option>
          <option value="25 de Mayo, Santa Rosa">25 de Mayo, Santa Rosa</option>
          <option value="San Martín">San Martín</option>
          <option value="9 de Julio">9 de Julio</option>
          <option value="Iglesia Rodeo">Iglesia Rodeo </option>
          <option value="Calingasta, Tamberías">Calingasta, Tamberías</option>
          <option value="Angaco, Villa del Salvador">Angaco, Villa del Salvador</option>
          <option value="Valle Fértil, San Agustín">Valle Fértil, San Agustín</option>
          <option value="Ullum, Villa Ibáñez">Ullum, Villa Ibáñez</option>
          <option value="Zonda, Villa Basilio Nievas">Zonda, Villa Basilio Nievas</option>
        </select>        

        @error('dirDepartamento')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>
      <div class="col-12 col-md-4">
        <p class="text-center">Código Postal (Zip Code) *</p>
        <input id="dirZip" type="text" class="form-control @error('dirZip') is-invalid @enderror" name="dirZip" value="{{ old('dirZip') }}" required autocomplete="dirZip" autofocus>

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
        <input id="dirLinea1" type="text" class="form-control @error('dirLinea1') is-invalid @enderror" name="dirLinea1" value="{{ old('dirLinea1') }}" required autocomplete="dirLinea1" autofocus>

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
        <input id="dirLinea2" type="text" class="form-control @error('dirLinea2') is-invalid @enderror" name="dirLinea2" value="{{ old('dirLinea2') }}" required autocomplete="dirLinea2" autofocus>

        @error('dirLinea2')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>
    </div>