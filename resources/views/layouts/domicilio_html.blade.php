
                    <div class="row" id="domicilio">
                      <div class="col-md-4 mb-4">
                        <label for="pais">País: <code>*</code></label>
                        <select tabindex="{{ ++$tabindex }}" class="form-control @error('pais') is-invalid @enderror" id="pais" name="pais" required="required">
                            <option value="">Seleccione...</option>
                            @foreach($declaracion->catalogo->paises() as $pais)
                            <option value="{{ $pais->ISO2 }}">
                              {{ $pais->ESPANOL }}
                            </option>
                            @endforeach
                          </select>
                        @error('pais')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-4 mb-3" id="div_entidadFederativa">
                        <label for="entidadFederativa">Estado: <code>*</code></label>
                        <select class="form-control @error('entidadFederativa') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="entidadFederativa" name="entidadFederativa">
                          <option value="">Seleccionar:</option>
                          @foreach($declaracion->catalogo->inegiEntidades() as $entidad)
                          <option value="{{ $entidad->Cve_Ent }}">
                            {{ $entidad->Nom_Ent }}
                          </option>
                          @endforeach
                        </select>
                        @error('entidadFederativa')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-4 mb-3" id="div_municipioAlcaldia">
                        <label for="municipioAlcaldia">Municipio: <code>*</code></label>
                        <select class="form-control @error('municipioAlcaldia') is-invalid @enderror" id="municipioAlcaldia" name="municipioAlcaldia" tabindex="{{ ++$tabindex }}">
                          <option value="">Seleccionar:</option>
                        </select>
                        @error('municipioAlcaldia')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-4 mb-3" id="div_coloniaLocalidad">
                        <label for="coloniaLocalidad">Colonia: <code>*</code></label>
                        <select class="form-control @error('coloniaLocalidad') is-invalid @enderror" tabindex="{{ ++$tabindex }}" name="coloniaLocalidad" id="coloniaLocalidad" >
                          <option value="">Seleccionar:</option>
                        </select>
                        @error('coloniaLocalidad')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-4 mb-3" id="div_estadoProvincia">
                        <label for="estadoProvincia">Estado/Provincia:<code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('estadoProvincia') is-invalid @enderror" id="estadoProvincia" name="estadoProvincia" placeholder=""
                        @if(old('estadoProvincia'))
                          value="{{ old('estadoProvincia') }}"
                        @elseif(isset(Route::current()->parameters()['subformatoSlug']))
                        @else
                          @isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['domicilioExtranjero']['estadoProvincia'])
                            value="{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['domicilioExtranjero']['estadoProvincia'] }}"
                          @endisset
                        @endif
                        maxlength="65">
                        @error('estadoProvincia')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-4 mb-3" id="div_ciudadLocalidad">
                        <label for="ciudadLocalidad">Ciudad/Localidad: <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('ciudadLocalidad') is-invalid @enderror" id="ciudadLocalidad" name="ciudadLocalidad" placeholder=""
                        @if(old('ciudadLocalidad'))
                          value="{{ old('ciudadLocalidad') }}"
                        @elseif(isset(Route::current()->parameters()['subformatoSlug']))
                        @else
                          @isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['domicilioExtranjero']['ciudadLocalidad'])
                            value="{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']]['domicilioExtranjero']['ciudadLocalidad'] }}"
                          @endisset
                        @endif
                        maxlength="65">
                        @error('ciudadLocalidad')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-8 mb-3">
                        <label for="calle">Calle: <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('calle') is-invalid @enderror" id="calle" name="calle" placeholder="" maxlength="65" required>
                        @error('calle')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-4 mb-3">
                        <label for="numeroExterior">Número exterior: <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('numeroExterior') is-invalid @enderror" id="numeroExterior" name="numeroExterior" placeholder="" maxlength="5" required>
                        <code>SN (Sin número)</code>
                        @error('numeroExterior')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-4 mb-3">
                        <label for="numeroInterior">Número interior: </label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('numeroInterior') is-invalid @enderror" id="numeroInterior" name="numeroInterior" placeholder="" maxlength="4">
                        @error('numeroInterior')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-4 mb-3">
                        <label for="codigoPostal">Código postal: <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('codigoPostal') is-invalid @enderror" id="codigoPostal" name="codigoPostal" placeholder="" minLength="3" maxlength="7" required>
                        @error('codigoPostal')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>
