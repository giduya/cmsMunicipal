<fieldset id="terceros">
                    <legend>
                      <h4 class="mb-3">
                        Datos del tercero
                      </h4>
                    </legend>

                    <div class="row" id="tercero_0">
                      <div class="col-md-3 mb-3">
                        <label for="tercero_tipoPersona_0">Persona: </label>
                        <select id="tercero_tipoPersona_0" class="form-control @error('tercero.0.tipoPersona') is-invalid @enderror" tabindex="{{ ++$tabindex }}" name="tercero[0][tipoPersona]">
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->tipopersona() as $persona)
                          <option value="{{ $persona->clave }}"
                            @if(old('tercero.0.tipoPersona'))
                              @if($persona->clave == old('tercero.0.tipoPersona'))
                                selected
                              @endif
                            @elseif(isset(Route::current()->parameters()['array']))
                              @if(isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['tercero']['0']['tipoPersona']))
                                @if($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['tercero']['0']['tipoPersona'] == $persona->clave)
                                  selected
                                @endif
                              @endif
                            @endif
                          >
                            {{ $persona->valor }}
                          </option>
                          @endforeach
                        </select>
                        @error('tercero.0.tipoPersona')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-5 mb-3">
                        <label for="tercero_nombreRazonSocial_0">Nombre o razón social: </label>
                        <input id="tercero_nombreRazonSocial_0" type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('tercero.0.nombreRazonSocial') is-invalid @enderror" name="tercero[0][nombreRazonSocial]"
                        @if(old('tercero.0.nombreRazonSocial'))
                          value="{{ old('tercero.0.nombreRazonSocial') }}"
                        @elseif(isset(Route::current()->parameters()['array']))
                          @if(isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['tercero']['0']['nombreRazonSocial']))
                            value="{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['tercero']['0']['nombreRazonSocial'] }}"
                          @endif
                        @endif
                        maxlength="65">
                        @error('tercero.0.nombreRazonSocial')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-3 mb-3">
                        <label for="tercero_rfc_0">RFC: </label>
                        <input id="tercero_rfc_0" type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('tercero.0.rfc') is-invalid @enderror" name="tercero[0][rfc]"
                        @if(old('tercero.0.rfc'))
                          value="{{ old('tercero.0.rfc') }}"
                        @elseif(isset(Route::current()->parameters()['array']))
                          @if(isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['tercero']['0']['rfc']))
                            value="{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['tercero']['0']['rfc'] }}"
                          @endif
                        @endif
                        >
                        @error('tercero.0.rfc')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>

                    <div class="row" @if(isset(Route::current()->parameters()['array']))   @if(isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['tercero']['1']['tipoPersona']) or old('tercero.1.tipoPersona') or old('tercero.1.nombreRazonSocial') or old('tercero.1.rfc')) @else style="display:none;" @endif    @else   @if(old('tercero.1.tipoPersona') or old('tercero.1.nombreRazonSocial') or old('tercero.1.rfc')) @else style="display:none;" @endif    @endif id="tercero_1">
                      <div class="col-md-3 mb-3">
                        <label for="tercero_tipoPersona_1">Persona: </label>
                        <select id="tercero_tipoPersona_1" class="form-control @error('tercero.1.tipoPersona') is-invalid @enderror" tabindex="{{ ++$tabindex }}" name="tercero[1][tipoPersona]">
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->tipopersona() as $persona)
                          <option value="{{ $persona->clave }}"
                            @if(old('tercero.1.tipoPersona'))
                              @if($persona->clave == old('tercero.1.tipoPersona'))
                                selected
                              @endif
                            @elseif(isset(Route::current()->parameters()['array']))
                              @if(isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['tercero']['1']['tipoPersona']))
                                @if($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['tercero']['1']['tipoPersona'] == $persona->clave)
                                  selected
                                @endif
                              @endif
                            @endif
                          >
                            {{ $persona->valor }}
                          </option>
                          @endforeach
                        </select>
                        @error('tercero.1.tipoPersona')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-5 mb-3">
                        <label for="tercero_nombreRazonSocial_1">Nombre o razón social: </label>
                        <input id="tercero_nombreRazonSocial_1" type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('tercero.1.nombreRazonSocial') is-invalid @enderror" name="tercero[1][nombreRazonSocial]"
                        @if(old('tercero.1.nombreRazonSocial'))
                          value="{{ old('tercero.1.nombreRazonSocial') }}"
                        @elseif(isset(Route::current()->parameters()['array']))
                          @if(isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['tercero']['1']['nombreRazonSocial']))
                            value="{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['tercero']['1']['nombreRazonSocial'] }}"
                          @endif
                        @endif
                        maxlength="65">
                        @error('tercero.1.nombreRazonSocial')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-3 mb-3">
                        <label for="tercero_rfc_1">RFC: </label>
                        <input id="tercero_rfc_1" type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('tercero.1.rfc') is-invalid @enderror" name="tercero[1][rfc]"
                        @if(old('tercero.1.rfc'))
                          value="{{ old('tercero.1.rfc') }}"
                        @elseif(isset(Route::current()->parameters()['array']))
                          @if(isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['tercero']['1']['rfc']))
                            value="{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['tercero']['1']['rfc'] }}"
                          @endif
                        @endif
                        >
                        @error('tercero.1.rfc')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>

                    <div class="row" @if(isset(Route::current()->parameters()['array']))   @if(isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['tercero']['2']['tipoPersona']) or old('tercero.2.tipoPersona') or old('tercero.2.nombreRazonSocial') or old('tercero.2.rfc')) @else style="display:none;" @endif    @else   @if(old('tercero.2.tipoPersona') or old('tercero.2.nombreRazonSocial') or old('tercero.2.rfc')) @else style="display:none;" @endif    @endif id="tercero_2">
                      <div class="col-md-3 mb-3">
                        <label for="tercero_tipoPersona_2">Persona: </label>
                        <select id="tercero_tipoPersona_2" class="form-control @error('tercero.2.tipoPersona') is-invalid @enderror" tabindex="{{ ++$tabindex }}" name="tercero[2][tipoPersona]">
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->tipopersona() as $persona)
                          <option value="{{ $persona->clave }}"
                            @if($persona->clave == old('tercero.2.tipoPersona'))
                            selected
                            @elseif(isset(Route::current()->parameters()['array']))
                              @if(isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['tercero']['2']['tipoPersona']))
                                @if($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['tercero']['2']['tipoPersona'] == $persona->clave)
                                  selected
                                @endif
                              @endif
                            @endif
                          >
                            {{ $persona->valor }}
                          </option>
                          @endforeach
                        </select>
                        @error('tercero.2.tipoPersona')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-5 mb-3">
                        <label for="tercero_nombreRazonSocial_2">Nombre o razón social: </label>
                        <input id="tercero_nombreRazonSocial_2" type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('tercero.2.nombreRazonSocial') is-invalid @enderror" name="tercero[2][nombreRazonSocial]"
                        @if(old('tercero.2.nombreRazonSocial'))
                          value="{{ old('tercero.2.nombreRazonSocial') }}"
                        @elseif(isset(Route::current()->parameters()['array']))
                          @if(isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['tercero']['2']['nombreRazonSocial']))
                            value="{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['tercero']['2']['nombreRazonSocial'] }}"
                          @endif
                        @endif
                        maxlength="65">
                        @error('tercero.2.nombreRazonSocial')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-3 mb-3">
                        <label for="tercero_rfc_2">RFC: </label>
                        <input  id="tercero_rfc_2" type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('tercero.2.rfc') is-invalid @enderror" name="tercero[2][rfc]"
                        @if(old('tercero.2.rfc'))
                          value="{{ old('tercero.2.rfc') }}"
                        @elseif(isset(Route::current()->parameters()['array']))
                          @if(isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['tercero']['2']['rfc']))
                            value="{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['tercero']['2']['rfc'] }}"
                          @endif
                        @endif
                        >
                        @error('tercero.2.rfc')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>

                    <div class="row" @if(isset(Route::current()->parameters()['array']))   @if(isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['tercero']['3']['tipoPersona']) or old('tercero.3.tipoPersona') or old('tercero.3.nombreRazonSocial') or old('tercero.3.rfc')) @else style="display:none;" @endif    @else   @if(old('tercero.3.tipoPersona') or old('tercero.3.nombreRazonSocial') or old('tercero.3.rfc')) @else style="display:none;" @endif    @endif id="tercero_3">
                      <div class="col-md-3 mb-3">
                        <label for="tercero_tipoPersona_3">Persona: </label>
                        <select id="tercero_tipoPersona_3" class="form-control @error('tercero.3.tipoPersona') is-invalid @enderror" tabindex="{{ ++$tabindex }}" name="tercero[3][tipoPersona]">
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->tipopersona() as $persona)
                          <option value="{{ $persona->clave }}"
                            @if(old('tercero.3.tipoPersona'))
                              @if($persona->clave == old('tercero.3.tipoPersona'))
                                selected
                              @endif
                            @elseif(isset(Route::current()->parameters()['array']))
                              @if(isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['tercero']['3']['tipoPersona']))
                                @if($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['tercero']['3']['tipoPersona'] == $persona->clave)
                                  selected
                                @endif
                              @endif
                            @endif
                          >
                            {{ $persona->valor }}
                          </option>
                          @endforeach
                        </select>
                        @error('tercero.3.tipoPersona')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-5 mb-3">
                        <label for="tercero_nombreRazonSocial_3">Nombre o razón social: </label>
                        <input type="text" id="tercero_nombreRazonSocial_3" tabindex="{{ ++$tabindex }}" class="form-control @error('tercero.3.nombreRazonSocial') is-invalid @enderror" name="tercero[3][nombreRazonSocial]"
                        @if(old('tercero.3.nombreRazonSocial'))
                          value="{{ old('tercero.3.nombreRazonSocial') }}"
                        @elseif(isset(Route::current()->parameters()['array']))
                          @if(isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['tercero']['3']['nombreRazonSocial']))
                            value="{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['tercero']['3']['nombreRazonSocial'] }}"
                          @endif
                        @endif
                        maxlength="65">
                        @error('tercero.3.nombreRazonSocial')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-3 mb-3">
                        <label for="tercero_rfc_3">RFC: </label>
                        <input type="text" id="tercero_rfc_3" tabindex="{{ ++$tabindex }}" class="form-control @error('tercero.3.rfc') is-invalid @enderror" name="tercero[3][rfc]"
                        @if(old('tercero.3.rfc'))
                          value="{{ old('tercero.3.rfc') }}"
                        @elseif(isset(Route::current()->parameters()['array']))
                          @if(isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['tercero']['3']['rfc']))
                            value="{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['tercero']['3']['rfc'] }}"
                          @endif
                        @endif
                        >
                        @error('tercero.3.rfc')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>

                    <div class="row" @if(isset(Route::current()->parameters()['array']))   @if(isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['tercero']['4']['tipoPersona']) or old('tercero.4.tipoPersona') or old('tercero.4.nombreRazonSocial') or old('tercero.4.rfc')) @else style="display:none;" @endif    @else   @if(old('tercero.4.tipoPersona') or old('tercero.4.nombreRazonSocial') or old('tercero.4.rfc')) @else style="display:none;" @endif    @endif id="tercero_4">
                      <div class="col-md-3 mb-3">
                        <label for="tercero_tipoPersona_4">Persona: </label>
                        <select id="tercero_tipoPersona_4" class="form-control @error('tercero.4.tipoPersona') is-invalid @enderror" tabindex="{{ ++$tabindex }}" name="tercero[4][tipoPersona]">
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->tipopersona() as $persona)
                          <option value="{{ $persona->clave }}"
                            @if(old('tercero.4.tipoPersona'))
                              @if($persona->clave == old('tercero.4.tipoPersona'))
                                selected
                              @endif
                            @elseif(isset(Route::current()->parameters()['array']))
                              @if(isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['tercero']['4']['tipoPersona']))
                                @if($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['tercero']['4']['tipoPersona'] == $persona->clave)
                                  selected
                                @endif
                              @endif
                            @endif
                          >
                            {{ $persona->valor }}
                          </option>
                          @endforeach
                        </select>
                        @error('tercero.4.tipoPersona')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-5 mb-3">
                        <label for="tercero_nombreRazonSocial_4">Nombre o razón social: </label>
                        <input type="text" tabindex="{{ ++$tabindex }}" id="tercero_nombreRazonSocial_4" class="form-control @error('tercero.4.nombreRazonSocial') is-invalid @enderror" name="tercero[4][nombreRazonSocial]"
                        @if(old('tercero.4.nombreRazonSocial'))
                          value="{{ old('tercero.4.nombreRazonSocial') }}"
                        @elseif(isset(Route::current()->parameters()['array']))
                          @if(isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['tercero']['4']['nombreRazonSocial']))
                            value="{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['tercero']['4']['nombreRazonSocial'] }}"
                          @endif
                        @endif
                        maxlength="65">
                        @error('tercero.4.nombreRazonSocial')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-3 mb-3">
                        <label for="tercero_rfc_4">RFC: </label>
                        <input type="text" tabindex="{{ ++$tabindex }}" id="tercero_rfc_4" class="form-control @error('tercero.4.rfc') is-invalid @enderror" name="tercero[4][rfc]"
                        @if(old('tercero.4.rfc'))
                          value="{{ old('tercero.4.rfc') }}"
                        @elseif(isset(Route::current()->parameters()['array']))
                          @if(isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['tercero']['4']['rfc']))
                            value="{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['tercero']['4']['rfc'] }}"
                          @endif
                        @endif
                        >
                        @error('tercero.4.rfc')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                    </div>

                    <div class="row" @if(isset(Route::current()->parameters()['array']))   @if(isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['tercero']['5']['tipoPersona']) or old('tercero.5.tipoPersona') or old('tercero.5.nombreRazonSocial') or old('tercero.5.rfc')) @else style="display:none;" @endif    @else   @if(old('tercero.5.tipoPersona') or old('tercero.5.nombreRazonSocial') or old('tercero.5.rfc')) @else style="display:none;" @endif    @endif id="tercero_5">
                      <div class="col-md-3 mb-3">
                        <label for="tercero_tipoPersona_5">Persona: </label>
                        <select id="tercero_tipoPersona_5" class="form-control @error('tercero.5.tipoPersona') is-invalid @enderror" tabindex="{{ ++$tabindex }}" name="tercero[5][tipoPersona]" >
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->tipopersona() as $persona)
                          <option value="{{ $persona->clave }}"
                            @if(old('tercero.5.tipoPersona'))
                              @if($persona->clave == old('tercero.5.tipoPersona'))
                                selected
                              @endif
                            @elseif(isset(Route::current()->parameters()['array']))
                              @if(isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['tercero']['5']['tipoPersona']))
                                @if($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['tercero']['5']['tipoPersona'] == $persona->clave)
                                  selected
                                @endif
                              @endif
                            @endif
                          >
                            {{ $persona->valor }}
                          </option>
                          @endforeach
                        </select>
                        @error('tercero.5.tipoPersona')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-5 mb-3">
                        <label for="tercero_nombreRazonSocial_5">Nombre o razón social: </label>
                        <input type="text" tabindex="{{ ++$tabindex }}" id="tercero_nombreRazonSocial_5" class="form-control @error('tercero.5.nombreRazonSocial') is-invalid @enderror" name="tercero[5][nombreRazonSocial]"
                        @if(old('tercero.5.nombreRazonSocial'))
                          value="{{ old('tercero.5.nombreRazonSocial') }}"
                        @elseif(isset(Route::current()->parameters()['array']))
                          @if(isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['tercero']['5']['nombreRazonSocial']))
                            value="{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['tercero']['5']['nombreRazonSocial'] }}"
                          @endif
                        @endif
                        maxlength="65">
                        @error('tercero.5.nombreRazonSocial')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-3 mb-3">
                        <label for="tercero_rfc_5">RFC: </label>
                        <input type="text" tabindex="{{ ++$tabindex }}" id="tercero_rfc_5" class="form-control @error('tercero.5.rfc') is-invalid @enderror" name="tercero[5][rfc]"
                        @if(old('tercero.5.rfc'))
                          value="{{ old('tercero.5.rfc') }}"
                        @elseif(isset(Route::current()->parameters()['array']))
                          @if(isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['tercero']['5']['rfc']))
                            value="{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['tercero']['5']['rfc'] }}"
                          @endif
                        @endif
                        >
                        @error('tercero.5.rfc')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>

                    <div class="row" @if(isset(Route::current()->parameters()['array']))   @if(isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['tercero']['6']['tipoPersona']) or old('tercero.6.tipoPersona') or old('tercero.6.nombreRazonSocial') or old('tercero.6.rfc')) @else style="display:none;" @endif    @else   @if(old('tercero.6.tipoPersona') or old('tercero.6.nombreRazonSocial') or old('tercero.6.rfc')) @else style="display:none;" @endif    @endif id="tercero_6">
                      <div class="col-md-3 mb-3">
                        <label for="tercero_tipoPersona_6">Persona: </label>
                        <select id="tercero_tipoPersona_6" class="form-control @error('tercero.6.tipoPersona') is-invalid @enderror" tabindex="{{ ++$tabindex }}" name="tercero[6][tipoPersona]" >
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->tipopersona() as $persona)
                          <option value="{{ $persona->clave }}"
                            @if(old('tercero.6.tipoPersona'))
                              @if($persona->clave == old('tercero.6.tipoPersona'))
                                selected
                              @endif
                            @elseif(isset(Route::current()->parameters()['array']))
                              @if(isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['tercero']['6']['tipoPersona']))
                                @if($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['tercero']['6']['tipoPersona'] == $persona->clave)
                                  selected
                                @endif
                              @endif
                            @endif
                          >
                            {{ $persona->valor }}
                          </option>
                          @endforeach
                        </select>
                        @error('tercero.6.tipoPersona')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-5 mb-3">
                        <label for="tercero_nombreRazonSocial_6">Nombre o razón social: </label>
                        <input type="text" tabindex="{{ ++$tabindex }}" id="tercero_nombreRazonSocial_6" class="form-control @error('tercero.6.nombreRazonSocial') is-invalid @enderror" name="tercero[6][nombreRazonSocial]"
                        @if(old('tercero.6.nombreRazonSocial'))
                          value="{{ old('tercero.6.nombreRazonSocial') }}"
                        @elseif(isset(Route::current()->parameters()['array']))
                          @if(isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['tercero']['6']['nombreRazonSocial']))
                            value="{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['tercero']['6']['nombreRazonSocial'] }}"
                          @endif
                        @endif
                        maxlength="65">
                        @error('tercero.6.nombreRazonSocial')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-3 mb-3">
                        <label for="tercero_rfc_6">RFC: </label>
                        <input type="text" tabindex="{{ ++$tabindex }}" id="tercero_rfc_6" class="form-control @error('tercero.6.rfc') is-invalid @enderror" name="tercero[6][rfc]"
                        @if(old('tercero.6.rfc'))
                          value="{{ old('tercero.6.rfc') }}"
                        @elseif(isset(Route::current()->parameters()['array']))
                          @if(isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['tercero']['6']['rfc']))
                            value="{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['tercero']['6']['rfc'] }}"
                          @endif
                        @endif
                        >
                        @error('tercero.6.rfc')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>

                    <div class="row" @if(isset(Route::current()->parameters()['array']))   @if(isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['tercero']['7']['tipoPersona']) or old('tercero.7.tipoPersona') or old('tercero.7.nombreRazonSocial') or old('tercero.7.rfc')) @else style="display:none;" @endif    @else   @if(old('tercero.7.tipoPersona') or old('tercero.7.nombreRazonSocial') or old('tercero.7.rfc')) @else style="display:none;" @endif    @endif id="tercero_7">
                      <div class="col-md-3 mb-3">
                        <label for="tercero_tipoPersona_7">Persona: </label>
                        <select id="tercero_tipoPersona_7" class="form-control @error('tercero.7.tipoPersona') is-invalid @enderror" tabindex="{{ ++$tabindex }}" name="tercero[7][tipoPersona]">
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->tipopersona() as $persona)
                          <option value="{{ $persona->clave }}"
                            @if(old('tercero.7.tipoPersona'))
                              @if($persona->clave == old('tercero.7.tipoPersona'))
                                selected
                              @endif
                            @elseif(isset(Route::current()->parameters()['array']))
                              @if(isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['tercero']['7']['tipoPersona']))
                                @if($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['tercero']['7']['tipoPersona'] == $persona->clave)
                                  selected
                                @endif
                              @endif
                            @endif
                          >
                            {{ $persona->valor }}
                          </option>
                          @endforeach
                        </select>
                        @error('tercero.7.tipoPersona')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-5 mb-3">
                        <label for="tercero_nombreRazonSocial_7">Nombre o razón social: </label>
                        <input type="text" tabindex="{{ ++$tabindex }}" id="tercero_nombreRazonSocial_7" class="form-control @error('tercero.7.nombreRazonSocial') is-invalid @enderror" name="tercero[7][nombreRazonSocial]"
                        @if(old('tercero.7.nombreRazonSocial'))
                          value="{{ old('tercero.7.nombreRazonSocial') }}"
                        @elseif(isset(Route::current()->parameters()['array']))
                          @if(isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['tercero']['7']['nombreRazonSocial']))
                            value="{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['tercero']['7']['nombreRazonSocial'] }}"
                          @endif
                        @endif
                        maxlength="65">
                        @error('tercero.7.nombreRazonSocial')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-3 mb-3">
                        <label for="tercero_rfc_7">RFC: </label>
                        <input type="text" tabindex="{{ ++$tabindex }}" id="tercero_rfc_7" class="form-control @error('tercero.7.rfc') is-invalid @enderror" name="tercero[7][rfc]"
                        @if(old('tercero.7.rfc'))
                          value="{{ old('tercero.7.rfc') }}"
                        @elseif(isset(Route::current()->parameters()['array']))
                          @if(isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['tercero']['7']['rfc']))
                            value="{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['tercero']['7']['rfc'] }}"
                          @endif
                        @endif
                        >
                        @error('tercero.7.rfc')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>

                    <div class="row" @if(isset(Route::current()->parameters()['array']))   @if(isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['tercero']['8']['tipoPersona']) or old('tercero.8.tipoPersona') or old('tercero.8.nombreRazonSocial') or old('tercero.8.rfc')) @else style="display:none;" @endif    @else   @if(old('tercero.8.tipoPersona') or old('tercero.8.nombreRazonSocial') or old('tercero.8.rfc')) @else style="display:none;" @endif    @endif id="tercero_8">
                      <div class="col-md-3 mb-3">
                        <label for="tercero_tipoPersona_8">Persona: </label>
                        <select id="tercero_tipoPersona_8" class="form-control @error('tercero.8.tipoPersona') is-invalid @enderror" tabindex="{{ ++$tabindex }}" name="tercero[8][tipoPersona]">
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->tipopersona() as $persona)
                          <option value="{{ $persona->clave }}"
                            @if(old('tercero.8.tipoPersona'))
                              @if($persona->clave == old('tercero.8.tipoPersona'))
                                selected
                              @endif
                            @elseif(isset(Route::current()->parameters()['array']))
                              @if(isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['tercero']['8']['tipoPersona']))
                                @if($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['tercero']['8']['tipoPersona'] == $persona->clave)
                                  selected
                                @endif
                              @endif
                            @endif
                          >
                            {{ $persona->valor }}
                          </option>
                          @endforeach
                        </select>
                        @error('tercero.8.tipoPersona')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-5 mb-3">
                        <label for="tercero_nombreRazonSocial_8">Nombre o razón social: </label>
                        <input type="text" tabindex="{{ ++$tabindex }}" id="tercero_nombreRazonSocial_8" class="form-control @error('tercero.8.nombreRazonSocial') is-invalid @enderror" name="tercero[8][nombreRazonSocial]"
                        @if(old('tercero.8.nombreRazonSocial'))
                          value="{{ old('tercero.8.nombreRazonSocial') }}"
                        @elseif(isset(Route::current()->parameters()['array']))
                          @if(isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['tercero']['8']['nombreRazonSocial']))
                            value="{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['tercero']['8']['nombreRazonSocial'] }}"
                          @endif
                        @endif
                        maxlength="65">
                        @error('tercero.8.nombreRazonSocial')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-3 mb-3">
                        <label for="tercero_rfc_8">RFC: </label>
                        <input type="text" tabindex="{{ ++$tabindex }}" id="tercero_rfc_8" class="form-control @error('tercero.8.rfc') is-invalid @enderror" name="tercero[8][rfc]"
                        @if(old('tercero.8.rfc'))
                          value="{{ old('tercero.8.rfc') }}"
                        @elseif(isset(Route::current()->parameters()['array']))
                          @if(isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['tercero']['8']['rfc']))
                            value="{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['tercero']['8']['rfc'] }}"
                          @endif
                        @endif
                        >
                        @error('tercero.8.rfc')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>

                    <div class="row" @if(isset(Route::current()->parameters()['array']))   @if(isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['tercero']['9']['tipoPersona']) or old('tercero.9.tipoPersona') or old('tercero.9.nombreRazonSocial') or old('tercero.9.rfc')) @else style="display:none;" @endif    @else   @if(old('tercero.9.tipoPersona') or old('tercero.9.nombreRazonSocial') or old('tercero.9.rfc')) @else style="display:none;" @endif    @endif id="tercero_9">
                      <div class="col-md-3 mb-3">
                        <label for="tercero_tipoPersona_9">Persona: </label>
                        <select id="tercero_tipoPersona_9" class="form-control @error('tercero.9.tipoPersona') is-invalid @enderror" tabindex="{{ ++$tabindex }}" name="tercero[9][tipoPersona]">
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->tipopersona() as $persona)
                          <option value="{{ $persona->clave }}"
                            @if(old('tercero.9.tipoPersona'))
                              @if($persona->clave == old('tercero.9.tipoPersona'))
                                selected
                              @endif
                            @elseif(isset(Route::current()->parameters()['array']))
                              @if(isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['tercero']['9']['tipoPersona']))
                                @if($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['tercero']['9']['tipoPersona'] == $persona->clave)
                                  selected
                                @endif
                              @endif
                            @endif
                          >
                            {{ $persona->valor }}
                          </option>
                          @endforeach
                        </select>
                        @error('tercero.9.tipoPersona')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-5 mb-3">
                        <label for="tercero_nombreRazonSocial_9">Nombre o razón social: </label>
                        <input type="text" tabindex="{{ ++$tabindex }}" id="tercero_nombreRazonSocial_9" class="form-control @error('tercero.9.nombreRazonSocial') is-invalid @enderror" name="tercero[9][nombreRazonSocial]"
                        @if(old('tercero.9.nombreRazonSocial'))
                          value="{{ old('tercero.9.nombreRazonSocial') }}"
                        @elseif(isset(Route::current()->parameters()['array']))
                          @if(isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['tercero']['9']['nombreRazonSocial']))
                            value="{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['tercero']['9']['nombreRazonSocial'] }}"
                          @endif
                        @endif
                        maxlength="65">
                        @error('tercero.9.nombreRazonSocial')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-3 mb-3">
                        <label for="tercero_rfc_9">RFC: </label>
                        <input type="text" tabindex="{{ ++$tabindex }}" id="tercero_rfc_9" class="form-control @error('tercero.9.rfc') is-invalid @enderror" name="tercero[9][rfc]"
                        @if(old('tercero.9.rfc'))
                          value="{{ old('tercero.9.rfc') }}"
                        @elseif(isset(Route::current()->parameters()['array']))
                          @if(isset($declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['tercero']['9']['rfc']))
                            value="{{ $declaracion->declaracion[Route::current()->parameters()['tipoDeclaracion']][Route::current()->parameters()['formatoSlug']][Route::current()->parameters()['subformatoSlug']][Route::current()->parameters()['array']]['tercero']['9']['rfc'] }}"
                          @endif
                        @endif
                        >
                        @error('tercero.9.rfc')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-4 mb-3" id="div_add">
                        <button id="add" tabindex="{{ ++$tabindex }}" class="btn btn-primary btn-sm btn-block" type="button">Agregar otro tercero</button>
                      </div>
                      <div class="col-md-4 mb-3" id="div_del" style="display:none;">
                        <button id="del" tabindex="{{ ++$tabindex }}" class="btn btn-primary btn-sm btn-block" type="button">Eliminar tercero</button>
                      </div>
                    </div>

                    <p>&nbsp;</p>

                  </fieldset>
