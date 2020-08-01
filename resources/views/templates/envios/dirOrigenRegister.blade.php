<div class="row mt-3">
      
      <div class="col-12 col-md-4 offset-md-2">
        <p class="text-center">Departamento *</p>
        <select id="dirDepartamento" class="form-control select2 @error('dirDepartamento') is-invalid @enderror" name="dirDepartamento" value="{{ old('dirDepartamento') }}" required autocomplete="dirDepartamento" autofocus style="width:100%;">
          <option selected disabled>Seleccione...</option>
          <option value="Rawson, Villa Krause"><b>Rawson</b> Villa Krause</option>
          <option value="Capital, San Juan"><b>Capital</b> San Juan</option>
          <option value="Chimbas, Villa Paula Albarracín de Constanza"><b>Chimbas</b> Villa Paula Albarracín de Constanza</option>
          <option value="Rivadavia"><b>Rivadavia</b> Rivadavia</option>
          <option value="Pocito, Aberastain"><b>Pocito</b> Aberastain</option>
          <option value="Santa Lucía"><b>Santa Lucía</b> Santa Lucía</option>
          <option value="Caucete"><b>Caucete</b> Caucete</option>
          <option value="Albardón, General San Martín"><b>Albardón</b> General San Martín</option>
          <option value="Sarmiento, Media Agua"><b>Sarmiento</b> Media Agua</option>
          <option value="Jáchal, San José de Jáchal"><b>Jáchal</b> San José de Jáchal</option>
          <option value="25 de Mayo, Santa Rosa"><b>25 de Mayo</b> Santa Rosa</option>
          <option value="San Martín"><b>San Martín</b> San Martín</option>
          <option value="9 de Julio"><b>9 de Julio</b> 9 de Julio</option>
          <option value="Iglesia Rodeo"><b>Iglesia Rodeo</b> </option>
          <option value="Calingasta, Tamberías"><b>Calingasta</b> Tamberías</option>
          <option value="Angaco, Villa del Salvador"><b>Angaco</b> Villa del Salvador</option>
          <option value="Valle Fértil, San Agustín"><b>Valle Fértil</b> San Agustín</option>
          <option value="Ullum, Villa Ibáñez"><b>Ullum</b> Villa Ibáñez</option>
          <option value="Zonda, Villa Basilio Nievas"><b>Zonda</b> Villa Basilio Nievas</option>
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