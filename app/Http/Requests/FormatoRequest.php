<?php namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Declaracion;


class FormatoRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }





    public function messages()
    {
      return [
                'borrame.required' => 'borrame',
                /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                ////////////////////////// DATOS GENERALES
                /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			          'nombre.required'    => 'Olvidaste agregar el nombre.',
                'nombre.required_if'    => 'Olvidaste agregar el nombre.',
                'nombre.max'			    => 'El nombre no puede tener más de 65 letras.',
                'primerApellido.required'	=> 'El primer apellido es obligatorio.',
                'primerApellido.required_if'	=> 'El primer apellido es obligatorio.',
                'primerApellido.max'	=> 'El primer apellido no puede tener más de 65 letras.',
                'segundoApellido.max' => 'El segundo apellido no puede tener más de 65 letras.',
                'paisNacimiento.required'	=> 'El país de nacimiento es obligatorio.',
                'paisNacimiento.exists'	=> 'El país de nacimiento no existe en la lista dada.',
                'nacionalidad.required'	=> 'La nacionalidad es obligatoria.',
                'nacionalidad.exists'	=> 'La nacionalidad no existe en la lista dada.',
                'curp.required' => 'El CURP es obligatorio.',
                'curp.required_if' => 'El CURP es obligatorio.',
                'curp.size' => 'El CURP debe tener 18 caracteres.',
                'curp.alpha_num' => 'El CURP debe contener letras y números únicamente.',
                'rfcFisica.required' => 'El RFC es obligatorio.',
                'rfcFisica.size' => 'El RFC debe tener 10 caracteres.',
                'rfcFisica.alpha_num' => 'El RFC debe contener letras y números únicamente.',
                'homoClave.required' => 'La homoclave es obligatoria.',
                'homoClave.size' => 'La homoclave debe tener 3 caracteres.',
                'homoClave.alpha_num' => 'La homoclave debe contener letras y números únicamente.',
                'correoInstitucional.email' => 'El correo institucional no es válido.',
                'correoInstitucional.max' => 'El correo institucional no puede tener mas de 65 caracteres.',
                'correoPersonal.email' => 'El correo personal no es válido.',
                'correoPersonal.max' => 'El correo personal no puede tener mas de 65 caracteres.',
                'celular.digits' => 'El número de celular debe tener 10 dígitos numéricos.',
                'celular.required' => 'Olvidaste agregar el celular.',
                'ladaCelular.required' => 'La lada del celular es obligatoria.',
                'ladaCelular.exists' => 'La lada del celular no existe en la lista.',
                'ladaCasa.required_with' => 'La lada del teléfono de casa es obligatoria.',
                'ladaCasa.exists' => 'La lada del teléfono de casa no existe en la lista.',
                'casa.digits' => 'El número de casa debe tener 10 dígitos numéricos.',
                'situacionPersonalEstadoCivil.required'	=> 'La situación personal es obligatoria.',
                'situacionPersonalEstadoCivil.exists'	=> 'La situación personal no existe en la lista.',
                'regimenMatrimonial.required_if' => 'El régimen matrimonial es obligatorio si eres casado/a.',
                'regimenMatrimonial.exists'	=> 'El régimen matrimonial no existe en la lista.',
                /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                ////////////////////////// DOMICILIO DECLARANTE
                /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                'pais.required' => 'Olvidaste agregar el país.',
                'pais.exists' => 'El país no existe en la lista dada.',
                'municipioAlcaldia.required_if' => 'Olvidaste agregar el municipio.',
                'municipioAlcaldia.exists' => 'El municipio no existe en la lista dada.',
                'coloniaLocalidad.required_if' => 'Olvidaste agregar la colonia.',
                'coloniaLocalidad.exists' => 'La colonia no existe en la lista.',
                'calle.required' => 'Olvidaste agregar la calle.',
                'calle.max' => 'La calle no puede tener más de 65 caracteres.',
                'numeroExterior.required' => 'Olvidaste agregar tu número exterior.',
                'numeroExterior.alpha_num' => 'El número exterior no puede tener símbolos como: !-#$%&.',
                'numeroExterior.min' => 'El número exterior debe tener al menos un caracter.',
                'numeroExterior.max' => 'El número exterior debe tener máximo 5 caracteres.',
                'numeroInterior.alpha_num' => 'El número interior no puede tener símbolos como: !-#$%&.',
                'numeroInterior.max' => 'El número interior debe tener máximo 4 caracteres.',
                'numeroInterior.min' => 'El número interior debe tener al menos un caracter.',
                'estadoProvincia.required_unless' => 'Olvidaste agregar el estado provincia.',
                'ciudadLocalidad.required_unless' => 'Olvidaste agregar la ciudad/localidad.',
                'codigoPostal.required' => 'Olvidaste agregar código postal.',
                'codigoPostal.min' => 'El código postal debe tener mínimo 3 números.',
                'codigoPostal.max' => 'El código postal debe tener máximo 7 números.',
                /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                ////////////////////////// DATOS CURRICUALRES
                /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                'tipoOperacion.required' => 'El tipo de operación es obligatorio.',
                'tipoOperacion.exists' => 'El tipo de operación no existe en la lista dada.',
                'nivelClave.required' => 'Olvidaste agregar el nivel escolar.',
                'nivelClave.exists' => 'El nivel escolar no existe en la lista.',
                'carreraAreaConocimiento.required' => 'Olvidaste especificar tu carrera.',
                'carreraAreaConocimiento.max' => 'La carrera solo puede tener 65 caracteres.',
                'ubicacion.required' => 'Olvidaste indicar la ubicación.',
                'ubicacion.exists' => 'La ubicación no está en la lista dada.',
                'estatus.required' => 'Olvidaste indicar el estatus de tus estudios.',
                'estatus.exists' => 'El estatus de tus estudios no existe en la lista dada.',
                'documentoObtenido.required' => 'El documento obtenido es obligatorio.',
                'documentoObtenido.exists' => 'El documento obtenido no existe en la lista dada.',
                'fechaObtencion.required' => 'Olvidaste agregar la fecha.',
                'fechaObtencion.date' => 'La fecha no es válida.',
                'fechaObtencion.after' => 'La fecha debe ser después de 01-01-1950.',
                'fechaObtencion.before' => 'La fecha debe ser antes de hoy.',
                /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                ////////////////////////// DATOS EMPLEO CARGO COMISIÓN
                /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                'tipoOperacion.required' => 'El tipo de operación es obligatorio.',
                'tipoOperacion.exists' => 'El tipo de operación no existe en la lista dada.',
                'nombreInstitucion.required' => 'Olvidaste agregar el nombre de la institución/empresa.',
                'nombreInstitucion.required_if' => 'Olvidaste agregar el nombre de la institución/empresa.',
			          'nombreInstitucion.max' => 'El nombre no puede tener más de 65 letras.',
                'nivelOrdenGobierno.required' => 'Olvidaste agregar el nivel de gobierno.',
                'nivelOrdenGobierno.required_if' => 'Olvidaste agregar el nivel de gobierno.',
                'nivelOrdenGobierno.exists' => 'El nivel de gobierno no existe en la lista dada',
                'ambitoPublico.required_if' => 'Olvidaste agregar el ámbito público.',
                'ambitoPublico.required' => 'Olvidaste agregar el ámbito público.',
                'ambitoPublico.exists' => 'El ámbito público no existe en la lista dada',
                'areaAdscripcion.required' => 'Olvidaste agregar el nombre del area de adscripción.',
                'areaAdscripcion.required_if' => 'Olvidaste agregar el nombre del area de adscripción.',
			          'areaAdscripcion.max' => 'El nombre no puede tener más de 65 letras.',
                'empleoCargoComision.required' => 'Olvidaste agregar el empleo.',
                'empleoCargoComision.required_unless' => 'Olvidaste agregar el empleo.',
			          'empleoCargoComision.max' => 'El empleo no puede tener más de 65 letras.',
                'nivelEmpleoCargoComision.required' => 'Olvidaste agregar el nivel del empleo.',
			          'nivelEmpleoCargoComision.max' => 'El nivel no puede tener más de 65 letras.',
                'funcionPrincipal.required' => 'Olvidaste agregar la función.',
                'funcionPrincipal.required_if' => 'Olvidaste agregar la función.',
			          'funcionPrincipal.max' => 'La función no puede tener más de 65 letras.',
                'fechaTomaPosesion.required' => 'Olvidaste agregar la fecha de posesión.',
			          'fechaTomaPosesion.date' => 'La fecha de posesión no es válida.',
                'fechaTomaPosesion.after' => 'La fecha de posesión debe ser después de 01-01-2010.',
			          'fechaTomaPosesion.before' => 'La función de posesión debe ser antes de hoy.',
                'contratadoPorHonorarios.required' => 'Olvidaste especificar si fuiste contratado por honorarios.',
                'contratadoPorHonorarios.boolean' => 'La respuesta debe ser sí / no.',
                'oficinaLada.required' => 'Olvidaste agregar la LADA.',
                'oficinaLada.exists' => 'La LADA no existe en la lista dada.',
                'oficina.required' => 'El número de teléfono es obligatorio.',
                'oficina.digits_between' => 'El número de teléfono debe ser de 10 dígitos.',
                'oficinaExt.digits_between' => 'El número de extensión debe ser de 1 a 5 dígitos.',
                /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                ////////////////////////// EXPERIENCIA LABORAL
                /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                'ambitoSectorClave.required' => 'El ámbito es obligatorio.',
                'ambitoSectorClave.exists' => 'El ambito no existe en la lista dada.',
                'especifiqueAmbito.required_if' => 'Olvidaste indicar el ámbito.',
                'especifiqueAmbito.max' => 'El ámbito no debe tener más de 65 caracteres.',

                'rfcMoralHomo.required' => 'El RFC dela persona moral es obligatorio.',
                'rfcMoralHomo.required_if' => 'El RFC de la persona moral es obligatorio.',
                'rfcMoralHomo.size' => 'El RFC debe tener 12 caracteres.',
                'rfcMoralHomo.alpha_num' => 'El RFC debe contener letras y números únicamente.',

                'fechaEgreso.required' => 'Olvidaste indicar la fecha de egreso.',
                'fechaEgreso.date' => 'Ingresa una fecha valida.',
                'fechaEgreso.before' => 'La fecha debe ser antes de hoy.',
                'fechaEgreso.after' => 'La fecha debe ser después de 01-01-1950.',
                /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                ////////////////////////// DATOS PAREJA
                /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                'fechaObtencion.required_if' => 'Olvidaste agregar la fecha.',
                'rfcFisicaHomo.size' => 'El RFC con homoclave debe tener 13 caracteres.',
                'rfcFisicaHomo.alpha_num' => 'El RFC debe contener letras y números únicamente.',
                'relacionConDeclarante.required_if' => 'Olvidaste indicar la relación con el declarante.',
                'relacionConDeclarante.exists' => 'La relación indicada no existe en la lista dada.',
                'esDependienteEconomico.required_if' => 'Olvidaste indicar si es dependiente económico.',
                'esDependienteEconomico.boolean' => 'Debes indicar sí / no es dependiente económico.',
                'ciudadanoExtranjero.required_if' => 'Olvidaste indicar si es ciudadano extranjero.',
                'ciudadanoExtranjero.boolean' => 'Debes indicar sí / no es extranjero.',
                'habitaDomicilioDeclarante.required_if' => 'Olvidaste indicar si habita en el domicilio.',
                'habitaDomicilioDeclarante.boolean' => 'Debes indicar sí / no viven en el mismo lugar.',
                'lugarDondeReside.in' => 'La opción indicada no es válida.',
                'pais.required_without' => 'Olvidaste indicar el país.',
                'numeroExterior.required_without' => 'Olvidaste indicar el número exterior.',
                'codigoPostal.required_without' => 'Olvidaste indicar el código postal.',
                'calle.required_without' => 'Olvidaste indicar la calle.',

                'estadoProvincia.max' => 'La provincia no puede tener más de 65 caracteres.',
                'ciudadLocalidad.max' => 'La ciudad no puede tener más de 65 caracteres.',

                'empleoCargo.required_if' => 'Olvidaste indicar el empleo.',
                'empleoCargo.max' => 'El empleo no puede tener más de 65 caracteres.',
                /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                ////////////////////////// DEPENDIENTES ECONÓMICOS
                /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                'parentescoRelacion.required' => 'Olvidaste indicar el parentesco.',
                'parentescoRelacion.exists' => 'El parentesco no existe en la lista dada.',
                'otroparentesco.required_if' => 'Olvidaste indicar el parentesco.',
                'otroparentesco.max' => 'El parentesco no debe tener más de 65 caracteres.',
                'extranjero.required' => 'Olvidaste indicar si es extranjero.',
                'extranjero.boolean' => 'Debes indicar sí / no es extranjero.',
                'habitaDomicilioDeclarante.required' => 'Olvidaste indicar si vive con el declarante.',
                'habitaDomicilioDeclarante.boolean' => 'Debes indicar sí / no habita con el declarante.',
                'actividadLaboralClave.required' => 'Olvidaste indicar la actividad laboral.',
                'actividadLaboralClave.exists' => 'La actividad laboral no existe en la lista dada.',
                'lugarDondeReside.in' => 'La opción indicada en "mantener privado el domicilio", no es válido.',

                'proveedorContratistaGobierno.required_if' => 'Olvidaste indicar si es contratista de gobierno.',
                'proveedorContratistaGobierno.boolean' => 'Debes indicar sí / no es contratista de gobierno.',

                'fechaIngreso.required_unless' => 'Olvidaste indicar la fecha de ingreso.',
                'fechaIngreso.date' => 'La fecha de ingreso no es válida.',
                'fechaIngreso.after' => 'La fecha de ingreso debe ser después de 01-01-1950.',
                'fechaIngreso.before' => 'La fecha de ingreso debe ser antes de hoy.',
                'sectorClave.required_if' => 'Olvidaste indicar el sector.',
                'sectorClave.exists' => 'El sector indicado no existe en la lista dada.',
                'especifiqueSector.required_if' => 'Olvidaste indicar el otro sector.',
                'especifiqueSector.max' => 'El sector no puede tener más de 65 caracteres.',
                'montoValor.required_unless' => 'Olvidaste indicar la cantidad.',
                'montoValor.max' => 'La cantidad no puede tener más de 20 dígitos.',
                'montoMoneda.required_unless' => 'Olvidaste indicar la moneda.',
                'montoMoneda.exists' => 'La moneda indicada no existe en la lista dada.',

                'remuneracionNetaCargoPublico.required' => 'Olvidaste indicar la remuneración neta anual de tu cargo.',

                /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                ////////////////////////// ACTIVIDAD ANUAL ANTERIOR
                /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                'servidorPublicoAnioAnterior.required' => 'Olvidaste indicar si fuiste servidor público.',
                'servidorPublicoAnioAnterior.boolean' => 'Debes indicar SÍ/NO fuiste servidor público el año anterior.',

                'fechaIngreso.required_if' => 'Olvidaste indicar la fecha de ingreso.',
                'fechaEgreso.required_if' => 'Olvidaste indicar la fecha de egreso.',
                'remuneracionNetaCargoPublico.required_if' => 'Olvidaste indicar la remuneración.',
                'remuneracionNetaCargoPublico.max' => 'La remuneración no puede tener más de 20 digitos.',

                'industria.0.tipo.required_with' => 'Olvidaste indicar el tipo de negocio II.1.a',
                'industria.0.tipo.max' => 'El tipo de negocio 1a no debe tener más de 65 caracteres.',
                'industria.1.tipo.required_with' => 'Olvidaste indicar el tipo de negocio II.1.b',
                'industria.1.tipo.max' => 'El tipo de negocio 2a no debe tener más de 65 caracteres.',
                'industria.2.tipo.required_with' => 'Olvidaste indicar el tipo de negocio II.1.c',
                'industria.2.tipo.max' => 'El tipo de negocio 3a no debe tener más de 65 caracteres.',
                'industria.3.tipo.required_with' => 'Olvidaste indicar el tipo de negocio II.1.d',
                'industria.3.tipo.max' => 'El tipo de negocio 4a no debe tener más de 65 caracteres.',
                'industria.4.tipo.required_with' => 'Olvidaste indicar el tipo de negocio II.1.e',
                'industria.4.tipo.max' => 'El tipo de negocio 5a no debe tener más de 65 caracteres.',
                'industria.5.tipo.required_with' => 'Olvidaste indicar el tipo de negocio II.1.f',
                'industria.5.tipo.max' => 'El tipo de negocio 6a no debe tener más de 65 caracteres.',
                'industria.6.tipo.required_with' => 'Olvidaste indicar el tipo de negocio II.1.g',
                'industria.6.tipo.max' => 'El tipo de negocio 7a no debe tener más de 65 caracteres.',
                'industria.7.tipo.required_with' => 'Olvidaste indicar el tipo de negocio II.1.h',
                'industria.7.tipo.max' => 'El tipo de negocio 8a no debe tener más de 65 caracteres.',
                'industria.8.tipo.required_with' => 'Olvidaste indicar el tipo de negocio II.1.i',
                'industria.8.tipo.max' => 'El tipo de negocio 9a no debe tener más de 65 caracteres.',
                'industria.9.tipo.required_with' => 'Olvidaste indicar el tipo de negocio II.1.j',
                'industria.9.tipo.max' => 'El tipo de negocio 10a no debe tener más de 65 caracteres.',

                'industria.0.nombreRazonSocial.required_with' => 'Olvidaste indicar el nombre/razón II.1.a',
                'industria.0.nombreRazonSocial.max' => 'El nombre/razón 1a no debe tener más de 65 caracteres.',
                'industria.1.nombreRazonSocial.required_with' => 'Olvidaste indicar el nombre/razón II.1.b',
                'industria.1.nombreRazonSocial.max' => 'El nombre/razón 2a no debe tener más de 65 caracteres.',
                'industria.2.nombreRazonSocial.required_with' => 'Olvidaste indicar el nombre/razón II.1.c',
                'industria.2.nombreRazonSocial.max' => 'El nombre/razón 3a no debe tener más de 65 caracteres.',
                'industria.3.nombreRazonSocial.required_with' => 'Olvidaste indicar el nombre/razón II.1.d',
                'industria.3.nombreRazonSocial.max' => 'El nombre/razón 4a no debe tener más de 65 caracteres.',
                'industria.4.nombreRazonSocial.required_with' => 'Olvidaste indicar el nombre/razón II.1.e',
                'industria.4.nombreRazonSocial.max' => 'El nombre/razón 5a no debe tener más de 65 caracteres.',
                'industria.5.nombreRazonSocial.required_with' => 'Olvidaste indicar el nombre/razón II.1.f',
                'industria.5.nombreRazonSocial.max' => 'El nombre/razón 6a no debe tener más de 65 caracteres.',
                'industria.6.nombreRazonSocial.required_with' => 'Olvidaste indicar el nombre/razón II.1.g',
                'industria.6.nombreRazonSocial.max' => 'El nombre/razón 7a no debe tener más de 65 caracteres.',
                'industria.7.nombreRazonSocial.required_with' => 'Olvidaste indicar el nombre/razón II.1.h',
                'industria.7.nombreRazonSocial.max' => 'El nombre/razón 8a no debe tener más de 65 caracteres.',
                'industria.8.nombreRazonSocial.required_with' => 'Olvidaste indicar el nombre/razón II.1.i',
                'industria.8.nombreRazonSocial.max' => 'El nombre/razón 9a no debe tener más de 65 caracteres.',
                'industria.9.nombreRazonSocial.required_with' => 'Olvidaste indicar el nombre/razón II.1.j',
                'industria.9.nombreRazonSocial.max' => 'El nombre/razón 10a no debe tener más de 65 caracteres.',

                'industria.0.remuneracion.required_with' => 'Olvidaste indicar la remuneración II.1.a',
                'industria.0.remuneracion.max' => 'La remuneración 1a no debe tener más de 20 digitos.',
                'industria.1.remuneracion.required_with' => 'Olvidaste indicar la remuneración II.2.b',
                'industria.1.remuneracion.max' => 'La remuneración 2a no debe tener más de 20 digitos.',
                'industria.2.remuneracion.required_with' => 'Olvidaste indicar la remuneración II.3.c',
                'industria.2.remuneracion.max' => 'La remuneración 3a no debe tener más de 20 digitos.',
                'industria.3.remuneracion.required_with' => 'Olvidaste indicar la remuneración II.4.d',
                'industria.3.remuneracion.max' => 'La remuneración 4a no debe tener más de 20 digitos.',
                'industria.4.remuneracion.required_with' => 'Olvidaste indicar la remuneración II.5.e',
                'industria.4.remuneracion.max' => 'La remuneración 5a no debe tener más de 20 digitos.',
                'industria.5.remuneracion.required_with' => 'Olvidaste indicar la remuneración II.6.f',
                'industria.5.remuneracion.max' => 'La remuneración 6a no debe tener más de 20 digitos.',
                'industria.6.remuneracion.required_with' => 'Olvidaste indicar la remuneración II.7.g',
                'industria.6.remuneracion.max' => 'La remuneración 7a no debe tener más de 20 digitos.',
                'industria.7.remuneracion.required_with' => 'Olvidaste indicar la remuneración II.8.h',
                'industria.7.remuneracion.max' => 'La remuneración 8a no debe tener más de 20 digitos.',
                'industria.8.remuneracion.required_with' => 'Olvidaste indicar la remuneración II.9.i',
                'industria.8.remuneracion.max' => 'La remuneración 9a no debe tener más de 20 digitos.',
                'industria.9.remuneracion.required_with' => 'Olvidaste indicar la remuneración II.10.j',
                'industria.9.remuneracion.max' => 'La remuneración 10a no debe tener más de 20 digitos.',

                'financiera.0.tipoInstrumento.required_with' => 'Olvidaste indicar el tipo de instrumento II.2.a.',
                'financiera.0.tipoInstrumento.exists' => 'El tipo de instrumento II.2.a no existe en la lista dada.',
                'financiera.1.tipoInstrumento.required_with' => 'Olvidaste indicar el tipo de instrumento II.2.b.',
                'financiera.1.tipoInstrumento.exists' => 'El tipo de instrumento II.2.b no existe en la lista dada.',
                'financiera.2.tipoInstrumento.required_with' => 'Olvidaste indicar el tipo de instrumento II.2.c.',
                'financiera.2.tipoInstrumento.exists' => 'El tipo de instrumento II.2.c no existe en la lista dada.',
                'financiera.3.tipoInstrumento.required_with' => 'Olvidaste indicar el tipo de instrumento II.2.d.',
                'financiera.3.tipoInstrumento.exists' => 'El tipo de instrumento II.2.d no existe en la lista dada.',
                'financiera.4.tipoInstrumento.required_with' => 'Olvidaste indicar el tipo de instrumento II.2.e.',
                'financiera.4.tipoInstrumento.exists' => 'El tipo de instrumento II.2.e no existe en la lista dada.',
                'financiera.5.tipoInstrumento.required_with' => 'Olvidaste indicar el tipo de instrumento II.2.f.',
                'financiera.5.tipoInstrumento.exists' => 'El tipo de instrumento II.2.f no existe en la lista dada.',
                'financiera.6.tipoInstrumento.required_with' => 'Olvidaste indicar el tipo de instrumento II.2.g.',
                'financiera.6.tipoInstrumento.exists' => 'El tipo de instrumento II.2.g no existe en la lista dada.',
                'financiera.7.tipoInstrumento.required_with' => 'Olvidaste indicar el tipo de instrumento II.2.h.',
                'financiera.7.tipoInstrumento.exists' => 'El tipo de instrumento II.2.h no existe en la lista dada.',
                'financiera.8.tipoInstrumento.required_with' => 'Olvidaste indicar el tipo de instrumento II.2.i.',
                'financiera.8.tipoInstrumento.exists' => 'El tipo de instrumento II.2.i no existe en la lista dada.',
                'financiera.9.tipoInstrumento.required_with' => 'Olvidaste indicar el tipo de instrumento II.2.j.',
                'financiera.9.tipoInstrumento.exists' => 'El tipo de instrumento II.2.j no existe en la lista dada.',


                'financiera.0.remuneracion.required_with' => 'Olvidaste indicar la remuneración II.2.a.',
                'financiera.0.remuneracion.max' => 'La remuneración II.2.a no debe tener más de 20 digitos.',
                'financiera.1.remuneracion.required_with' => 'Olvidaste indicar la remuneración II.2.b.',
                'financiera.1.remuneracion.max' => 'La remuneración II.2.b no debe tener más de 20 digitos.',
                'financiera.2.remuneracion.required_with' => 'Olvidaste indicar la remuneración II.2.c.',
                'financiera.2.remuneracion.max' => 'La remuneración II.2.c no debe tener más de 20 digitos.',
                'financiera.3.remuneracion.required_with' => 'Olvidaste indicar la remuneración II.2.d.',
                'financiera.3.remuneracion.max' => 'La remuneración II.2.d no debe tener más de 20 digitos.',
                'financiera.4.remuneracion.required_with' => 'Olvidaste indicar la remuneración II.2.e.',
                'financiera.4.remuneracion.max' => 'La remuneración II.2.e no debe tener más de 20 digitos.',
                'financiera.5.remuneracion.required_with' => 'Olvidaste indicar la remuneración II.2.f.',
                'financiera.5.remuneracion.max' => 'La remuneración II.2.f no debe tener más de 20 digitos.',
                'financiera.6.remuneracion.required_with' => 'Olvidaste indicar la remuneración II.2.g.',
                'financiera.6.remuneracion.max' => 'La remuneración II.2.g no debe tener más de 20 digitos.',
                'financiera.7.remuneracion.required_with' => 'Olvidaste indicar la remuneración II.2.h.',
                'financiera.7.remuneracion.max' => 'La remuneración II.2.h no debe tener más de 20 digitos.',
                'financiera.8.remuneracion.required_with' => 'Olvidaste indicar la remuneración II.2.i.',
                'financiera.8.remuneracion.max' => 'La remuneración II.2.i no debe tener más de 20 digitos.',
                'financiera.9.remuneracion.required_with' => 'Olvidaste indicar la remuneración II.2.j.',
                'financiera.9.remuneracion.max' => 'La remuneración II.2.j no debe tener más de 20 digitos.',

                'servicio.0.tipoServicio.required_with' => 'Olvidaste indicar el tipo de ingreso II.3.a.',
                'servicio.0.tipoServicio.max' => 'El tipo de ingreso II.3.a no debe tener más de 65 caracteres.',
                'servicio.1.tipoServicio.required_with' => 'Olvidaste indicar el tipo de ingreso II.3.b.',
                'servicio.1.tipoServicio.max' => 'El tipo de ingreso II.3.b no debe tener más de 65 caracteres.',
                'servicio.2.tipoServicio.required_with' => 'Olvidaste indicar el tipo de ingreso II.3.c.',
                'servicio.2.tipoServicio.max' => 'El tipo de ingreso II.3.c no debe tener más de 65 caracteres.',
                'servicio.3.tipoServicio.required_with' => 'Olvidaste indicar el tipo de ingreso II.3.d.',
                'servicio.3.tipoServicio.max' => 'El tipo de ingreso II.3.d no debe tener más de 65 caracteres.',
                'servicio.4.tipoServicio.required_with' => 'Olvidaste indicar el tipo de ingreso II.3.e.',
                'servicio.4.tipoServicio.max' => 'El tipo de ingreso II.3.e no debe tener más de 65 caracteres.',
                'servicio.5.tipoServicio.required_with' => 'Olvidaste indicar el tipo de ingreso II.3.f.',
                'servicio.5.tipoServicio.max' => 'El tipo de ingreso II.3.f no debe tener más de 65 caracteres.',
                'servicio.6.tipoServicio.required_with' => 'Olvidaste indicar el tipo de ingreso II.3.g.',
                'servicio.6.tipoServicio.max' => 'El tipo de ingreso II.3.g no debe tener más de 65 caracteres.',
                'servicio.7.tipoServicio.required_with' => 'Olvidaste indicar el tipo de ingreso II.3.h.',
                'servicio.7.tipoServicio.max' => 'El tipo de ingreso II.3.h no debe tener más de 65 caracteres.',
                'servicio.8.tipoServicio.required_with' => 'Olvidaste indicar el tipo de ingreso II.3.i.',
                'servicio.8.tipoServicio.max' => 'El tipo de ingreso II.3.i no debe tener más de 65 caracteres.',
                'servicio.9.tipoServicio.required_with' => 'Olvidaste indicar el tipo de ingreso II.3.j.',
                'servicio.9.tipoServicio.max' => 'El tipo de ingreso II.3.j no debe tener más de 65 caracteres.',

                'servicio.0.remuneracion.required_with' => 'Olvidaste indicar la remuneración II.3.a.',
                'servicio.0.remuneracion.max' => 'La remuneración II.3.a no debe tener más de 20 digitos.',
                'servicio.1.remuneracion.required_with' => 'Olvidaste indicar la remuneración II.3.b.',
                'servicio.1.remuneracion.max' => 'La remuneración II.3.b no debe tener más de 20 digitos.',
                'servicio.2.remuneracion.required_with' => 'Olvidaste indicar la remuneración II.3.c.',
                'servicio.2.remuneracion.max' => 'La remuneración II.3.c no debe tener más de 20 digitos.',
                'servicio.3.remuneracion.required_with' => 'Olvidaste indicar la remuneración II.3.d.',
                'servicio.3.remuneracion.max' => 'La remuneración II.3.d no debe tener más de 20 digitos.',
                'servicio.4.remuneracion.required_with' => 'Olvidaste indicar la remuneración II.3.e.',
                'servicio.4.remuneracion.max' => 'La remuneración II.3.e no debe tener más de 20 digitos.',
                'servicio.5.remuneracion.required_with' => 'Olvidaste indicar la remuneración II.3.f.',
                'servicio.5.remuneracion.max' => 'La remuneración II.3.f no debe tener más de 20 digitos.',
                'servicio.6.remuneracion.required_with' => 'Olvidaste indicar la remuneración II.3.g.',
                'servicio.6.remuneracion.max' => 'La remuneración II.3.g no debe tener más de 20 digitos.',
                'servicio.7.remuneracion.required_with' => 'Olvidaste indicar la remuneración II.3.h.',
                'servicio.7.remuneracion.max' => 'La remuneración II.3.h no debe tener más de 20 digitos.',
                'servicio.8.remuneracion.required_with' => 'Olvidaste indicar la remuneración II.3.i.',
                'servicio.8.remuneracion.max' => 'La remuneración II.3.i no debe tener más de 20 digitos.',
                'servicio.9.remuneracion.required_with' => 'Olvidaste indicar la remuneración II.3.j.',
                'servicio.9.remuneracion.max' => 'La remuneración II.3.j no debe tener más de 20 digitos.',

                'bien.0.remuneracion.required_with' => 'Olvidaste indicar la remuneración II.4.a.',
                'bien.0.remuneracion.max' => 'La remuneración II.4.a no debe tener más de 20 digitos.',
                'bien.1.remuneracion.required_with' => 'Olvidaste indicar la remuneración II.4.b.',
                'bien.1.remuneracion.max' => 'La remuneración II.4.b no debe tener más de 20 digitos.',
                'bien.2.remuneracion.required_with' => 'Olvidaste indicar la remuneración II.4.c.',
                'bien.2.remuneracion.max' => 'La remuneración II.4.c no debe tener más de 20 digitos.',
                'bien.3.remuneracion.required_with' => 'Olvidaste indicar la remuneración II.4.d.',
                'bien.3.remuneracion.max' => 'La remuneración II.4.d no debe tener más de 20 digitos.',
                'bien.4.remuneracion.required_with' => 'Olvidaste indicar la remuneración II.4.e.',
                'bien.4.remuneracion.max' => 'La remuneración II.4.e no debe tener más de 20 digitos.',
                'bien.5.remuneracion.required_with' => 'Olvidaste indicar la remuneración II.4.f.',
                'bien.5.remuneracion.max' => 'La remuneración II.4.f no debe tener más de 20 digitos.',
                'bien.6.remuneracion.required_with' => 'Olvidaste indicar la remuneración II.4.g.',
                'bien.6.remuneracion.max' => 'La remuneración II.4.g no debe tener más de 20 digitos.',
                'bien.7.remuneracion.required_with' => 'Olvidaste indicar la remuneración II.4.h.',
                'bien.7.remuneracion.max' => 'La remuneración II.4.h no debe tener más de 20 digitos.',
                'bien.8.remuneracion.required_with' => 'Olvidaste indicar la remuneración II.4.i.',
                'bien.8.remuneracion.max' => 'La remuneración II.4.i no debe tener más de 20 digitos.',
                'bien.9.remuneracion.required_with' => 'Olvidaste indicar la remuneración II.4.j.',
                'bien.9.remuneracion.max' => 'La remuneración II.4.j no debe tener más de 20 digitos.',

                'bien.0.tipoBienEnajenado.required_with' => 'Olvidaste indicar el tipo de bien II.4.a.',
                'bien.0.tipoBienEnajenado.exists' => 'El tipo de bien II.4.a no existe en la lista dada.',
                'bien.1.tipoBienEnajenado.required_with' => 'Olvidaste indicar el tipo de bien II.4.b.',
                'bien.1.tipoBienEnajenado.exists' => 'El tipo de bien II.4.b no existe en la lista dada.',
                'bien.2.tipoBienEnajenado.required_with' => 'Olvidaste indicar el tipo de bien II.4.c.',
                'bien.2.tipoBienEnajenado.exists' => 'El tipo de bien II.4.c no existe en la lista dada.',
                'bien.3.tipoBienEnajenado.required_with' => 'Olvidaste indicar el tipo de bien II.4.d.',
                'bien.3.tipoBienEnajenado.exists' => 'El tipo de bien II.4.d no existe en la lista dada.',
                'bien.4.tipoBienEnajenado.required_with' => 'Olvidaste indicar el tipo de bien II.4.e.',
                'bien.4.tipoBienEnajenado.exists' => 'El tipo de bien II.4.e no existe en la lista dada.',
                'bien.5.tipoBienEnajenado.required_with' => 'Olvidaste indicar el tipo de bien II.4.f.',
                'bien.5.tipoBienEnajenado.exists' => 'El tipo de bien II.4.f no existe en la lista dada.',
                'bien.6.tipoBienEnajenado.required_with' => 'Olvidaste indicar el tipo de bien II.4.g.',
                'bien.6.tipoBienEnajenado.exists' => 'El tipo de bien II.4.g no existe en la lista dada.',
                'bien.7.tipoBienEnajenado.required_with' => 'Olvidaste indicar el tipo de bien II.4.h.',
                'bien.7.tipoBienEnajenado.exists' => 'El tipo de bien II.4.h no existe en la lista dada.',
                'bien.8.tipoBienEnajenado.required_with' => 'Olvidaste indicar el tipo de bien II.4.i.',
                'bien.8.tipoBienEnajenado.exists' => 'El tipo de bien II.4.i no existe en la lista dada.',
                'bien.9.tipoBienEnajenado.required_with' => 'Olvidaste indicar el tipo de bien II.4.j.',
                'bien.9.tipoBienEnajenado.exists' => 'El tipo de bien II.4.j no existe en la lista dada.',

                'ingreso.0.remuneracion.required_with' => 'Olvidaste indicar la remuneración II.5.a.',
                'ingreso.0.remuneracion.max' => 'La remuneración II.5.a no debe tener más de 20 digitos.',
                'ingreso.1.remuneracion.required_with' => 'Olvidaste indicar la remuneración II.5.b.',
                'ingreso.1.remuneracion.max' => 'La remuneración II.5.b no debe tener más de 20 digitos.',
                'ingreso.2.remuneracion.required_with' => 'Olvidaste indicar la remuneración II.5.c.',
                'ingreso.2.remuneracion.max' => 'La remuneración II.5.c no debe tener más de 20 digitos.',
                'ingreso.3.remuneracion.required_with' => 'Olvidaste indicar la remuneración II.5.d.',
                'ingreso.3.remuneracion.max' => 'La remuneración II.5.d no debe tener más de 20 digitos.',
                'ingreso.4.remuneracion.required_with' => 'Olvidaste indicar la remuneración II.5.e.',
                'ingreso.4.remuneracion.max' => 'La remuneración II.5.e no debe tener más de 20 digitos.',
                'ingreso.5.remuneracion.required_with' => 'Olvidaste indicar la remuneración II.5.f.',
                'ingreso.5.remuneracion.max' => 'La remuneración II.5.f no debe tener más de 20 digitos.',
                'ingreso.6.remuneracion.required_with' => 'Olvidaste indicar la remuneración II.5.g.',
                'ingreso.6.remuneracion.max' => 'La remuneración II.5.g no debe tener más de 20 digitos.',
                'ingreso.7.remuneracion.required_with' => 'Olvidaste indicar la remuneración II.5.h.',
                'ingreso.7.remuneracion.max' => 'La remuneración II.5.h no debe tener más de 20 digitos.',
                'ingreso.8.remuneracion.required_with' => 'Olvidaste indicar la remuneración II.5.i.',
                'ingreso.8.remuneracion.max' => 'La remuneración II.5.i no debe tener más de 20 digitos.',
                'ingreso.9.remuneracion.required_with' => 'Olvidaste indicar la remuneración II.5.j.',
                'ingreso.9.remuneracion.max' => 'La remuneración II.5.j no debe tener más de 20 digitos.',

                'ingreso.0.tipoIngreso.required_with' => 'Olvidaste indicar el tipo de ingreso II.5.a.',
                'ingreso.0.tipoIngreso.max' => 'El tipo de ingreso II.5.a no debe tener más de 65 caracteres.',
                'ingreso.1.tipoIngreso.required_with' => 'Olvidaste indicar el tipo de ingreso II.5.b.',
                'ingreso.1.tipoIngreso.max' => 'El tipo de ingreso II.5.b no debe tener más de 65 caracteres.',
                'ingreso.2.tipoIngreso.required_with' => 'Olvidaste indicar el tipo de ingreso II.5.c.',
                'ingreso.2.tipoIngreso.max' => 'El tipo de ingreso II.5.c no debe tener más de 65 caracteres.',
                'ingreso.3.tipoIngreso.required_with' => 'Olvidaste indicar el tipo de ingreso II.5.d.',
                'ingreso.3.tipoIngreso.max' => 'El tipo de ingreso II.5.d no debe tener más de 65 caracteres.',
                'ingreso.4.tipoIngreso.required_with' => 'Olvidaste indicar el tipo de ingreso II.5.e.',
                'ingreso.4.tipoIngreso.max' => 'El tipo de ingreso II.5.e no debe tener más de 65 caracteres.',
                'ingreso.5.tipoIngreso.required_with' => 'Olvidaste indicar el tipo de ingreso II.5.f.',
                'ingreso.5.tipoIngreso.max' => 'El tipo de ingreso II.5.f no debe tener más de 65 caracteres.',
                'ingreso.6.tipoIngreso.required_with' => 'Olvidaste indicar el tipo de ingreso II.5.g.',
                'ingreso.6.tipoIngreso.max' => 'El tipo de ingreso II.5.g no debe tener más de 65 caracteres.',
                'ingreso.7.tipoIngreso.required_with' => 'Olvidaste indicar el tipo de negocio II.5.h.',
                'ingreso.7.tipoIngreso.max' => 'El tipo de ingreso II.5.h no debe tener más de 65 caracteres.',
                'ingreso.8.tipoIngreso.required_with' => 'Olvidaste indicar el tipo de ingreso II.5.i.',
                'ingreso.8.tipoIngreso.max' => 'El tipo de ingreso II.5.i no debe tener más de 65 caracteres.',
                'ingreso.9.tipoIngreso.required_with' => 'Olvidaste indicar el tipo de ingreso II.5.j.',
                'ingreso.9.tipoIngreso.max' => 'El tipo de ingreso II.5.j no debe tener más de 65 caracteres.',

                /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                ////////////////////////// BIENES MUEBLES
                /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                'tipoBien.exists' => 'El tipo de bien no existe en la lista dada.',
                'tipoBien.required' => 'Olvidaste indicar el tipo de bien.',
                'especifiqueTipoBien.required_if' => 'Olvidaste indicar el tipo de bien.',
                'especifiqueTipoBien.max' => 'El tipo de bien no puede tener más de 65 caracteres.',
                'descripcionGeneralBien.required' => 'Olvidaste describir el bien.',
                'descripcionGeneralBien.max' => 'La descripción del bien no puede tener más de 65 caracteres.',
                'relacion.exists' => 'La relación no existe en la lista dada.',
                'relacion.required' => 'Olvidaste indicar la relación.',
                'formaPago.exists' => 'La forma de pago no existe en la lista dada.',
                'formaPago.required' => 'Olvidaste indicar la forma de pago.',
                'formaAdquisicion.exists' => 'La forma de pago no existe en la lista dada.',
                'formaAdquisicion.required' => 'Olvidaste indicar la forma de pago.',
                'especifiqueRelacion.required_if' => 'Olvidaste especificar la relación.',
                'especifiqueRelacion.max' => 'El tipo de relación debe tener máximo 65 caracteres.',
                'valorConformeA.exists' => 'El valor conforme no existe en la lista dada.',
                'valorConformeA.required' => 'Olvidaste indicar el valor conforma.',

                'superficieTerreno.required' => 'La superficie del terreno es obligatoria.',
                'superficieTerreno.integer' => 'La superficie del terreno no es un número.',
                'superficieTerreno.min' => 'La superficie mínima del terreno debe ser 1.',

                'superficieConstruccionUnidad.required' => 'Olvidaste indicar la unidad de medida de la superficie de construcción.',
                'superficieConstruccionUnidad.exists' => 'La unidad de medida de la superficie de construcción no existe en la lista dada.',

                'superficieConstruccion.required' => 'La superficie del construcción es obligatoria.',
                'superficieConstruccion.integer' => 'La superficie del construcción no es un número.',
                'superficieConstruccion.min' => 'La superficie mínima del construcción debe ser 1.',

                'superficieTerrenoUnidad.required' => 'Olvidaste indicar la unidad de medida de la superficie de terreno.',
                'superficieTerrenoUnidad.exists' => 'La unidad de medida de la superficie de terreno no existe en la lista dada.',

                'transmisor.0.tipoPersona.exists' => 'El tipo de persona del transmisor 1 no existe en la lista dada.',
                'transmisor.0.tipoPersona.required' => 'El tipo de persona del transmisor 1 no existe en la lista dada.',
                'transmisor.1.tipoPersona.exists' => 'El tipo de persona del transmisor 2 no existe en la lista dada.',
                'transmisor.1.tipoPersona.required_with' => 'Si agregaste el nombre/razón del transmisor 2 deberás agregar también el tipo de persona.',
                'transmisor.2.tipoPersona.exists' => 'El tipo de persona del transmisor 3 no existe en la lista dada.',
                'transmisor.2.tipoPersona.required_with' => 'Si agregaste el nombre/razón del transmisor 3 deberás agregar también el tipo de persona.',
                'transmisor.3.tipoPersona.exists' => 'El tipo de persona del transmisor 4 no existe en la lista dada.',
                'transmisor.3.tipoPersona.required_with' => 'Si agregaste el nombre/razón del transmisor 4 deberás agregar también el tipo de persona.',
                'transmisor.4.tipoPersona.exists' => 'El tipo de persona del transmisor 5 no existe en la lista dada.',
                'transmisor.4.tipoPersona.required_with' => 'Si agregaste el nombre/razón del transmisor 5 deberás agregar también el tipo de persona.',
                'transmisor.5.tipoPersona.exists' => 'El tipo de persona del transmisor 6 no existe en la lista dada.',
                'transmisor.5.tipoPersona.required_with' => 'Si agregaste el nombre/razón del transmisor 6 deberás agregar también el tipo de persona.',
                'transmisor.6.tipoPersona.exists' => 'El tipo de persona del transmisor 7 no existe en la lista dada.',
                'transmisor.6.tipoPersona.required_with' => 'Si agregaste el nombre/razón del transmisor 7 deberás agregar también el tipo de persona.',
                'transmisor.7.tipoPersona.exists' => 'El tipo de persona del transmisor 8 no existe en la lista dada.',
                'transmisor.7.tipoPersona.required_with' => 'Si agregaste el nombre/razón del transmisor 8 deberás agregar también el tipo de persona.',
                'transmisor.8.tipoPersona.exists' => 'El tipo de persona del transmisor 9 no existe en la lista dada.',
                'transmisor.8.tipoPersona.required_with' => 'Si agregaste el nombre/razón del transmisor 9 deberás agregar también el tipo de persona.',
                'transmisor.9.tipoPersona.exists' => 'El tipo de persona del transmisor 10 no existe en la lista dada.',
                'transmisor.9.tipoPersona.required_with' => 'Si agregaste el nombre/razón del transmisor 10 deberás agregar también el tipo de persona.',

                'transmisor.0.nombreRazonSocial.required' => 'Olvidaste indicar el nombre/razón del transmisor 1.',
                'transmisor.0.nombreRazonSocial.max' => 'El nombre/razón del transmisor 1 no debe tener más de 65 caracteres.',
                'transmisor.1.nombreRazonSocial.required_with' => 'Olvidaste indicar el nombre/razón del transmisor 2.',
                'transmisor.1.nombreRazonSocial.max' => 'El nombre/razón del transmisor 2 no debe tener más de 65 caracteres.',
                'transmisor.2.nombreRazonSocial.required_with' => 'Olvidaste indicar el nombre/razón del transmisor 3.',
                'transmisor.2.nombreRazonSocial.max' => 'El nombre/razón del transmisor 3 no debe tener más de 65 caracteres.',
                'transmisor.3.nombreRazonSocial.required_with' => 'Olvidaste indicar el nombre/razón del transmisor 4.',
                'transmisor.3.nombreRazonSocial.max' => 'El nombre/razón del transmisor 4 no debe tener más de 65 caracteres.',
                'transmisor.4.nombreRazonSocial.required_with' => 'Olvidaste indicar el nombre/razón del transmisor 5.',
                'transmisor.4.nombreRazonSocial.max' => 'El nombre/razón del transmisor 5 no debe tener más de 65 caracteres.',
                'transmisor.5.nombreRazonSocial.required_with' => 'Olvidaste indicar el nombre/razón del transmisor 6.',
                'transmisor.5.nombreRazonSocial.max' => 'El nombre/razón del transmisor 6 no debe tener más de 65 caracteres.',
                'transmisor.6.nombreRazonSocial.required_with' => 'Olvidaste indicar el nombre/razón del transmisor 7.',
                'transmisor.6.nombreRazonSocial.max' => 'El nombre/razón del transmisor 7 no debe tener más de 65 caracteres.',
                'transmisor.7.nombreRazonSocial.required_with' => 'Olvidaste indicar el nombre/razón del transmisor 8.',
                'transmisor.7.nombreRazonSocial.max' => 'El nombre/razón del transmisor 8 no debe tener más de 65 caracteres.',
                'transmisor.8.nombreRazonSocial.required_with' => 'Olvidaste indicar el nombre/razón del transmisor 9.',
                'transmisor.8.nombreRazonSocial.max' => 'El nombre/razón del transmisor 9 no debe tener más de 65 caracteres.',
                'transmisor.9.nombreRazonSocial.required_with' => 'Olvidaste indicar el nombre/razón del transmisor 10.',
                'transmisor.9.nombreRazonSocial.max' => 'El nombre/razón del transmisor 10 no debe tener más de 65 caracteres.',

                'transmisor.0.rfc.size' => 'El rfc del transmisor 1 debe tener 12 (moral) o 13 (física) caracteres.',
                'transmisor.0.rfc.alpha_num' => 'El RFC del transmisor 1 debe contener letras y números únicamente.',
                'transmisor.1.rfc.size' => 'El rfc del transmisor 2 debe tener 12 (moral) o 13 (física) caracteres.',
                'transmisor.1.rfc.alpha_num' => 'El RFC del transmisor 2 debe contener letras y números únicamente.',
                'transmisor.2.rfc.size' => 'El rfc del transmisor 3 debe tener 12 (moral) o 13 (física) caracteres.',
                'transmisor.2.rfc.alpha_num' => 'El RFC del transmisor 3 debe contener letras y números únicamente.',
                'transmisor.3.rfc.size' => 'El rfc del transmisor 4 debe tener 12 (moral) o 13 (física) caracteres.',
                'transmisor.3.rfc.alpha_num' => 'El RFC del transmisor 4 debe contener letras y números únicamente.',
                'transmisor.4.rfc.size' => 'El rfc del transmisor 5 debe tener 12 (moral) o 13 (física) caracteres.',
                'transmisor.4.rfc.alpha_num' => 'El RFC del transmisor 5 debe contener letras y números únicamente.',
                'transmisor.5.rfc.size' => 'El rfc del transmisor 6 debe tener 12 (moral) o 13 (física) caracteres.',
                'transmisor.5.rfc.alpha_num' => 'El RFC del transmisor 6 debe contener letras y números únicamente.',
                'transmisor.6.rfc.size' => 'El rfc del transmisor 7 debe tener 12 (moral) o 13 (física) caracteres.',
                'transmisor.6.rfc.alpha_num' => 'El RFC del transmisor 7 debe contener letras y números únicamente.',
                'transmisor.7.rfc.size' => 'El rfc del transmisor 8 debe tener 12 (moral) o 13 (física) caracteres.',
                'transmisor.7.rfc.alpha_num' => 'El RFC del transmisor 8 debe contener letras y números únicamente.',
                'transmisor.8.rfc.size' => 'El rfc del transmisor 9 debe tener 12 (moral) o 13 (física) caracteres.',
                'transmisor.8.rfc.alpha_num' => 'El RFC del transmisor 9 debe contener letras y números únicamente.',
                'transmisor.9.rfc.size' => 'El rfc del transmisor 10 debe tener 12 (moral) o 13 (física) caracteres.',
                'transmisor.9.rfc.alpha_num' => 'El RFC del transmisor 10 debe contener letras y números únicamente.',

                'transmisor.0.relacion.exists' => 'El tipo de relación 1 no existe en la lista dada.',
                'transmisor.0.relacion.required' => 'Olvidaste indicar el tipo de relación 1.',
                'transmisor.1.relacion.exists' => 'El tipo de relación 2 no existe en la lista dada.',
                'transmisor.1.relacion.required_with' => 'Olvidaste indicar el tipo de relación 2.',
                'transmisor.2.relacion.exists' => 'El tipo de relación 3 no existe en la lista dada.',
                'transmisor.2.relacion.required_with' => 'Olvidaste indicar el tipo de relación 3.',
                'transmisor.3.relacion.exists' => 'El tipo de relación 4 no existe en la lista dada.',
                'transmisor.3.relacion.required_with' => 'Olvidaste indicar el tipo de relación 4.',
                'transmisor.4.relacion.exists' => 'El tipo de relación 5 no existe en la lista dada.',
                'transmisor.4.relacion.required_with' => 'Olvidaste indicar el tipo de relación 5.',
                'transmisor.5.relacion.exists' => 'El tipo de relación 6 no existe en la lista dada.',
                'transmisor.5.relacion.required_with' => 'Olvidaste indicar el tipo de relación 6.',
                'transmisor.6.relacion.exists' => 'El tipo de relación 7 no existe en la lista dada.',
                'transmisor.6.relacion.required_with' => 'Olvidaste indicar el tipo de relación 7.',
                'transmisor.7.relacion.exists' => 'El tipo de relación 8 no existe en la lista dada.',
                'transmisor.7.relacion.required_with' => 'Olvidaste indicar el tipo de relación 8.',
                'transmisor.8.relacion.exists' => 'El tipo de relación 9 no existe en la lista dada.',
                'transmisor.8.relacion.required_with' => 'Olvidaste indicar el tipo de relación 9.',
                'transmisor.9.relacion.exists' => 'El tipo de relación 10 no existe en la lista dada.',
                'transmisor.9.relacion.required_with' => 'Olvidaste indicar el tipo de relación 10.',

                'transmisor.0.especifiqueRelacion.required_if' => 'Olvidaste especificar la relación 1.',
			          'transmisor.0.especifiqueRelacion.max' => 'La relación 1 no puede tener más de 65 letras.',
                'transmisor.1.especifiqueRelacion.required_if' => 'Olvidaste especificar la relación 2.',
			          'transmisor.1.especifiqueRelacion.max' => 'La relación 2 no puede tener más de 65 letras.',
                'transmisor.2.especifiqueRelacion.required_if' => 'Olvidaste especificar la relación 3.',
			          'transmisor.2.especifiqueRelacion.max' => 'La relación 3 no puede tener más de 65 letras.',
                'transmisor.3.especifiqueRelacion.required_if' => 'Olvidaste especificar la relación 4.',
			          'transmisor.3.especifiqueRelacion.max' => 'La relación 4 no puede tener más de 65 letras.',
                'transmisor.4.especifiqueRelacion.required_if' => 'Olvidaste especificar la relación 5.',
			          'transmisor.4.especifiqueRelacion.max' => 'La relación 5 no puede tener más de 65 letras.',
                'transmisor.5.especifiqueRelacion.required_if' => 'Olvidaste especificar la relación 6.',
			          'transmisor.5.especifiqueRelacion.max' => 'La relación 6 no puede tener más de 65 letras.',
                'transmisor.6.especifiqueRelacion.required_if' => 'Olvidaste especificar la relación 7.',
			          'transmisor.6.especifiqueRelacion.max' => 'La relación 7 no puede tener más de 65 letras.',
                'transmisor.7.especifiqueRelacion.required_if' => 'Olvidaste especificar la relación 8.',
			          'transmisor.7.especifiqueRelacion.max' => 'La relación 8 no puede tener más de 65 letras.',
                'transmisor.8.especifiqueRelacion.required_if' => 'Olvidaste especificar la relación 9.',
			          'transmisor.8.especifiqueRelacion.max' => 'La relación 9 no puede tener más de 65 letras.',
                'transmisor.9.especifiqueRelacion.required_if' => 'Olvidaste especificar la relación 10.',
			          'transmisor.9.especifiqueRelacion.max' => 'La relación 10 no puede tener más de 65 letras.',
                /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                /////////////////////////// INVERSIONES CUENTAS
                /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                'tipoInversion.exists' => 'El tipo de inversión no existe en la lista dada.',
                'tipoInversion.required' => 'Olvidaste indicar el tipo de inversión.',
                'subTipoInversion.exists' => 'El subtipo de inversión no existe en la lista dada.',
                'subTipoInversion.required' => 'Olvidaste indicar el subtipo de inversión.',
                /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                ////////////////////////// ADEUDOS PASIVOS
                /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                'titular.*.array' => 'Olvidaste seleccionar un  titular.',
                'tipoAdeudo.required' => 'Olvidaste indicar el tipo de adeudo.',
                'tipoAdeudo.exists' => 'El tipo de adeudo indicado no existe en la lista dada.',
                'titular.required' => 'Olvidaste indicar el titular.',
                'titular.exists' =>  'El titular indicado no existe en la lista dada.',
                'saldoValor.required' => 'Olvidaste indicar el saldo.',
                'saldoMoneda.required' => 'Olvidaste indicar la moneda.',
                'saldoValor.max' => 'El saldo no puede tener más de 20 dígitos.',
                'numeroCuentaContrato.required' => 'Olvidaste indicar el no. de cuenta o contrato.',
                'numeroCuentaContrato.max' => 'El no. de cuenta o contrato no debe tener más de 65  caracteres.',
                'saldoMoneda.exists' => 'La moneda indicada no existe en la lista dada.',
                'tercero.0.tipoPersona.exists' => 'El tipo de persona del tercero 1 no existe en la lista dada.',
                'tercero.0.tipoPersona.required' => 'El tipo de persona del tercero 1 no existe en la lista dada.',
                'tercero.1.tipoPersona.exists' => 'El tipo de persona del tercero 2 no existe en la lista dada.',
                'tercero.1.tipoPersona.required_with'  => 'Si agregaste el nombre/razón del tercero 2 deberás agregar también el tipo de persona.',
                'tercero.2.tipoPersona.exists' => 'El tipo de persona del tercero 3 no existe en la lista dada.',
                'tercero.2.tipoPersona.required_with'  => 'Si agregaste el nombre/razón del tercero 3 deberás agregar también el tipo de persona.',
                'tercero.3.tipoPersona.exists' => 'El tipo de persona del tercero 4 no existe en la lista dada.',
                'tercero.3.tipoPersona.required_with'  => 'Si agregaste el nombre/razón del tercero 4 deberás agregar también el tipo de persona.',
                'tercero.4.tipoPersona.exists' => 'El tipo de persona del tercero 5 no existe en la lista dada.',
                'tercero.4.tipoPersona.required_with'  => 'Si agregaste el nombre/razón del tercero 5 deberás agregar también el tipo de persona.',
                'tercero.5.tipoPersona.exists' => 'El tipo de persona del tercero 6 no existe en la lista dada.',
                'tercero.5.tipoPersona.required_with'  => 'Si agregaste el nombre/razón del tercero 6 deberás agregar también el tipo de persona.',
                'tercero.6.tipoPersona.exists' => 'El tipo de persona del tercero 7 no existe en la lista dada.',
                'tercero.6.tipoPersona.required_with'  => 'Si agregaste el nombre/razón del tercero 7 deberás agregar también el tipo de persona.',
                'tercero.7.tipoPersona.exists' => 'El tipo de persona del tercero 8 no existe en la lista dada.',
                'tercero.7.tipoPersona.required_with'  => 'Si agregaste el nombre/razón del tercero 8 deberás agregar también el tipo de persona.',
                'tercero.8.tipoPersona.exists' => 'El tipo de persona del tercero 9 no existe en la lista dada.',
                'tercero.8.tipoPersona.required_with'  => 'Si agregaste el nombre/razón del tercero 9 deberás agregar también el tipo de persona.',
                'tercero.9.tipoPersona.exists' => 'El tipo de persona del tercero 10 no existe en la lista dada.',
                'tercero.9.tipoPersona.required_with'  => 'Si agregaste el nombre/razón del tercero 10 deberás agregar también el tipo de persona.',

                'tercero.0.nombreRazonSocial.required' => 'Olvidaste indicar el nombre/razón del tercero 1.',
                'tercero.0.nombreRazonSocial.max' => 'El nombre/razón del tercero 1 no debe tener más de 65 caracteres.',
                'tercero.1.nombreRazonSocial.required_with' => 'Olvidaste indicar el nombre/razón del tercero 2.',
                'tercero.1.nombreRazonSocial.max' => 'El nombre/razón del tercero 2 no debe tener más de 65 caracteres.',
                'tercero.2.nombreRazonSocial.required_with' => 'Olvidaste indicar el nombre/razón del tercero 3.',
                'tercero.2.nombreRazonSocial.max' => 'El nombre/razón del tercero 3 no debe tener más de 65 caracteres.',
                'tercero.3.nombreRazonSocial.required_with' => 'Olvidaste indicar el nombre/razón del tercero 4.',
                'tercero.3.nombreRazonSocial.max' => 'El nombre/razón del tercero 4 no debe tener más de 65 caracteres.',
                'tercero.4.nombreRazonSocial.required_with' => 'Olvidaste indicar el nombre/razón del tercero 5.',
                'tercero.4.nombreRazonSocial.max' => 'El nombre/razón del tercero 5 no debe tener más de 65 caracteres.',
                'tercero.5.nombreRazonSocial.required_with' => 'Olvidaste indicar el nombre/razón del tercero 6.',
                'tercero.5.nombreRazonSocial.max' => 'El nombre/razón del tercero 6 no debe tener más de 65 caracteres.',
                'tercero.6.nombreRazonSocial.required_with' => 'Olvidaste indicar el nombre/razón del tercero 7.',
                'tercero.6.nombreRazonSocial.max' => 'El nombre/razón del tercero 7 no debe tener más de 65 caracteres.',
                'tercero.7.nombreRazonSocial.required_with' => 'Olvidaste indicar el nombre/razón del tercero 8.',
                'tercero.7.nombreRazonSocial.max' => 'El nombre/razón del tercero 8 no debe tener más de 65 caracteres.',
                'tercero.8.nombreRazonSocial.required_with' => 'Olvidaste indicar el nombre/razón del tercero 9.',
                'tercero.8.nombreRazonSocial.max' => 'El nombre/razón del tercero 9 no debe tener más de 65 caracteres.',
                'tercero.9.nombreRazonSocial.required_with' => 'Olvidaste indicar el nombre/razón del tercero 10.',
                'tercero.9.nombreRazonSocial.max' => 'El nombre/razón del tercero 10 no debe tener más de 65 caracteres.',

                'tercero.0.rfc.size' => 'El rfc del tercero 1 debe tener 12 (moral) o 13 (física) caracteres.',
                'tercero.0.rfc.alpha_num' => 'El RFC del tercero 1 debe contener letras y números únicamente.',
                'tercero.1.rfc.size' => 'El rfc del tercero 2 debe tener 12 (moral) o 13 (física) caracteres.',
                'tercero.1.rfc.alpha_num' => 'El RFC del tercero 2 debe contener letras y números únicamente.',
                'tercero.2.rfc.size' => 'El rfc del tercero 3 debe tener 12 (moral) o 13 (física) caracteres.',
                'tercero.2.rfc.alpha_num' => 'El RFC del tercero 3 debe contener letras y números únicamente.',
                'tercero.3.rfc.size' => 'El rfc del tercero 4 debe tener 12 (moral) o 13 (física) caracteres.',
                'tercero.3.rfc.alpha_num' => 'El RFC del tercero 4 debe contener letras y números únicamente.',
                'tercero.4.rfc.size' => 'El rfc del tercero 5 debe tener 12 (moral) o 13 (física) caracteres.',
                'tercero.4.rfc.alpha_num' => 'El RFC del tercero 5 debe contener letras y números únicamente.',
                'tercero.5.rfc.size' => 'El rfc del tercero 6 debe tener 12 (moral) o 13 (física) caracteres.',
                'tercero.5.rfc.alpha_num' => 'El RFC del tercero 6 debe contener letras y números únicamente.',
                'tercero.6.rfc.size' => 'El rfc del tercero 7 debe tener 12 (moral) o 13 (física) caracteres.',
                'tercero.6.rfc.alpha_num' => 'El RFC del tercero 7 debe contener letras y números únicamente.',
                'tercero.7.rfc.size' => 'El rfc del tercero 8 debe tener 12 (moral) o 13 (física) caracteres.',
                'tercero.7.rfc.alpha_num' => 'El RFC del tercero 8 debe contener letras y números únicamente.',
                'tercero.8.rfc.size' => 'El rfc del tercero 9 debe tener 12 (moral) o 13 (física) caracteres.',
                'tercero.8.rfc.alpha_num' => 'El RFC del tercero 9 debe contener letras y números únicamente.',
                'tercero.9.rfc.size' => 'El rfc del tercero 10 debe tener 12 (moral) o 13 (física) caracteres.',
                'tercero.9.rfc.alpha_num' => 'El RFC del tercero 10 debe contener letras y números únicamente.',
                /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                ////////////////////////// PRESTAMO COMODATO
                /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                'tipoInmueble.required' => 'Olvidaste indicar el tipo de inmueble.',
                'tipoInmueble.exists' => 'El tipo de inmueble no existe en la lista dada.',
                'relacionConTitular.required' => 'Olvidaste indicar la relación.',
                'relacionConTitular.max' => 'La relación no puede tener más de 65 caracteres.',
                'tipoVehiculo.required' => 'Olvidaste indicar el tipo de vehículo.',
                'tipoVehiculo.exists' => 'El tipo de vehículo no existe en la lista dada',
                'marca.required' => 'Olvidaste indicar la marca.',
                'marca.max' => 'La marca no puede tener más de 65 caracteres.',
                'modelo.required' => 'Olvidaste indicar el modelo.',
                'modelo.max' => 'El modelo no puede tener más de 65 caracteres.',
                'anio.required' => 'Olvidaste indicar el año.',
                'anio.numeric' => 'El año no es un número.',
                'anio.min' => 'El año debe ser mayor a 1950',
                'anio.max' => 'El año debe ser mayor al año actual.',
                'numeroSerieRegistro.required' => 'Olvidaste indicar la serie.',
                'numeroSerieRegistro.max' => 'La serie no puede tener más de 65 caracteres.',
                /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                ////////////////////////// PARTICIPACIONES
                /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                'porcentaje.required' => 'Olvidaste indicar el porcentaje.',
                'porcentaje.max' => 'El porcentaje máximo es 100%.',
                'porcentaje.min' => 'El porcentaje debe ser mayor o igual 0%.',
                'porcentaje.integer' => 'El porcentaje no es un número.',
                'especifiqueParticipacion.required_if' => 'Olvidaste indicar la participación.',
                'especifiqueParticipacion.max' => 'La participación no puede tener más de 65 caracteres.',
                /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                ////////////////////////// PARTICIPA TOMA DECISIONES
                /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                'tipoInstitucion.required' => 'Olvidaste indicar el tipo de institución.',
                'tipoInstitucion.exists' => 'El tipo de institución no existe en la lista dada.',
                'especifiqueInstitucion.required_if' => 'Olvidaste especificar la institución.',
                'especifiqueInstitucion.max' => 'La institución no puede tener más de 65 caracteres.',
                /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                ////////////////////////// TIPOAPOYO
                /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                'tipoApoyo.required' => 'El tipo de apoyo es obligatorio.',
                'tipoApoyo.exists' => 'El tipo de apoyo no existe en la lista dada.',
                'especifiqueApoyo.required_if' => 'Olvidaste indicar el apoyo.',
                'especifiqueApoyo.max' => 'El apoyo no debe tener más de 65 caracteres.',
                'nombrePrograma.required' => 'Olvidaste especficar el nombre del programa.',
                'nombrePrograma.max' => 'El nombre del programa no debe tener más de 65 caracteres.',
                /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                ////////////////////////// REPRESENTACIONES
                /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                'tipoRepresentacion.required' => 'Olvidaste indicar la representación.',
                'tipoRepresentacion.exists' => 'La representación no existe en la lista dada.',
                'nombrePrograma.required' => 'Olvidaste indicar el nombre del programa.',
                'nombrePrograma.max' => 'El nombre deL programa no debe tener más de 65 caracteres.',
                /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                ////////////////////////// CLIENTES PRINCIPALES
                /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                'realizaActividadLucrativa.required' => 'Olvidaste responder si realizas actividades lucrativas.',
                'realizaActividadLucrativa.boolean' => 'Debes indicar SÍ/NO realizas una actividad lucrativa.',
                'nombreEmpresaServicio.required' => 'Olvidaste indicar el nombre de la empresa y servicio.',
                'nombreEmpresaServicio.max' => 'El nombre de la empresa y servicio no debe tener más de 191 caracteres.',
                'montoValor.required' => 'Olvidaste indicar la cantidad.',
                'montoMoneda.required' => 'Olvidaste indicar la moneda.',
                'recibeRemuneracion.boolean' => 'Responde SÍ/NO.',
                'recibeRemuneracion.required' => 'Olvidaste indicar si eres remunerado.',
                /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                ////////////////////////// BENEFICIOS PRIVADOS
                /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                'tipoPersona.required' => 'Olvidaste indicar el tipo de persona.',
                'tipoBeneficio.required' => 'El tipo de relación es obligatorio.',
                'tipoBeneficio.exists' => 'El tipo de relación no existe en la lista dada.',
                'beneficiario.required' => 'Olvidaste seleccionar los beneficiarios.',
                'beneficiario.array' => 'No seleccionaste beneficiarios.',
                'beneficiario.exists' => 'El beneficiario indicado no existe en la lista dada.',
                'tipoPersona_dos.required' => 'Olvidaste indicar el tipo de persona.',
                'tipoPersona_dos.exists' => 'El tipo de persona no existe en la lista dada.',
                'formaRecepcion.required' => 'Olvidaste indicar la forma de recepción.',
                'formaRecepcion.exists' => 'La forma de recepción no existe en la lista dada.',
                'especifiqueBeneficio.required_if' => 'Olvidaste indicar el beneficio.',
                'especifiqueBeneficio.max' => 'El beneficio no puede tener más de 65 caracteres.',
                'especifiqueEspecie.required_if' => 'Olvidaste especificar la especie.',
                'especifiqueEspecie.max' => 'La especie no puede tener más de 65 caracteres.',
                'montoValor.required_if' => 'Olvidaste indicar la cantidad.',
                'montoMoneda.required_if' => 'Olvidaste indicar la moneda.',
                'nombreRazonSocial.required' => 'Olvidaste indicar el nombre/razón social.',
                /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                ////////////////////////// FIDEICOMISOS
                /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                'tipoRelacion.required' => 'El tipo de relación es obligatorio.',
                'tipoRelacion.exists' => 'El tipo de relación no existe en la lista dada.',
                'tipoParticipacion.required' => 'El tipo de relación es obligatorio.',
                'tipoParticipacion.exists' => 'El tipo de relación no existe en la lista dada.',
                'tipoFideicomiso.required' => 'El tipo de fideicomiso es obligatorio.',
                'tipoFideicomiso.exists' => 'El tipo de fideicomiso no existe en la lista dada.',
                'sectorClave.required' => 'Olvidaste indicar el sector.',
                'tipoPersona.required_unless' => 'Olvidaste indicar el tipo de persona.',
                'tipoPersona.exists' => 'El tipo de persona no existe en la lista dada.',
                'nombreRazonSocial.required_unless' => 'Olvidaste indicar el nombre/razón social.',
                'nombreRazonSocial.max' => 'El nombre no puede tener más de 65 caracteres.',
                'rfcHomo.size' => 'El rfc debe tener 12 (moral) o 13 (física) caracteres.',
                'rfcHomo.alpha_num' => 'El rfc debe ser alfanumérico.',
          ];
    }



  public function rules()
  {

    if($this->method() == "DELETE")
    {
    	return [];
    }

    if($this->method() == "GET")
    {
    	return [];
    }


    if($this->method() == "POST")
    {
      (empty($this->lugarDondeReside)) ? $required_if = 'required_if:pais,MX|' : $required_if = '';
      (empty($this->lugarDondeReside)) ? $required_unless = 'required_unless:pais,MX|' : $required_unless = '';
      ($this->tipoPersona == "MORAL") ? $rfcHomo = '12' : $rfcHomo = '13';
      ($this->tipoPersona_dos == "MORAL") ? $rfcHomo2 = '12' : $rfcHomo2 = '13';

      if(isset($this->tercero['0']['tipoPersona']))
      {
        ($this->tercero['0']['tipoPersona'] == "MORAL") ? $sizete0 = '12' : $sizete0 = '13';
        ($this->tercero['1']['tipoPersona'] == "MORAL") ? $sizete1 = '12' : $sizete1 = '13';
        ($this->tercero['2']['tipoPersona'] == "MORAL") ? $sizete2 = '12' : $sizete2 = '13';
        ($this->tercero['3']['tipoPersona'] == "MORAL") ? $sizete3 = '12' : $sizete3 = '13';
        ($this->tercero['4']['tipoPersona'] == "MORAL") ? $sizete4 = '12' : $sizete4 = '13';
        ($this->tercero['5']['tipoPersona'] == "MORAL") ? $sizete5 = '12' : $sizete5 = '13';
        ($this->tercero['6']['tipoPersona'] == "MORAL") ? $sizete6 = '12' : $sizete6 = '13';
        ($this->tercero['7']['tipoPersona'] == "MORAL") ? $sizete7 = '12' : $sizete7 = '13';
        ($this->tercero['8']['tipoPersona'] == "MORAL") ? $sizete8 = '12' : $sizete8 = '13';
        ($this->tercero['9']['tipoPersona'] == "MORAL") ? $sizete9 = '12' : $sizete9 = '13';
      }
      else
      {
        $sizete0 = '13';
        $sizete1 = '13';
        $sizete2 = '13';
        $sizete3 = '13';
        $sizete4 = '13';
        $sizete5 = '13';
        $sizete6 = '13';
        $sizete7 = '13';
        $sizete8 = '13';
        $sizete9 = '13';
      }

      if(isset($this->transmisor['0']['tipoPersona']))
      {
        ($this->transmisor['0']['tipoPersona'] == "MORAL") ? $sizetr0 = '12' : $sizetr0 = '13';
        ($this->transmisor['1']['tipoPersona'] == "MORAL") ? $sizetr1 = '12' : $sizetr1 = '13';
        ($this->transmisor['2']['tipoPersona'] == "MORAL") ? $sizetr2 = '12' : $sizetr2 = '13';
        ($this->transmisor['3']['tipoPersona'] == "MORAL") ? $sizetr3 = '12' : $sizetr3 = '13';
        ($this->transmisor['4']['tipoPersona'] == "MORAL") ? $sizetr4 = '12' : $sizetr4 = '13';
        ($this->transmisor['5']['tipoPersona'] == "MORAL") ? $sizetr5 = '12' : $sizetr5 = '13';
        ($this->transmisor['6']['tipoPersona'] == "MORAL") ? $sizetr6 = '12' : $sizetr6 = '13';
        ($this->transmisor['7']['tipoPersona'] == "MORAL") ? $sizetr7 = '12' : $sizetr7 = '13';
        ($this->transmisor['8']['tipoPersona'] == "MORAL") ? $sizetr8 = '12' : $sizetr8 = '13';
        ($this->transmisor['9']['tipoPersona'] == "MORAL") ? $sizetr9 = '12' : $sizetr9 = '13';
      }
      else
      {
        $sizetr0 = '13';
        $sizetr1 = '13';
        $sizetr2 = '13';
        $sizetr3 = '13';
        $sizetr4 = '13';
        $sizetr5 = '13';
        $sizetr6 = '13';
        $sizetr7 = '13';
        $sizetr8 = '13';
        $sizetr9 = '13';
      }

      ($this->titular) ? $titularOtro = in_array("CTER", $this->titular) : $titularOtro = false ;
      ($titularOtro == true) ? $requiredTitular = 'required|' : $requiredTitular = 'nullable|';


      switch($this->route()->parameters()['formatoSlug'])
      {
        case "datosGenerales":
          return
            [
              'nombre' => 'required|max:65',
              'primerApellido' => 'required|max:65',
              'segundoApellido' => 'max:65',
              'curp' => 'required|size:18|alpha_num',
              'rfcFisica' => 'required|size:10|alpha_num',
              'homoClave' => 'required|size:3|alpha_num',
              'correoInstitucional' => 'nullable|email|max:65',
              'correoPersonal' => 'nullable|email|max:65',
              'casa' => 'nullable|digits:10',
              'ladaCasa' => 'nullable|required_with:casa|exists:catalogos.paises,LADA',
              'celular' => 'required|digits:10',
              'ladaCelular' => 'required:celular|exists:catalogos.paises,LADA',
              'situacionPersonalEstadoCivil' => 'required|exists:catalogos.situacionPersonalEstadoCivil,clave',
              'regimenMatrimonial' => 'nullable|required_if:situacionPersonalEstadoCivil,CAS|exists:catalogos.regimenMatrimonial,clave',
              'paisNacimiento' => 'required|exists:catalogos.paises,ISO2',
              'nacionalidad' => 'required|exists:catalogos.paises,ISO2',
            ];
          break;
        case "domicilioDeclarante":
          return
            [
              'pais' => 'required|exists:catalogos.paises,ISO2',
              'entidadFederativa' => 'required_if:pais,MX|nullable|exists:catalogos.inegi,Cve_Ent',
              'municipioAlcaldia' => 'required_if:pais,MX|nullable|exists:catalogos.inegi,Cve_Mun',
              'coloniaLocalidad'  => 'required_if:pais,MX|nullable|exists:catalogos.inegi,Nom_Loc',
              'calle' => 'required|max:65',
              'numeroExterior' => 'required|alpha_num|min:1|max:5',
              'numeroInterior' => 'nullable|alpha_num|min:1|max:4',
              'codigoPostal' => 'required|min:3|max:7',

              'estadoProvincia' => 'required_unless:pais,MX|max:65',
              'ciudadLocalidad' => 'required_unless:pais,MX|max:65',
            ];
          break;
        case "datosCurricularesDeclarante":
          if(!isset(request()->route()->parameters()['subformatoSlug']))
          {
            return ['ninguno' => 'boolean',];
          }
          else
          {
            return
                [
                  'tipoOperacion' => 'required|exists:catalogos.tipoOperacion,clave',
                  'nivelClave' => 'required|exists:catalogos.niveles,clave',
                  'carreraAreaConocimiento' => 'required|max:65',
                  'ubicacion' => 'required|exists:catalogos.extranjero,clave',
                  'nombreInstitucion' => 'required|max:65',
                  'estatus' => 'required|exists:catalogos.estatus,valor',
                  'documentoObtenido' => 'required|exists:catalogos.documentoObtenido,clave',
                  'fechaObtencion' => 'required|date|after:01-01-1950|before:'.date('Y-m-d'),
                ];
          }
          break;
        case "datosEmpleoCargoComision":
          return
            [
              'nombreInstitucion' => 'required|max:65',
              'nivelOrdenGobierno' => 'required|exists:catalogos.nivelOrdenGobierno,clave',
              'ambitoPublico' => 'required|exists:catalogos.ambitoPublico,clave',
              'areaAdscripcion' => 'required|max:65',
              'empleoCargoComision' => 'required|max:65',
              'nivelEmpleoCargoComision' => 'required|max:65',
              'funcionPrincipal' => 'required|max:65',
              'fechaTomaPosesion' => 'required|date|after:01-01-2010|before:'.date('Y-m-d'),
              'contratadoPorHonorarios' => 'required|boolean',
              'oficinaLada' => 'required|exists:catalogos.paises,LADA',
              'oficina' => 'required|digits_between:10,10',
              'oficinaExt' => 'nullable|digits_between:1,5',

              'pais' => 'required|exists:catalogos.paises,ISO2',
              'entidadFederativa' => 'required_if:pais,MX|nullable|exists:catalogos.inegi,Cve_Ent',
              'municipioAlcaldia' => 'required_if:pais,MX|nullable|exists:catalogos.inegi,Cve_Mun',
              'coloniaLocalidad'  => 'required_if:pais,MX|nullable|exists:catalogos.inegi,Nom_Loc',
              'calle' => 'required|max:65',
              'numeroExterior' => 'required|alpha_num|min:1|max:5',
              'numeroInterior' => 'nullable|alpha_num|min:1|max:4',
              'codigoPostal' => 'required|min:3|max:7',

              'estadoProvincia' => 'required_unless:pais,MX|max:65',
              'ciudadLocalidad' => 'required_unless:pais,MX|max:65',
            ];
          break;
        case "experienciaLaboral":
          if(!isset(request()->route()->parameters()['subformatoSlug']))
          {
            return ['ninguno' => 'boolean',];
          }
          else
          {
            return [
                    'tipoOperacion' => 'required|exists:catalogos.tipoOperacion,clave',

                    'ubicacion' => 'required|exists:catalogos.extranjero,clave',
                    'nombreInstitucion' => 'required|max:65',

                    'ambitoSectorClave' => 'required|exists:catalogos.ambitoSector,clave',

                    'rfcMoralHomo' => 'nullable|size:12|alpha_num',
                    'areaAdscripcion' => 'required|max:65',
                    'empleoCargoComision' => 'required|max:65',

                    'fechaObtencion' => 'required|date|after:01-01-1950|before:'.date('Y-m-d'),
                    'fechaEgreso' => 'required|date|after:01-01-1950|before:'.date('Y-m-d'),

                    'nivelOrdenGobierno' => 'nullable|required_if:ambitoSectorClave,PUB|exists:catalogos.nivelOrdenGobierno,clave',
                    'ambitoPublico' => 'nullable|required_if:ambitoSectorClave,PUB|exists:catalogos.ambitoPublico,clave',
                    'funcionPrincipal' => 'nullable|required_if:ambitoSectorClave,PUB|max:65',

                    'sectorClave' => 'nullable|required_if:ambitoSectorClave,PRV,OTR|exists:catalogos.sector,clave',
                   ];
          }
          break;
        case "datosPareja":
          return
            [
              'ninguno' => 'required|boolean',

              'nombre' => 'required_if:ninguno,0|max:65',
              'primerApellido' => 'required_if:ninguno,0|max:65',
              'segundoApellido' => 'max:65',
              'fechaObtencion' => 'nullable|required_if:ninguno,0|date|after:01-01-1950|before:'.date('Y-m-d'),
              'curp' => 'nullable|size:18|alpha_num',
              'rfcFisicaHomo' => 'nullable|size:13|alpha_num',
              'relacionConDeclarante' => 'nullable|required_if:ninguno,0|exists:catalogos.relacionConDeclarante,clave',
              'esDependienteEconomico' => 'nullable|required_if:ninguno,0|boolean',
              'ciudadanoExtranjero' => 'nullable|required_if:ninguno,0|boolean',
              'habitaDomicilioDeclarante' => 'nullable|required_if:ninguno,0|boolean',

              'lugarDondeReside' => 'nullable|in:SE_DESCONOCE',

              'pais' => 'nullable|required_without:lugarDondeReside|exists:catalogos.paises,ISO2',
              'entidadFederativa' => $required_if.'nullable|exists:catalogos.inegi,Cve_Ent',
              'municipioAlcaldia' => $required_if.'nullable|exists:catalogos.inegi,Cve_Mun',
              'coloniaLocalidad'  => $required_if.'nullable|exists:catalogos.inegi,Nom_Loc',
              'calle' => 'required_without:lugarDondeReside|max:65',
              'numeroExterior' => 'required_without:lugarDondeReside|nullable|alpha_num|min:1|max:5',
              'numeroInterior' => 'nullable|alpha_num|min:1|max:4',
              'codigoPostal' => 'nullable|required_without:lugarDondeReside|min:3|max:7',

              'estadoProvincia' => $required_unless.'max:65',
              'ciudadLocalidad' => $required_unless.'max:65',

              'actividadLaboralClave' => 'nullable|required_if:ninguno,0|exists:catalogos.actividadLaboral,clave',
              'nombreInstitucion' => 'nullable|required_if:actividadLaboralClave,PRI,OTRO|max:65',
              'rfcMoralHomo' => 'nullable|size:12|alpha_num',
              'empleoCargo' => 'nullable|required_if:actividadLaboralClave,PRI,OTRO|max:65',
              'fechaIngreso' => 'nullable|required_if:actividadLaboralClave,PRI,OTRO|date|after:01-01-1950|before:'.date('Y-m-d'),
              'sectorClave' => 'nullable|required_if:actividadLaboralClave,PRI,OTRO|exists:catalogos.sector,clave',
              'proveedorContratistaGobierno' => 'nullable|required_if:actividadLaboralClave,PRI,OTRO|boolean',
              'montoValor' => 'nullable|required_if:actividadLaboralClave,PUB,PRI,OTRO|max:20',
              'montoMoneda' => 'nullable|required_if:actividadLaboralClave,PUB,PRI,OTRO|exists:catalogos.monedas,code',

              'nivelOrdenGobierno' => 'nullable|required_if:actividadLaboralClave,PUB|exists:catalogos.nivelOrdenGobierno,clave',
              'ambitoPublico' => 'nullable|required_if:actividadLaboralClave,PUB|exists:catalogos.ambitoPublico,clave',
              'areaAdscripcion' => 'nullable|required_if:actividadLaboralClave,PUB|max:65',
              'funcionPrincipal' => 'nullable|required_if:actividadLaboralClave,PUB|max:65',
            ];
          break;
        case "datosDependientesEconomicos":
          if(!isset(request()->route()->parameters()['subformatoSlug']))
          {
            return ['ninguno' => 'boolean',];
          }
          else
          {
            return [
                  'nombre' => 'required|max:65',
                  'primerApellido' => 'required|max:65',
                  'segundoApellido' => 'max:65',
                  'fechaObtencion' => 'required|date|after:01-01-1950|before:'.date('Y-m-d'),
                  'curp' => 'nullable|size:18|alpha_num',
                  'rfcFisicaHomo' => 'nullable|size:13|alpha_num',
                  'parentescoRelacion' => 'required|exists:catalogos.parentescoRelacion,clave',
                  'extranjero' => 'required|boolean',
                  'habitaDomicilioDeclarante' => 'required|boolean',
                  'lugarDondeReside' => 'nullable|in:SE_DESCONOCE',
                  'pais' => 'required_without:lugarDondeReside|nullable|exists:catalogos.paises,ISO2',
                  'entidadFederativa' => $required_if.'nullable|exists:catalogos.inegi,Cve_Ent',
                  'municipioAlcaldia' => $required_if.'nullable|exists:catalogos.inegi,Cve_Mun',
                  'coloniaLocalidad'  => $required_if.'nullable|exists:catalogos.inegi,Nom_Loc',
                  'calle' => 'required_without:lugarDondeReside|max:65',
                  'numeroExterior' => 'required_without:lugarDondeReside|nullable|alpha_num|min:1|max:5',
                  'numeroInterior' => 'nullable|alpha_num|min:1|max:4',
                  'codigoPostal' => 'nullable|required_without:lugarDondeReside|min:3|max:7',
                  'estadoProvincia' => $required_unless.'max:65',
                  'ciudadLocalidad' => $required_unless.'max:65',

                  'actividadLaboralClave' => 'required|exists:catalogos.actividadLaboral,clave',
                  'nombreInstitucion' => 'nullable|required_unless:actividadLaboralClave,NIN|max:65',
                  'rfcMoralHomo' => 'nullable|size:12|alpha_num',
                  'empleoCargo' => 'nullable|required_unless:actividadLaboralClave,NIN|max:65',

                  'fechaIngreso' => 'nullable|required_unless:actividadLaboralClave,NIN|date|after:01-01-1950|before:'.date('Y-m-d'),

                  /*

                  'nivelOrdenGobierno' => 'nullable|required_if:actividadLaboralClave,PUB|exists:catalogos.nivelOrdenGobierno,clave',
                  'ambitoPublico' => 'nullable|required_if:actividadLaboralClave,PUB|exists:catalogos.ambitoPublico,clave',
                  'areaAdscripcion' => 'nullable|required_if:actividadLaboralClave,PUB|max:65',
                  'funcionPrincipal' => 'nullable|required_if:actividadLaboralClave,PUB|max:65',

                  'montoValor' => 'required_unless:actividadLaboralClave,NIN|max:20',
                  'montoMoneda' => 'required_unless:actividadLaboralClave,NIN|exists:catalogos.monedas,code',
                  'proveedorContratistaGobierno' => 'nullable|required_if:actividadLaboralClave,PRI,OTRO|boolean',
                  'sectorClave' => 'nullable|required_if:actividadLaboralClave,PRI,OTRO|exists:catalogos.sector,clave',
                  'otro' => 'required_if:sectorClave,OTRO|max:65',  */
                ];
          }
          break;
        case "ingresos":
          return
            [
              'remuneracionNetaCargoPublico' => 'required|max:20',

              'industria.0.tipo' => 'required_with:industria.0.nombreRazonSocial,industria.0.remuneracion|max:65',
              'industria.1.tipo' => 'required_with:industria.1.nombreRazonSocial,industria.1.remuneracion|max:65',
              'industria.2.tipo' => 'required_with:industria.2.nombreRazonSocial,industria.2.remuneracion|max:65',
              'industria.3.tipo' => 'required_with:industria.3.nombreRazonSocial,industria.3.remuneracion|max:65',
              'industria.4.tipo' => 'required_with:industria.4.nombreRazonSocial,industria.4.remuneracion|max:65',
              'industria.5.tipo' => 'required_with:industria.5.nombreRazonSocial,industria.5.remuneracion|max:65',
              'industria.6.tipo' => 'required_with:industria.6.nombreRazonSocial,industria.6.remuneracion|max:65',
              'industria.7.tipo' => 'required_with:industria.7.nombreRazonSocial,industria.7.remuneracion|max:65',
              'industria.8.tipo' => 'required_with:industria.8.nombreRazonSocial,industria.8.remuneracion|max:65',
              'industria.9.tipo' => 'required_with:industria.9.nombreRazonSocial,industria.9.remuneracion|max:65',

              'industria.0.nombreRazonSocial' => 'required_with:industria.0.tipo,industria.0.remuneracion|max:65',
              'industria.1.nombreRazonSocial' => 'required_with:industria.1.tipo,industria.1.remuneracion|max:65',
              'industria.2.nombreRazonSocial' => 'required_with:industria.2.tipo,industria.2.remuneracion|max:65',
              'industria.3.nombreRazonSocial' => 'required_with:industria.3.tipo,industria.3.remuneracion|max:65',
              'industria.4.nombreRazonSocial' => 'required_with:industria.4.tipo,industria.4.remuneracion|max:65',
              'industria.5.nombreRazonSocial' => 'required_with:industria.5.tipo,industria.5.remuneracion|max:65',
              'industria.6.nombreRazonSocial' => 'required_with:industria.6.tipo,industria.6.remuneracion|max:65',
              'industria.7.nombreRazonSocial' => 'required_with:industria.7.tipo,industria.7.remuneracion|max:65',
              'industria.8.nombreRazonSocial' => 'required_with:industria.8.tipo,industria.8.remuneracion|max:65',
              'industria.9.nombreRazonSocial' => 'required_with:industria.9.tipo,industria.9.remuneracion|max:65',

              'industria.0.remuneracion' => 'required_with:industria.0.tipo,industria.0.nombreRazonSocial|max:20',
              'industria.1.remuneracion' => 'required_with:industria.1.tipo,industria.1.nombreRazonSocial|max:20',
              'industria.2.remuneracion' => 'required_with:industria.2.tipo,industria.2.nombreRazonSocial|max:20',
              'industria.3.remuneracion' => 'required_with:industria.3.tipo,industria.3.nombreRazonSocial|max:20',
              'industria.4.remuneracion' => 'required_with:industria.4.tipo,industria.4.nombreRazonSocial|max:20',
              'industria.5.remuneracion' => 'required_with:industria.5.tipo,industria.5.nombreRazonSocial|max:20',
              'industria.6.remuneracion' => 'required_with:industria.6.tipo,industria.6.nombreRazonSocial|max:20',
              'industria.7.remuneracion' => 'required_with:industria.7.tipo,industria.7.nombreRazonSocial|max:20',
              'industria.8.remuneracion' => 'required_with:industria.8.tipo,industria.8.nombreRazonSocial|max:20',
              'industria.9.remuneracion' => 'required_with:industria.9.tipo,industria.9.nombreRazonSocial|max:20',

              'financiera.0.tipoInstrumento' => 'nullable|required_with:financiera.0.remuneracion|exists:catalogos.tipoInstrumento,clave',
              'financiera.1.tipoInstrumento' => 'nullable|required_with:financiera.1.remuneracion|exists:catalogos.tipoInstrumento,clave',
              'financiera.2.tipoInstrumento' => 'nullable|required_with:financiera.2.remuneracion|exists:catalogos.tipoInstrumento,clave',
              'financiera.3.tipoInstrumento' => 'nullable|required_with:financiera.3.remuneracion|exists:catalogos.tipoInstrumento,clave',
              'financiera.4.tipoInstrumento' => 'nullable|required_with:financiera.4.remuneracion|exists:catalogos.tipoInstrumento,clave',
              'financiera.5.tipoInstrumento' => 'nullable|required_with:financiera.5.remuneracion|exists:catalogos.tipoInstrumento,clave',
              'financiera.6.tipoInstrumento' => 'nullable|required_with:financiera.6.remuneracion|exists:catalogos.tipoInstrumento,clave',
              'financiera.7.tipoInstrumento' => 'nullable|required_with:financiera.7.remuneracion|exists:catalogos.tipoInstrumento,clave',
              'financiera.8.tipoInstrumento' => 'nullable|required_with:financiera.8.remuneracion|exists:catalogos.tipoInstrumento,clave',
              'financiera.9.tipoInstrumento' => 'nullable|required_with:financiera.9.remuneracion|exists:catalogos.tipoInstrumento,clave',

              'financiera.0.remuneracion' => 'required_with:financiera.0.tipoInstrumento|max:20',
              'financiera.1.remuneracion' => 'required_with:financiera.1.tipoInstrumento|max:20',
              'financiera.2.remuneracion' => 'required_with:financiera.2.tipoInstrumento|max:20',
              'financiera.3.remuneracion' => 'required_with:financiera.3.tipoInstrumento|max:20',
              'financiera.4.remuneracion' => 'required_with:financiera.4.tipoInstrumento|max:20',
              'financiera.5.remuneracion' => 'required_with:financiera.5.tipoInstrumento|max:20',
              'financiera.6.remuneracion' => 'required_with:financiera.6.tipoInstrumento|max:20',
              'financiera.7.remuneracion' => 'required_with:financiera.7.tipoInstrumento|max:20',
              'financiera.8.remuneracion' => 'required_with:financiera.8.tipoInstrumento|max:20',
              'financiera.9.remuneracion' => 'required_with:financiera.9.tipoInstrumento|max:20',

              'servicio.0.tipoServicio' => 'required_with:servicio.0.remuneracion|max:65',
              'servicio.1.tipoServicio' => 'required_with:servicio.1.remuneracion|max:65',
              'servicio.2.tipoServicio' => 'required_with:servicio.2.remuneracion|max:65',
              'servicio.3.tipoServicio' => 'required_with:servicio.3.remuneracion|max:65',
              'servicio.4.tipoServicio' => 'required_with:servicio.4.remuneracion|max:65',
              'servicio.5.tipoServicio' => 'required_with:servicio.5.remuneracion|max:65',
              'servicio.6.tipoServicio' => 'required_with:servicio.6.remuneracion|max:65',
              'servicio.7.tipoServicio' => 'required_with:servicio.7.remuneracion|max:65',
              'servicio.8.tipoServicio' => 'required_with:servicio.8.remuneracion|max:65',
              'servicio.9.tipoServicio' => 'required_with:servicio.9.remuneracion|max:65',

              'servicio.0.remuneracion' => 'required_with:servicio.0.tipoServicio|max:20',
              'servicio.1.remuneracion' => 'required_with:servicio.1.tipoServicio|max:20',
              'servicio.2.remuneracion' => 'required_with:servicio.2.tipoServicio|max:20',
              'servicio.3.remuneracion' => 'required_with:servicio.3.tipoServicio|max:20',
              'servicio.4.remuneracion' => 'required_with:servicio.4.tipoServicio|max:20',
              'servicio.5.remuneracion' => 'required_with:servicio.5.tipoServicio|max:20',
              'servicio.6.remuneracion' => 'required_with:servicio.6.tipoServicio|max:20',
              'servicio.7.remuneracion' => 'required_with:servicio.7.tipoServicio|max:20',
              'servicio.8.remuneracion' => 'required_with:servicio.8.tipoServicio|max:20',
              'servicio.9.remuneracion' => 'required_with:servicio.9.tipoServicio|max:20',

              'bien.0.tipoBienEnajenado' => 'nullable|required_with:bien.0.remuneracion|exists:catalogos.tipoBienEnajenado,clave',
              'bien.1.tipoBienEnajenado' => 'nullable|required_with:bien.1.remuneracion|exists:catalogos.tipoBienEnajenado,clave',
              'bien.2.tipoBienEnajenado' => 'nullable|required_with:bien.2.remuneracion|exists:catalogos.tipoBienEnajenado,clave',
              'bien.3.tipoBienEnajenado' => 'nullable|required_with:bien.3.remuneracion|exists:catalogos.tipoBienEnajenado,clave',
              'bien.4.tipoBienEnajenado' => 'nullable|required_with:bien.4.remuneracion|exists:catalogos.tipoBienEnajenado,clave',
              'bien.5.tipoBienEnajenado' => 'nullable|required_with:bien.5.remuneracion|exists:catalogos.tipoBienEnajenado,clave',
              'bien.6.tipoBienEnajenado' => 'nullable|required_with:bien.6.remuneracion|exists:catalogos.tipoBienEnajenado,clave',
              'bien.7.tipoBienEnajenado' => 'nullable|required_with:bien.7.remuneracion|exists:catalogos.tipoBienEnajenado,clave',
              'bien.8.tipoBienEnajenado' => 'nullable|required_with:bien.8.remuneracion|exists:catalogos.tipoBienEnajenado,clave',
              'bien.9.tipoBienEnajenado' => 'nullable|required_with:bien.9.remuneracion|exists:catalogos.tipoBienEnajenado,clave',

              'bien.0.remuneracion' => 'required_with:bien.0.tipoBienEnajenado|max:20',
              'bien.1.remuneracion' => 'required_with:bien.1.tipoBienEnajenado|max:20',
              'bien.2.remuneracion' => 'required_with:bien.2.tipoBienEnajenado|max:20',
              'bien.3.remuneracion' => 'required_with:bien.3.tipoBienEnajenado|max:20',
              'bien.4.remuneracion' => 'required_with:bien.4.tipoBienEnajenado|max:20',
              'bien.5.remuneracion' => 'required_with:bien.5.tipoBienEnajenado|max:20',
              'bien.6.remuneracion' => 'required_with:bien.6.tipoBienEnajenado|max:20',
              'bien.7.remuneracion' => 'required_with:bien.7.tipoBienEnajenado|max:20',
              'bien.8.remuneracion' => 'required_with:bien.8.tipoBienEnajenado|max:20',
              'bien.9.remuneracion' => 'required_with:bien.9.tipoBienEnajenado|max:20',

              'ingreso.0.tipoIngreso' => 'required_with:ingreso.0.remuneracion|max:65',
              'ingreso.1.tipoIngreso' => 'required_with:ingreso.1.remuneracion|max:65',
              'ingreso.2.tipoIngreso' => 'required_with:ingreso.2.remuneracion|max:65',
              'ingreso.3.tipoIngreso' => 'required_with:ingreso.3.remuneracion|max:65',
              'ingreso.4.tipoIngreso' => 'required_with:ingreso.4.remuneracion|max:65',
              'ingreso.5.tipoIngreso' => 'required_with:ingreso.5.remuneracion|max:65',
              'ingreso.6.tipoIngreso' => 'required_with:ingreso.6.remuneracion|max:65',
              'ingreso.7.tipoIngreso' => 'required_with:ingreso.7.remuneracion|max:65',
              'ingreso.8.tipoIngreso' => 'required_with:ingreso.8.remuneracion|max:65',
              'ingreso.9.tipoIngreso' => 'required_with:ingreso.9.remuneracion|max:65',

              'ingreso.0.remuneracion' => 'required_with:ingreso.0.tipoIngreso|max:20',
              'ingreso.1.remuneracion' => 'required_with:ingreso.1.tipoIngreso|max:20',
              'ingreso.2.remuneracion' => 'required_with:ingreso.2.tipoIngreso|max:20',
              'ingreso.3.remuneracion' => 'required_with:ingreso.3.tipoIngreso|max:20',
              'ingreso.4.remuneracion' => 'required_with:ingreso.4.tipoIngreso|max:20',
              'ingreso.5.remuneracion' => 'required_with:ingreso.5.tipoIngreso|max:20',
              'ingreso.6.remuneracion' => 'required_with:ingreso.6.tipoIngreso|max:20',
              'ingreso.7.remuneracion' => 'required_with:ingreso.7.tipoIngreso|max:20',
              'ingreso.8.remuneracion' => 'required_with:ingreso.8.tipoIngreso|max:20',
              'ingreso.9.remuneracion' => 'required_with:ingreso.9.tipoIngreso|max:20',
            ];
          break;
        case "actividadAnualAnterior":
          return
            [
              'servidorPublicoAnioAnterior' => 'required|boolean',
              'fechaIngreso' => 'nullable|required_if:servidorPublicoAnioAnterior,0|date|after:01-01-1950|before:'.date('Y-m-d'),
              'fechaEgreso'  => 'nullable|required_if:servidorPublicoAnioAnterior,0|date|after:01-01-1950|before:'.date('Y-m-d'),
              'remuneracionNetaCargoPublico' => 'nullable|required_if:servidorPublicoAnioAnterior,0|max:20',

              'industria.0.tipo' => 'required_with:industria.0.nombreRazonSocial,industria.0.remuneracion|max:65',
              'industria.1.tipo' => 'required_with:industria.1.nombreRazonSocial,industria.1.remuneracion|max:65',
              'industria.2.tipo' => 'required_with:industria.2.nombreRazonSocial,industria.2.remuneracion|max:65',
              'industria.3.tipo' => 'required_with:industria.3.nombreRazonSocial,industria.3.remuneracion|max:65',
              'industria.4.tipo' => 'required_with:industria.4.nombreRazonSocial,industria.4.remuneracion|max:65',
              'industria.5.tipo' => 'required_with:industria.5.nombreRazonSocial,industria.5.remuneracion|max:65',
              'industria.6.tipo' => 'required_with:industria.6.nombreRazonSocial,industria.6.remuneracion|max:65',
              'industria.7.tipo' => 'required_with:industria.7.nombreRazonSocial,industria.7.remuneracion|max:65',
              'industria.8.tipo' => 'required_with:industria.8.nombreRazonSocial,industria.8.remuneracion|max:65',
              'industria.9.tipo' => 'required_with:industria.9.nombreRazonSocial,industria.9.remuneracion|max:65',

              'industria.0.nombreRazonSocial' => 'required_with:industria.0.tipo,industria.0.remuneracion|max:65',
              'industria.1.nombreRazonSocial' => 'required_with:industria.1.tipo,industria.1.remuneracion|max:65',
              'industria.2.nombreRazonSocial' => 'required_with:industria.2.tipo,industria.2.remuneracion|max:65',
              'industria.3.nombreRazonSocial' => 'required_with:industria.3.tipo,industria.3.remuneracion|max:65',
              'industria.4.nombreRazonSocial' => 'required_with:industria.4.tipo,industria.4.remuneracion|max:65',
              'industria.5.nombreRazonSocial' => 'required_with:industria.5.tipo,industria.5.remuneracion|max:65',
              'industria.6.nombreRazonSocial' => 'required_with:industria.6.tipo,industria.6.remuneracion|max:65',
              'industria.7.nombreRazonSocial' => 'required_with:industria.7.tipo,industria.7.remuneracion|max:65',
              'industria.8.nombreRazonSocial' => 'required_with:industria.8.tipo,industria.8.remuneracion|max:65',
              'industria.9.nombreRazonSocial' => 'required_with:industria.9.tipo,industria.9.remuneracion|max:65',

              'industria.0.remuneracion' => 'required_with:industria.0.tipo,industria.0.nombreRazonSocial|max:20',
              'industria.1.remuneracion' => 'required_with:industria.1.tipo,industria.1.nombreRazonSocial|max:20',
              'industria.2.remuneracion' => 'required_with:industria.2.tipo,industria.2.nombreRazonSocial|max:20',
              'industria.3.remuneracion' => 'required_with:industria.3.tipo,industria.3.nombreRazonSocial|max:20',
              'industria.4.remuneracion' => 'required_with:industria.4.tipo,industria.4.nombreRazonSocial|max:20',
              'industria.5.remuneracion' => 'required_with:industria.5.tipo,industria.5.nombreRazonSocial|max:20',
              'industria.6.remuneracion' => 'required_with:industria.6.tipo,industria.6.nombreRazonSocial|max:20',
              'industria.7.remuneracion' => 'required_with:industria.7.tipo,industria.7.nombreRazonSocial|max:20',
              'industria.8.remuneracion' => 'required_with:industria.8.tipo,industria.8.nombreRazonSocial|max:20',
              'industria.9.remuneracion' => 'required_with:industria.9.tipo,industria.9.nombreRazonSocial|max:20',

              'financiera.0.tipoInstrumento' => 'nullable|required_with:financiera.0.remuneracion|exists:catalogos.tipoInstrumento,clave',
              'financiera.1.tipoInstrumento' => 'nullable|required_with:financiera.1.remuneracion|exists:catalogos.tipoInstrumento,clave',
              'financiera.2.tipoInstrumento' => 'nullable|required_with:financiera.2.remuneracion|exists:catalogos.tipoInstrumento,clave',
              'financiera.3.tipoInstrumento' => 'nullable|required_with:financiera.3.remuneracion|exists:catalogos.tipoInstrumento,clave',
              'financiera.4.tipoInstrumento' => 'nullable|required_with:financiera.4.remuneracion|exists:catalogos.tipoInstrumento,clave',
              'financiera.5.tipoInstrumento' => 'nullable|required_with:financiera.5.remuneracion|exists:catalogos.tipoInstrumento,clave',
              'financiera.6.tipoInstrumento' => 'nullable|required_with:financiera.6.remuneracion|exists:catalogos.tipoInstrumento,clave',
              'financiera.7.tipoInstrumento' => 'nullable|required_with:financiera.7.remuneracion|exists:catalogos.tipoInstrumento,clave',
              'financiera.8.tipoInstrumento' => 'nullable|required_with:financiera.8.remuneracion|exists:catalogos.tipoInstrumento,clave',
              'financiera.9.tipoInstrumento' => 'nullable|required_with:financiera.9.remuneracion|exists:catalogos.tipoInstrumento,clave',

              'financiera.0.remuneracion' => 'required_with:financiera.0.tipoInstrumento|max:20',
              'financiera.1.remuneracion' => 'required_with:financiera.1.tipoInstrumento|max:20',
              'financiera.2.remuneracion' => 'required_with:financiera.2.tipoInstrumento|max:20',
              'financiera.3.remuneracion' => 'required_with:financiera.3.tipoInstrumento|max:20',
              'financiera.4.remuneracion' => 'required_with:financiera.4.tipoInstrumento|max:20',
              'financiera.5.remuneracion' => 'required_with:financiera.5.tipoInstrumento|max:20',
              'financiera.6.remuneracion' => 'required_with:financiera.6.tipoInstrumento|max:20',
              'financiera.7.remuneracion' => 'required_with:financiera.7.tipoInstrumento|max:20',
              'financiera.8.remuneracion' => 'required_with:financiera.8.tipoInstrumento|max:20',
              'financiera.9.remuneracion' => 'required_with:financiera.9.tipoInstrumento|max:20',

              'servicio.0.tipoServicio' => 'required_with:servicio.0.remuneracion|max:65',
              'servicio.1.tipoServicio' => 'required_with:servicio.1.remuneracion|max:65',
              'servicio.2.tipoServicio' => 'required_with:servicio.2.remuneracion|max:65',
              'servicio.3.tipoServicio' => 'required_with:servicio.3.remuneracion|max:65',
              'servicio.4.tipoServicio' => 'required_with:servicio.4.remuneracion|max:65',
              'servicio.5.tipoServicio' => 'required_with:servicio.5.remuneracion|max:65',
              'servicio.6.tipoServicio' => 'required_with:servicio.6.remuneracion|max:65',
              'servicio.7.tipoServicio' => 'required_with:servicio.7.remuneracion|max:65',
              'servicio.8.tipoServicio' => 'required_with:servicio.8.remuneracion|max:65',
              'servicio.9.tipoServicio' => 'required_with:servicio.9.remuneracion|max:65',

              'servicio.0.remuneracion' => 'required_with:servicio.0.tipoServicio|max:20',
              'servicio.1.remuneracion' => 'required_with:servicio.1.tipoServicio|max:20',
              'servicio.2.remuneracion' => 'required_with:servicio.2.tipoServicio|max:20',
              'servicio.3.remuneracion' => 'required_with:servicio.3.tipoServicio|max:20',
              'servicio.4.remuneracion' => 'required_with:servicio.4.tipoServicio|max:20',
              'servicio.5.remuneracion' => 'required_with:servicio.5.tipoServicio|max:20',
              'servicio.6.remuneracion' => 'required_with:servicio.6.tipoServicio|max:20',
              'servicio.7.remuneracion' => 'required_with:servicio.7.tipoServicio|max:20',
              'servicio.8.remuneracion' => 'required_with:servicio.8.tipoServicio|max:20',
              'servicio.9.remuneracion' => 'required_with:servicio.9.tipoServicio|max:20',

              'bien.0.tipoBienEnajenado' => 'nullable|required_with:bien.0.remuneracion|exists:catalogos.tipoBienEnajenado,clave',
              'bien.1.tipoBienEnajenado' => 'nullable|required_with:bien.1.remuneracion|exists:catalogos.tipoBienEnajenado,clave',
              'bien.2.tipoBienEnajenado' => 'nullable|required_with:bien.2.remuneracion|exists:catalogos.tipoBienEnajenado,clave',
              'bien.3.tipoBienEnajenado' => 'nullable|required_with:bien.3.remuneracion|exists:catalogos.tipoBienEnajenado,clave',
              'bien.4.tipoBienEnajenado' => 'nullable|required_with:bien.4.remuneracion|exists:catalogos.tipoBienEnajenado,clave',
              'bien.5.tipoBienEnajenado' => 'nullable|required_with:bien.5.remuneracion|exists:catalogos.tipoBienEnajenado,clave',
              'bien.6.tipoBienEnajenado' => 'nullable|required_with:bien.6.remuneracion|exists:catalogos.tipoBienEnajenado,clave',
              'bien.7.tipoBienEnajenado' => 'nullable|required_with:bien.7.remuneracion|exists:catalogos.tipoBienEnajenado,clave',
              'bien.8.tipoBienEnajenado' => 'nullable|required_with:bien.8.remuneracion|exists:catalogos.tipoBienEnajenado,clave',
              'bien.9.tipoBienEnajenado' => 'nullable|required_with:bien.9.remuneracion|exists:catalogos.tipoBienEnajenado,clave',

              'bien.0.remuneracion' => 'required_with:bien.0.tipoBienEnajenado|max:20',
              'bien.1.remuneracion' => 'required_with:bien.1.tipoBienEnajenado|max:20',
              'bien.2.remuneracion' => 'required_with:bien.2.tipoBienEnajenado|max:20',
              'bien.3.remuneracion' => 'required_with:bien.3.tipoBienEnajenado|max:20',
              'bien.4.remuneracion' => 'required_with:bien.4.tipoBienEnajenado|max:20',
              'bien.5.remuneracion' => 'required_with:bien.5.tipoBienEnajenado|max:20',
              'bien.6.remuneracion' => 'required_with:bien.6.tipoBienEnajenado|max:20',
              'bien.7.remuneracion' => 'required_with:bien.7.tipoBienEnajenado|max:20',
              'bien.8.remuneracion' => 'required_with:bien.8.tipoBienEnajenado|max:20',
              'bien.9.remuneracion' => 'required_with:bien.9.tipoBienEnajenado|max:20',

              'ingreso.0.tipoIngreso' => 'required_with:ingreso.0.remuneracion|max:65',
              'ingreso.1.tipoIngreso' => 'required_with:ingreso.1.remuneracion|max:65',
              'ingreso.2.tipoIngreso' => 'required_with:ingreso.2.remuneracion|max:65',
              'ingreso.3.tipoIngreso' => 'required_with:ingreso.3.remuneracion|max:65',
              'ingreso.4.tipoIngreso' => 'required_with:ingreso.4.remuneracion|max:65',
              'ingreso.5.tipoIngreso' => 'required_with:ingreso.5.remuneracion|max:65',
              'ingreso.6.tipoIngreso' => 'required_with:ingreso.6.remuneracion|max:65',
              'ingreso.7.tipoIngreso' => 'required_with:ingreso.7.remuneracion|max:65',
              'ingreso.8.tipoIngreso' => 'required_with:ingreso.8.remuneracion|max:65',
              'ingreso.9.tipoIngreso' => 'required_with:ingreso.9.remuneracion|max:65',

              'ingreso.0.remuneracion' => 'required_with:ingreso.0.tipoIngreso|max:20',
              'ingreso.1.remuneracion' => 'required_with:ingreso.1.tipoIngreso|max:20',
              'ingreso.2.remuneracion' => 'required_with:ingreso.2.tipoIngreso|max:20',
              'ingreso.3.remuneracion' => 'required_with:ingreso.3.tipoIngreso|max:20',
              'ingreso.4.remuneracion' => 'required_with:ingreso.4.tipoIngreso|max:20',
              'ingreso.5.remuneracion' => 'required_with:ingreso.5.tipoIngreso|max:20',
              'ingreso.6.remuneracion' => 'required_with:ingreso.6.tipoIngreso|max:20',
              'ingreso.7.remuneracion' => 'required_with:ingreso.7.tipoIngreso|max:20',
              'ingreso.8.remuneracion' => 'required_with:ingreso.8.tipoIngreso|max:20',
              'ingreso.9.remuneracion' => 'required_with:ingreso.9.tipoIngreso|max:20',
            ];
          break;
        case "bienesInmuebles":
          if(!isset(request()->route()->parameters()['subformatoSlug']))
          {
            return ['ninguno' => 'boolean',];
          }
          else
          {
            return [
              'tipoOperacion' => 'required|exists:catalogos.tipoOperacion,clave',
              'tipoInmueble' => 'required|exists:catalogos.tipoInmueble,clave',
              'especifiqueInmueble' => 'required_if:tipoInmueble,OTRO|max:65',
              'titular' => 'required|exists:catalogos.titularBien,clave',
              'porcentaje' => 'required|max:100|min:1|integer',
              'superficieTerreno' => 'required|min:1|integer',
              'superficieTerrenoUnidad' => 'required|exists:catalogos.unidadMedida,clave',
              'superficieConstruccion' => 'min:1|integer',
              'superficieConstruccionUnidad' => 'required|exists:catalogos.unidadMedida,clave',

              'pais' => 'required|exists:catalogos.paises,ISO2',
              'entidadFederativa' => 'required_if:pais,MX|nullable|exists:catalogos.inegi,Cve_Ent',
              'municipioAlcaldia' => 'required_if:pais,MX|nullable|exists:catalogos.inegi,Cve_Mun',
              'coloniaLocalidad'  => 'required_if:pais,MX|nullable|exists:catalogos.inegi,Nom_Loc',
              'calle' => 'required|max:65',
              'numeroExterior' => 'required|alpha_num|min:1|max:5',
              'numeroInterior' => 'nullable|alpha_num|min:1|max:4',
              'codigoPostal' => 'required|min:3|max:7',

              'estadoProvincia' => 'required_unless:pais,MX|max:65',
              'ciudadLocalidad' => 'required_unless:pais,MX|max:65',

              'tercero.0.tipoPersona'  => $requiredTitular.'exists:catalogos.tipoPersona,clave',
              'tercero.0.nombreRazonSocial' => $requiredTitular.'max:65',
              'tercero.0.rfc' => 'nullable|alpha_num|size:'.$sizete0,

              'tercero.1.tipoPersona' => 'nullable|required_with:tercero.1.nombreRazonSocial|exists:catalogos.tipoPersona,clave',
              'tercero.2.tipoPersona' => 'nullable|required_with:tercero.2.nombreRazonSocial|exists:catalogos.tipoPersona,clave',
              'tercero.3.tipoPersona' => 'nullable|required_with:tercero.3.nombreRazonSocial|exists:catalogos.tipoPersona,clave',
              'tercero.4.tipoPersona' => 'nullable|required_with:tercero.4.nombreRazonSocial|exists:catalogos.tipoPersona,clave',
              'tercero.5.tipoPersona' => 'nullable|required_with:tercero.5.nombreRazonSocial|exists:catalogos.tipoPersona,clave',
              'tercero.6.tipoPersona' => 'nullable|required_with:tercero.6.nombreRazonSocial|exists:catalogos.tipoPersona,clave',
              'tercero.7.tipoPersona' => 'nullable|required_with:tercero.7.nombreRazonSocial|exists:catalogos.tipoPersona,clave',
              'tercero.8.tipoPersona' => 'nullable|required_with:tercero.8.nombreRazonSocial|exists:catalogos.tipoPersona,clave',
              'tercero.9.tipoPersona' => 'nullable|required_with:tercero.9.nombreRazonSocial|exists:catalogos.tipoPersona,clave',

              'tercero.1.nombreRazonSocial' => 'required_with:tercero.1.tipoPersona|max:65',
              'tercero.2.nombreRazonSocial' => 'required_with:tercero.2.tipoPersona|max:65',
              'tercero.3.nombreRazonSocial' => 'required_with:tercero.3.tipoPersona|max:65',
              'tercero.4.nombreRazonSocial' => 'required_with:tercero.4.tipoPersona|max:65',
              'tercero.5.nombreRazonSocial' => 'required_with:tercero.5.tipoPersona|max:65',
              'tercero.6.nombreRazonSocial' => 'required_with:tercero.6.tipoPersona|max:65',
              'tercero.7.nombreRazonSocial' => 'required_with:tercero.7.tipoPersona|max:65',
              'tercero.8.nombreRazonSocial' => 'required_with:tercero.8.tipoPersona|max:65',
              'tercero.9.nombreRazonSocial' => 'required_with:tercero.9.tipoPersona|max:65',

              'tercero.1.rfc' => 'nullable|alpha_num|size:'.$sizete1,
              'tercero.2.rfc' => 'nullable|alpha_num|size:'.$sizete2,
              'tercero.3.rfc' => 'nullable|alpha_num|size:'.$sizete3,
              'tercero.4.rfc' => 'nullable|alpha_num|size:'.$sizete4,
              'tercero.5.rfc' => 'nullable|alpha_num|size:'.$sizete5,
              'tercero.6.rfc' => 'nullable|alpha_num|size:'.$sizete6,
              'tercero.7.rfc' => 'nullable|alpha_num|size:'.$sizete7,
              'tercero.8.rfc' => 'nullable|alpha_num|size:'.$sizete8,
              'tercero.9.rfc' => 'nullable|alpha_num|size:'.$sizete9,

              'transmisor.0.tipoPersona' => 'required|exists:catalogos.tipoPersona,clave',
              'transmisor.0.nombreRazonSocial' => 'required|max:65',
              'transmisor.0.rfc' => 'nullable|alpha_num|size:'.$sizetr0,
              'transmisor.0.relacion' => 'required|exists:catalogos.parentescoRelacion,clave',
              'transmisor.0.especifiqueRelacion' => 'required_if:transmisor.0.relacion,OTRO|max:65',

              'transmisor.1.tipoPersona' => 'nullable|required_with:transmisor.1.nombreRazonSocial|exists:catalogos.tipoPersona,clave',
              'transmisor.2.tipoPersona' => 'nullable|required_with:transmisor.2.nombreRazonSocial|exists:catalogos.tipoPersona,clave',
              'transmisor.3.tipoPersona' => 'nullable|required_with:transmisor.3.nombreRazonSocial|exists:catalogos.tipoPersona,clave',
              'transmisor.4.tipoPersona' => 'nullable|required_with:transmisor.4.nombreRazonSocial|exists:catalogos.tipoPersona,clave',
              'transmisor.5.tipoPersona' => 'nullable|required_with:transmisor.5.nombreRazonSocial|exists:catalogos.tipoPersona,clave',
              'transmisor.6.tipoPersona' => 'nullable|required_with:transmisor.6.nombreRazonSocial|exists:catalogos.tipoPersona,clave',
              'transmisor.7.tipoPersona' => 'nullable|required_with:transmisor.7.nombreRazonSocial|exists:catalogos.tipoPersona,clave',
              'transmisor.8.tipoPersona' => 'nullable|required_with:transmisor.8.nombreRazonSocial|exists:catalogos.tipoPersona,clave',
              'transmisor.9.tipoPersona' => 'nullable|required_with:transmisor.9.nombreRazonSocial|exists:catalogos.tipoPersona,clave',

              'transmisor.1.nombreRazonSocial' => 'required_with:transmisor.1.tipoPersona|max:65',
              'transmisor.2.nombreRazonSocial' => 'required_with:transmisor.2.tipoPersona|max:65',
              'transmisor.3.nombreRazonSocial' => 'required_with:transmisor.3.tipoPersona|max:65',
              'transmisor.4.nombreRazonSocial' => 'required_with:transmisor.4.tipoPersona|max:65',
              'transmisor.5.nombreRazonSocial' => 'required_with:transmisor.5.tipoPersona|max:65',
              'transmisor.6.nombreRazonSocial' => 'required_with:transmisor.6.tipoPersona|max:65',
              'transmisor.7.nombreRazonSocial' => 'required_with:transmisor.7.tipoPersona|max:65',
              'transmisor.8.nombreRazonSocial' => 'required_with:transmisor.8.tipoPersona|max:65',
              'transmisor.9.nombreRazonSocial' => 'required_with:transmisor.9.tipoPersona|max:65',

              'transmisor.1.rfc' => 'nullable|alpha_num|size:'.$sizetr1,
              'transmisor.2.rfc' => 'nullable|alpha_num|size:'.$sizetr2,
              'transmisor.3.rfc' => 'nullable|alpha_num|size:'.$sizetr3,
              'transmisor.4.rfc' => 'nullable|alpha_num|size:'.$sizetr4,
              'transmisor.5.rfc' => 'nullable|alpha_num|size:'.$sizetr5,
              'transmisor.6.rfc' => 'nullable|alpha_num|size:'.$sizetr6,
              'transmisor.7.rfc' => 'nullable|alpha_num|size:'.$sizetr7,
              'transmisor.8.rfc' => 'nullable|alpha_num|size:'.$sizetr8,
              'transmisor.9.rfc' => 'nullable|alpha_num|size:'.$sizetr9,

              'transmisor.1.relacion' => 'nullable|required_with:transmisor.1.tipoPersona|exists:catalogos.parentescoRelacion,clave',
              'transmisor.2.relacion' => 'nullable|required_with:transmisor.2.tipoPersona|exists:catalogos.parentescoRelacion,clave',
              'transmisor.3.relacion' => 'nullable|required_with:transmisor.3.tipoPersona|exists:catalogos.parentescoRelacion,clave',
              'transmisor.4.relacion' => 'nullable|required_with:transmisor.4.tipoPersona|exists:catalogos.parentescoRelacion,clave',
              'transmisor.5.relacion' => 'nullable|required_with:transmisor.5.tipoPersona|exists:catalogos.parentescoRelacion,clave',
              'transmisor.6.relacion' => 'nullable|required_with:transmisor.6.tipoPersona|exists:catalogos.parentescoRelacion,clave',
              'transmisor.7.relacion' => 'nullable|required_with:transmisor.7.tipoPersona|exists:catalogos.parentescoRelacion,clave',
              'transmisor.8.relacion' => 'nullable|required_with:transmisor.8.tipoPersona|exists:catalogos.parentescoRelacion,clave',
              'transmisor.9.relacion' => 'nullable|required_with:transmisor.9.tipoPersona|exists:catalogos.parentescoRelacion,clave',

              'transmisor.1.especifiqueRelacion' => 'required_if:transmisor.1.relacion,OTRO|max:65',
              'transmisor.2.especifiqueRelacion' => 'required_if:transmisor.2.relacion,OTRO|max:65',
              'transmisor.3.especifiqueRelacion' => 'required_if:transmisor.3.relacion,OTRO|max:65',
              'transmisor.4.especifiqueRelacion' => 'required_if:transmisor.4.relacion,OTRO|max:65',
              'transmisor.5.especifiqueRelacion' => 'required_if:transmisor.5.relacion,OTRO|max:65',
              'transmisor.6.especifiqueRelacion' => 'required_if:transmisor.6.relacion,OTRO|max:65',
              'transmisor.7.especifiqueRelacion' => 'required_if:transmisor.7.relacion,OTRO|max:65',
              'transmisor.8.especifiqueRelacion' => 'required_if:transmisor.8.relacion,OTRO|max:65',
              'transmisor.9.especifiqueRelacion' => 'required_if:transmisor.9.relacion,OTRO|max:65',

              'formaAdquisicion' => 'required|exists:catalogos.formaAdquisicion,clave',
              'formaPago' => 'required|exists:catalogos.formaPago,clave',
              'montoValor' =>  'required|max:20',
              'montoMoneda' => 'required|exists:catalogos.monedas,code',
              'fechaObtencion' => 'required|date|after:01-01-1950|before:'.date('Y-m-d'),
              'numeroSerieRegistro' => 'required|max:65',
              'valorConformeA' => 'required|exists:catalogos.valorConformeA,clave',
            ];
          }
          break;
        case "vehiculos":
          if(!isset(request()->route()->parameters()['subformatoSlug']))
          {
            return ['ninguno' => 'boolean',];
          }
          else
          {
            return [
                    'tipoOperacion' => 'required|exists:catalogos.tipoOperacion,clave',
                    'tipoVehiculo' => 'required|exists:catalogos.tipoVehiculo,clave',
                    'especifiqueVehiculo' => 'required_if:tipoVehiculo,OTRO|max:65',
                    'titular' => 'required|exists:catalogos.titularBien,clave',
                    'marca' => 'required|max:65',
                    'modelo' => 'required|max:65',
                    'anio' => 'required|numeric|min:1950|max:'.date('Y'),
                    'numeroSerieRegistro' => 'required|max:65',
                    'pais' => 'required|exists:catalogos.paises,ISO2',
                    'entidadFederativa' => 'required_if:pais,MX|nullable|exists:catalogos.inegi,Cve_Ent',
                    'formaAdquisicion' => 'required|exists:catalogos.formaAdquisicion,clave',
                    'formaPago' => 'required|exists:catalogos.formaPago,clave',
                    'fechaObtencion' => 'required|date|after:01-01-1950|before:'.date('Y-m-d'),
                    'montoValor' =>  'required_if:formaPago,CPV|max:20',
                    'montoMoneda' => 'required_if:formaPago,CPV|exists:catalogos.monedas,code',

                    'tercero.0.tipoPersona'  => $requiredTitular.'exists:catalogos.tipoPersona,clave',
                    'tercero.0.nombreRazonSocial' => $requiredTitular.'max:65',
                    'tercero.0.rfc' => 'nullable|alpha_num|size:'.$sizete0,

                    'tercero.1.tipoPersona' => 'nullable|required_with:tercero.1.nombreRazonSocial|exists:catalogos.tipoPersona,clave',
                    'tercero.2.tipoPersona' => 'nullable|required_with:tercero.2.nombreRazonSocial|exists:catalogos.tipoPersona,clave',
                    'tercero.3.tipoPersona' => 'nullable|required_with:tercero.3.nombreRazonSocial|exists:catalogos.tipoPersona,clave',
                    'tercero.4.tipoPersona' => 'nullable|required_with:tercero.4.nombreRazonSocial|exists:catalogos.tipoPersona,clave',
                    'tercero.5.tipoPersona' => 'nullable|required_with:tercero.5.nombreRazonSocial|exists:catalogos.tipoPersona,clave',
                    'tercero.6.tipoPersona' => 'nullable|required_with:tercero.6.nombreRazonSocial|exists:catalogos.tipoPersona,clave',
                    'tercero.7.tipoPersona' => 'nullable|required_with:tercero.7.nombreRazonSocial|exists:catalogos.tipoPersona,clave',
                    'tercero.8.tipoPersona' => 'nullable|required_with:tercero.8.nombreRazonSocial|exists:catalogos.tipoPersona,clave',
                    'tercero.9.tipoPersona' => 'nullable|required_with:tercero.9.nombreRazonSocial|exists:catalogos.tipoPersona,clave',

                    'tercero.1.nombreRazonSocial' => 'required_with:tercero.1.tipoPersona|max:65',
                    'tercero.2.nombreRazonSocial' => 'required_with:tercero.2.tipoPersona|max:65',
                    'tercero.3.nombreRazonSocial' => 'required_with:tercero.3.tipoPersona|max:65',
                    'tercero.4.nombreRazonSocial' => 'required_with:tercero.4.tipoPersona|max:65',
                    'tercero.5.nombreRazonSocial' => 'required_with:tercero.5.tipoPersona|max:65',
                    'tercero.6.nombreRazonSocial' => 'required_with:tercero.6.tipoPersona|max:65',
                    'tercero.7.nombreRazonSocial' => 'required_with:tercero.7.tipoPersona|max:65',
                    'tercero.8.nombreRazonSocial' => 'required_with:tercero.8.tipoPersona|max:65',
                    'tercero.9.nombreRazonSocial' => 'required_with:tercero.9.tipoPersona|max:65',

                    'tercero.1.rfc' => 'nullable|alpha_num|size:'.$sizete1,
                    'tercero.2.rfc' => 'nullable|alpha_num|size:'.$sizete2,
                    'tercero.3.rfc' => 'nullable|alpha_num|size:'.$sizete3,
                    'tercero.4.rfc' => 'nullable|alpha_num|size:'.$sizete4,
                    'tercero.5.rfc' => 'nullable|alpha_num|size:'.$sizete5,
                    'tercero.6.rfc' => 'nullable|alpha_num|size:'.$sizete6,
                    'tercero.7.rfc' => 'nullable|alpha_num|size:'.$sizete7,
                    'tercero.8.rfc' => 'nullable|alpha_num|size:'.$sizete8,
                    'tercero.9.rfc' => 'nullable|alpha_num|size:'.$sizete9,

                    'transmisor.0.tipoPersona' => 'required|exists:catalogos.tipoPersona,clave',
                    'transmisor.0.nombreRazonSocial' => 'required|max:65',
                    'transmisor.0.rfc' => 'nullable|alpha_num|size:'.$sizetr0,
                    'transmisor.0.relacion' => 'required|exists:catalogos.parentescoRelacion,clave',
                    'transmisor.0.especifiqueRelacion' => 'required_if:transmisor.0.relacion,OTRO|max:65',

                    'transmisor.1.tipoPersona' => 'nullable|required_with:transmisor.1.nombreRazonSocial|exists:catalogos.tipoPersona,clave',
                    'transmisor.2.tipoPersona' => 'nullable|required_with:transmisor.2.nombreRazonSocial|exists:catalogos.tipoPersona,clave',
                    'transmisor.3.tipoPersona' => 'nullable|required_with:transmisor.3.nombreRazonSocial|exists:catalogos.tipoPersona,clave',
                    'transmisor.4.tipoPersona' => 'nullable|required_with:transmisor.4.nombreRazonSocial|exists:catalogos.tipoPersona,clave',
                    'transmisor.5.tipoPersona' => 'nullable|required_with:transmisor.5.nombreRazonSocial|exists:catalogos.tipoPersona,clave',
                    'transmisor.6.tipoPersona' => 'nullable|required_with:transmisor.6.nombreRazonSocial|exists:catalogos.tipoPersona,clave',
                    'transmisor.7.tipoPersona' => 'nullable|required_with:transmisor.7.nombreRazonSocial|exists:catalogos.tipoPersona,clave',
                    'transmisor.8.tipoPersona' => 'nullable|required_with:transmisor.8.nombreRazonSocial|exists:catalogos.tipoPersona,clave',
                    'transmisor.9.tipoPersona' => 'nullable|required_with:transmisor.9.nombreRazonSocial|exists:catalogos.tipoPersona,clave',

                    'transmisor.1.nombreRazonSocial' => 'required_with:transmisor.1.tipoPersona|max:65',
                    'transmisor.2.nombreRazonSocial' => 'required_with:transmisor.2.tipoPersona|max:65',
                    'transmisor.3.nombreRazonSocial' => 'required_with:transmisor.3.tipoPersona|max:65',
                    'transmisor.4.nombreRazonSocial' => 'required_with:transmisor.4.tipoPersona|max:65',
                    'transmisor.5.nombreRazonSocial' => 'required_with:transmisor.5.tipoPersona|max:65',
                    'transmisor.6.nombreRazonSocial' => 'required_with:transmisor.6.tipoPersona|max:65',
                    'transmisor.7.nombreRazonSocial' => 'required_with:transmisor.7.tipoPersona|max:65',
                    'transmisor.8.nombreRazonSocial' => 'required_with:transmisor.8.tipoPersona|max:65',
                    'transmisor.9.nombreRazonSocial' => 'required_with:transmisor.9.tipoPersona|max:65',

                    'transmisor.1.rfc' => 'nullable|alpha_num|size:'.$sizetr1,
                    'transmisor.2.rfc' => 'nullable|alpha_num|size:'.$sizetr2,
                    'transmisor.3.rfc' => 'nullable|alpha_num|size:'.$sizetr3,
                    'transmisor.4.rfc' => 'nullable|alpha_num|size:'.$sizetr4,
                    'transmisor.5.rfc' => 'nullable|alpha_num|size:'.$sizetr5,
                    'transmisor.6.rfc' => 'nullable|alpha_num|size:'.$sizetr6,
                    'transmisor.7.rfc' => 'nullable|alpha_num|size:'.$sizetr7,
                    'transmisor.8.rfc' => 'nullable|alpha_num|size:'.$sizetr8,
                    'transmisor.9.rfc' => 'nullable|alpha_num|size:'.$sizetr9,

                    'transmisor.1.relacion' => 'nullable|required_with:transmisor.1.tipoPersona|exists:catalogos.parentescoRelacion,clave',
                    'transmisor.2.relacion' => 'nullable|required_with:transmisor.2.tipoPersona|exists:catalogos.parentescoRelacion,clave',
                    'transmisor.3.relacion' => 'nullable|required_with:transmisor.3.tipoPersona|exists:catalogos.parentescoRelacion,clave',
                    'transmisor.4.relacion' => 'nullable|required_with:transmisor.4.tipoPersona|exists:catalogos.parentescoRelacion,clave',
                    'transmisor.5.relacion' => 'nullable|required_with:transmisor.5.tipoPersona|exists:catalogos.parentescoRelacion,clave',
                    'transmisor.6.relacion' => 'nullable|required_with:transmisor.6.tipoPersona|exists:catalogos.parentescoRelacion,clave',
                    'transmisor.7.relacion' => 'nullable|required_with:transmisor.7.tipoPersona|exists:catalogos.parentescoRelacion,clave',
                    'transmisor.8.relacion' => 'nullable|required_with:transmisor.8.tipoPersona|exists:catalogos.parentescoRelacion,clave',
                    'transmisor.9.relacion' => 'nullable|required_with:transmisor.9.tipoPersona|exists:catalogos.parentescoRelacion,clave',

                    'transmisor.1.especifiqueRelacion' => 'required_if:transmisor.1.relacion,OTRO|max:65',
                    'transmisor.2.especifiqueRelacion' => 'required_if:transmisor.2.relacion,OTRO|max:65',
                    'transmisor.3.especifiqueRelacion' => 'required_if:transmisor.3.relacion,OTRO|max:65',
                    'transmisor.4.especifiqueRelacion' => 'required_if:transmisor.4.relacion,OTRO|max:65',
                    'transmisor.5.especifiqueRelacion' => 'required_if:transmisor.5.relacion,OTRO|max:65',
                    'transmisor.6.especifiqueRelacion' => 'required_if:transmisor.6.relacion,OTRO|max:65',
                    'transmisor.7.especifiqueRelacion' => 'required_if:transmisor.7.relacion,OTRO|max:65',
                    'transmisor.8.especifiqueRelacion' => 'required_if:transmisor.8.relacion,OTRO|max:65',
                    'transmisor.9.especifiqueRelacion' => 'required_if:transmisor.9.relacion,OTRO|max:65',
                  ];
          }
          break;
        case "bienesMuebles":
          if(!isset(request()->route()->parameters()['subformatoSlug']))
          {
            return ['ninguno' => 'boolean',];
          }
          else
          {
            return [
                    'tipoOperacion' => 'required|exists:catalogos.tipoOperacion,clave',
                    'titular' => 'required|exists:catalogos.titularBien,clave',
                    'tipoBien' => 'required|exists:catalogos.tipoBien,clave',
                    'descripcionGeneralBien' => 'required|max:65',
                    'titular' => 'required|exists:catalogos.titularBien,clave',
                    'formaAdquisicion' => 'required|exists:catalogos.formaAdquisicion,clave',
                    'formaPago' => 'required|exists:catalogos.formaPago,clave',
                    'fechaObtencion' => 'required|date|after:01-01-1950|before:'.date('Y-m-d'),
                    'montoValor' =>  'required_if:formaPago,CPV|max:20',
                    'montoMoneda' => 'required_if:formaPago,CPV|exists:catalogos.monedas,code',

                    'tercero.0.tipoPersona'  => $requiredTitular.'exists:catalogos.tipoPersona,clave',
                    'tercero.0.nombreRazonSocial' => $requiredTitular.'max:65',
                    'tercero.0.rfc' => 'nullable|alpha_num|size:'.$sizete0,

                    'tercero.1.tipoPersona' => 'nullable|required_with:tercero.1.nombreRazonSocial|exists:catalogos.tipoPersona,clave',
                    'tercero.2.tipoPersona' => 'nullable|required_with:tercero.2.nombreRazonSocial|exists:catalogos.tipoPersona,clave',
                    'tercero.3.tipoPersona' => 'nullable|required_with:tercero.3.nombreRazonSocial|exists:catalogos.tipoPersona,clave',
                    'tercero.4.tipoPersona' => 'nullable|required_with:tercero.4.nombreRazonSocial|exists:catalogos.tipoPersona,clave',
                    'tercero.5.tipoPersona' => 'nullable|required_with:tercero.5.nombreRazonSocial|exists:catalogos.tipoPersona,clave',
                    'tercero.6.tipoPersona' => 'nullable|required_with:tercero.6.nombreRazonSocial|exists:catalogos.tipoPersona,clave',
                    'tercero.7.tipoPersona' => 'nullable|required_with:tercero.7.nombreRazonSocial|exists:catalogos.tipoPersona,clave',
                    'tercero.8.tipoPersona' => 'nullable|required_with:tercero.8.nombreRazonSocial|exists:catalogos.tipoPersona,clave',
                    'tercero.9.tipoPersona' => 'nullable|required_with:tercero.9.nombreRazonSocial|exists:catalogos.tipoPersona,clave',

                    'tercero.1.nombreRazonSocial' => 'required_with:tercero.1.tipoPersona|max:65',
                    'tercero.2.nombreRazonSocial' => 'required_with:tercero.2.tipoPersona|max:65',
                    'tercero.3.nombreRazonSocial' => 'required_with:tercero.3.tipoPersona|max:65',
                    'tercero.4.nombreRazonSocial' => 'required_with:tercero.4.tipoPersona|max:65',
                    'tercero.5.nombreRazonSocial' => 'required_with:tercero.5.tipoPersona|max:65',
                    'tercero.6.nombreRazonSocial' => 'required_with:tercero.6.tipoPersona|max:65',
                    'tercero.7.nombreRazonSocial' => 'required_with:tercero.7.tipoPersona|max:65',
                    'tercero.8.nombreRazonSocial' => 'required_with:tercero.8.tipoPersona|max:65',
                    'tercero.9.nombreRazonSocial' => 'required_with:tercero.9.tipoPersona|max:65',

                    'tercero.1.rfc' => 'nullable|alpha_num|size:'.$sizete1,
                    'tercero.2.rfc' => 'nullable|alpha_num|size:'.$sizete2,
                    'tercero.3.rfc' => 'nullable|alpha_num|size:'.$sizete3,
                    'tercero.4.rfc' => 'nullable|alpha_num|size:'.$sizete4,
                    'tercero.5.rfc' => 'nullable|alpha_num|size:'.$sizete5,
                    'tercero.6.rfc' => 'nullable|alpha_num|size:'.$sizete6,
                    'tercero.7.rfc' => 'nullable|alpha_num|size:'.$sizete7,
                    'tercero.8.rfc' => 'nullable|alpha_num|size:'.$sizete8,
                    'tercero.9.rfc' => 'nullable|alpha_num|size:'.$sizete9,

                    'transmisor.0.tipoPersona' => 'required|exists:catalogos.tipoPersona,clave',
                    'transmisor.0.nombreRazonSocial' => 'required|max:65',
                    'transmisor.0.rfc' => 'nullable|alpha_num|size:'.$sizetr0,
                    'transmisor.0.relacion' => 'required|exists:catalogos.parentescoRelacion,clave',
                    'transmisor.0.especifiqueRelacion' => 'required_if:transmisor.0.relacion,OTRO|max:65',

                    'transmisor.1.tipoPersona' => 'nullable|required_with:transmisor.1.nombreRazonSocial|exists:catalogos.tipoPersona,clave',
                    'transmisor.2.tipoPersona' => 'nullable|required_with:transmisor.2.nombreRazonSocial|exists:catalogos.tipoPersona,clave',
                    'transmisor.3.tipoPersona' => 'nullable|required_with:transmisor.3.nombreRazonSocial|exists:catalogos.tipoPersona,clave',
                    'transmisor.4.tipoPersona' => 'nullable|required_with:transmisor.4.nombreRazonSocial|exists:catalogos.tipoPersona,clave',
                    'transmisor.5.tipoPersona' => 'nullable|required_with:transmisor.5.nombreRazonSocial|exists:catalogos.tipoPersona,clave',
                    'transmisor.6.tipoPersona' => 'nullable|required_with:transmisor.6.nombreRazonSocial|exists:catalogos.tipoPersona,clave',
                    'transmisor.7.tipoPersona' => 'nullable|required_with:transmisor.7.nombreRazonSocial|exists:catalogos.tipoPersona,clave',
                    'transmisor.8.tipoPersona' => 'nullable|required_with:transmisor.8.nombreRazonSocial|exists:catalogos.tipoPersona,clave',
                    'transmisor.9.tipoPersona' => 'nullable|required_with:transmisor.9.nombreRazonSocial|exists:catalogos.tipoPersona,clave',

                    'transmisor.1.nombreRazonSocial' => 'required_with:transmisor.1.tipoPersona|max:65',
                    'transmisor.2.nombreRazonSocial' => 'required_with:transmisor.2.tipoPersona|max:65',
                    'transmisor.3.nombreRazonSocial' => 'required_with:transmisor.3.tipoPersona|max:65',
                    'transmisor.4.nombreRazonSocial' => 'required_with:transmisor.4.tipoPersona|max:65',
                    'transmisor.5.nombreRazonSocial' => 'required_with:transmisor.5.tipoPersona|max:65',
                    'transmisor.6.nombreRazonSocial' => 'required_with:transmisor.6.tipoPersona|max:65',
                    'transmisor.7.nombreRazonSocial' => 'required_with:transmisor.7.tipoPersona|max:65',
                    'transmisor.8.nombreRazonSocial' => 'required_with:transmisor.8.tipoPersona|max:65',
                    'transmisor.9.nombreRazonSocial' => 'required_with:transmisor.9.tipoPersona|max:65',

                    'transmisor.1.rfc' => 'nullable|alpha_num|size:'.$sizetr1,
                    'transmisor.2.rfc' => 'nullable|alpha_num|size:'.$sizetr2,
                    'transmisor.3.rfc' => 'nullable|alpha_num|size:'.$sizetr3,
                    'transmisor.4.rfc' => 'nullable|alpha_num|size:'.$sizetr4,
                    'transmisor.5.rfc' => 'nullable|alpha_num|size:'.$sizetr5,
                    'transmisor.6.rfc' => 'nullable|alpha_num|size:'.$sizetr6,
                    'transmisor.7.rfc' => 'nullable|alpha_num|size:'.$sizetr7,
                    'transmisor.8.rfc' => 'nullable|alpha_num|size:'.$sizetr8,
                    'transmisor.9.rfc' => 'nullable|alpha_num|size:'.$sizetr9,

                    'transmisor.1.relacion' => 'nullable|required_with:transmisor.1.tipoPersona|exists:catalogos.parentescoRelacion,clave',
                    'transmisor.2.relacion' => 'nullable|required_with:transmisor.2.tipoPersona|exists:catalogos.parentescoRelacion,clave',
                    'transmisor.3.relacion' => 'nullable|required_with:transmisor.3.tipoPersona|exists:catalogos.parentescoRelacion,clave',
                    'transmisor.4.relacion' => 'nullable|required_with:transmisor.4.tipoPersona|exists:catalogos.parentescoRelacion,clave',
                    'transmisor.5.relacion' => 'nullable|required_with:transmisor.5.tipoPersona|exists:catalogos.parentescoRelacion,clave',
                    'transmisor.6.relacion' => 'nullable|required_with:transmisor.6.tipoPersona|exists:catalogos.parentescoRelacion,clave',
                    'transmisor.7.relacion' => 'nullable|required_with:transmisor.7.tipoPersona|exists:catalogos.parentescoRelacion,clave',
                    'transmisor.8.relacion' => 'nullable|required_with:transmisor.8.tipoPersona|exists:catalogos.parentescoRelacion,clave',
                    'transmisor.9.relacion' => 'nullable|required_with:transmisor.9.tipoPersona|exists:catalogos.parentescoRelacion,clave',

                    'transmisor.1.especifiqueRelacion' => 'required_if:transmisor.1.relacion,OTRO|max:65',
                    'transmisor.2.especifiqueRelacion' => 'required_if:transmisor.2.relacion,OTRO|max:65',
                    'transmisor.3.especifiqueRelacion' => 'required_if:transmisor.3.relacion,OTRO|max:65',
                    'transmisor.4.especifiqueRelacion' => 'required_if:transmisor.4.relacion,OTRO|max:65',
                    'transmisor.5.especifiqueRelacion' => 'required_if:transmisor.5.relacion,OTRO|max:65',
                    'transmisor.6.especifiqueRelacion' => 'required_if:transmisor.6.relacion,OTRO|max:65',
                    'transmisor.7.especifiqueRelacion' => 'required_if:transmisor.7.relacion,OTRO|max:65',
                    'transmisor.8.especifiqueRelacion' => 'required_if:transmisor.8.relacion,OTRO|max:65',
                    'transmisor.9.especifiqueRelacion' => 'required_if:transmisor.9.relacion,OTRO|max:65',
            ];
          }
          break;
        case "adeudosPasivos":
          if(!isset(request()->route()->parameters()['subformatoSlug']))
          {
            return ['ninguno' => 'boolean',];
          }
          else
          {
            $declaracion = Declaracion::where('_id','=',request()->route()->parameters()['declaracionId'])->where('usuario','=', \Auth::user()->email)
                                                                                         ->first();

            ($declaracion->metadata['tipo'] == "INICIAL") ? $porcentaje = 'nullable' : $porcentaje = 'required';

            return [
                    'tipoOperacion' => 'required|exists:catalogos.tipoOperacion,clave',
                    'titular' => 'array|present|exists:catalogos.titularBien,clave',
                    'tipoAdeudo' => 'required|exists:catalogos.tipoAdeudo,clave',
                    'numeroCuentaContrato' => 'required|max:65',
                    'fechaObtencion' => 'required|date|after:01-01-1950|before:'.date('Y-m-d'),
                    'montoValor' => 'required|max:20',
                    'montoMoneda' => 'required|exists:catalogos.monedas,code',
                    'saldoValor' => 'required|max:20',
                    'saldoMoneda' => 'required|exists:catalogos.monedas,code',
                    'porcentaje' =>  'integer|min:0|max:100|'.$porcentaje,
                    'tipoPersona' => 'required|exists:catalogos.tipoPersona,clave',
                    'nombreInstitucion' => 'required|max:65',
                    'rfcHomo' => 'nullable|alpha_num|size:'.$rfcHomo,
                    'pais' => 'required|exists:catalogos.paises,ISO2',

                    'tercero.0.tipoPersona'  => $requiredTitular.'exists:catalogos.tipoPersona,clave',
                    'tercero.0.nombreRazonSocial' => $requiredTitular.'max:65',
                    'tercero.0.rfc' => 'nullable|alpha_num|size:'.$sizete0,

                    'tercero.1.tipoPersona'  => 'nullable|required_with:tercero.1.nombreRazonSocial|exists:catalogos.tipoPersona,clave',
                    'tercero.2.tipoPersona'  => 'nullable|required_with:tercero.2.nombreRazonSocial|exists:catalogos.tipoPersona,clave',
                    'tercero.3.tipoPersona'  => 'nullable|required_with:tercero.3.nombreRazonSocial|exists:catalogos.tipoPersona,clave',
                    'tercero.4.tipoPersona'  => 'nullable|required_with:tercero.4.nombreRazonSocial|exists:catalogos.tipoPersona,clave',
                    'tercero.5.tipoPersona'  => 'nullable|required_with:tercero.5.nombreRazonSocial|exists:catalogos.tipoPersona,clave',
                    'tercero.6.tipoPersona'  => 'nullable|required_with:tercero.6.nombreRazonSocial|exists:catalogos.tipoPersona,clave',
                    'tercero.7.tipoPersona'  => 'nullable|required_with:tercero.7.nombreRazonSocial|exists:catalogos.tipoPersona,clave',
                    'tercero.8.tipoPersona'  => 'nullable|required_with:tercero.8.nombreRazonSocial|exists:catalogos.tipoPersona,clave',
                    'tercero.9.tipoPersona' => 'nullable|required_with:tercero.9.nombreRazonSocial|exists:catalogos.tipoPersona,clave',

                    'tercero.1.nombreRazonSocial' => 'required_with:tercero.1.tipoPersona|max:65',
                    'tercero.2.nombreRazonSocial' => 'required_with:tercero.2.tipoPersona|max:65',
                    'tercero.3.nombreRazonSocial' => 'required_with:tercero.3.tipoPersona|max:65',
                    'tercero.4.nombreRazonSocial' => 'required_with:tercero.4.tipoPersona|max:65',
                    'tercero.5.nombreRazonSocial' => 'required_with:tercero.5.tipoPersona|max:65',
                    'tercero.6.nombreRazonSocial' => 'required_with:tercero.6.tipoPersona|max:65',
                    'tercero.7.nombreRazonSocial' => 'required_with:tercero.7.tipoPersona|max:65',
                    'tercero.8.nombreRazonSocial' => 'required_with:tercero.8.tipoPersona|max:65',
                    'tercero.9.nombreRazonSocial' => 'required_with:tercero.9.tipoPersona|max:65',

                    'tercero.1.rfc' => 'nullable|alpha_num|size:'.$sizete1,
                    'tercero.2.rfc' => 'nullable|alpha_num|size:'.$sizete2,
                    'tercero.3.rfc' => 'nullable|alpha_num|size:'.$sizete3,
                    'tercero.4.rfc' => 'nullable|alpha_num|size:'.$sizete4,
                    'tercero.5.rfc' => 'nullable|alpha_num|size:'.$sizete5,
                    'tercero.6.rfc' => 'nullable|alpha_num|size:'.$sizete6,
                    'tercero.7.rfc' => 'nullable|alpha_num|size:'.$sizete7,
                    'tercero.8.rfc' => 'nullable|alpha_num|size:'.$sizete8,
                    'tercero.9.rfc' => 'nullable|alpha_num|size:'.$sizete9,
            ];
          }
          break;
        case "prestamoComodato":
          if(!isset(request()->route()->parameters()['subformatoSlug']))
          {
            return ['ninguno' => 'boolean',];
          }
          else
          {
            if(empty($this->tipoInmueble))
            {
              return [
                      'tipoOperacion' => 'required|exists:catalogos.tipoOperacion,clave',
                      'tipoVehiculo' => 'required|exists:catalogos.tipoVehiculo,clave',
                      'marca' => 'required|max:65',
                      'modelo' => 'required|max:65',
                      'anio' => 'required|numeric|min:1950|max:'.date('Y'),
                      'numeroSerieRegistro' => 'required|max:65',
                      'pais' => 'required|exists:catalogos.paises,ISO2',
                      'entidadFederativa' => 'required_if:pais,MX|nullable|exists:catalogos.inegi,Cve_Ent',
                      'tipoPersona' => 'required|exists:catalogos.tipoPersona,clave',
                      'nombre' => 'required|max:65',
                      'rfcHomo' => 'nullable|alpha_num|size:'.$rfcHomo,
                      'relacionConTitular' => 'required|max:65',

                      'tipoPersona' => 'required|exists:catalogos.tipoPersona,clave',
                      'nombre' => 'required|max:65',
                      'rfcHomo' => 'nullable|alpha_num|size:'.$rfcHomo,
                      'relacionConTitular' => 'required|max:65',
              ];
            }
            else
            {
              return [
                      'tipoOperacion' => 'required|exists:catalogos.tipoOperacion,clave',
                      'tipoInmueble' => 'required|exists:catalogos.tipoInmueble,clave',
                      'tipoPersona' => 'required|exists:catalogos.tipoPersona,clave',
                      'nombre' => 'required|max:65',
                      'rfcHomo' => 'nullable|alpha_num|size:'.$rfcHomo,
                      'relacionConTitular' => 'required|max:65',

                      'pais' => 'required|exists:catalogos.paises,ISO2',
                      'entidadFederativa' => 'required_if:pais,MX|nullable|exists:catalogos.inegi,Cve_Ent',
                      'municipioAlcaldia' => 'required_if:pais,MX|nullable|exists:catalogos.inegi,Cve_Mun',
                      'coloniaLocalidad'  => 'required_if:pais,MX|nullable|exists:catalogos.inegi,Nom_Loc',
                      'calle' => 'required|max:65',
                      'numeroExterior' => 'required|alpha_num|min:1|max:5',
                      'numeroInterior' => 'nullable|alpha_num|min:1|max:4',
                      'codigoPostal' => 'required|min:3|max:7',

                      'estadoProvincia' => 'required_unless:pais,MX|max:65',
                      'ciudadLocalidad' => 'required_unless:pais,MX|max:65',
              ];
            }
          }
          break;
        case "participacion":
          if(!isset(request()->route()->parameters()['subformatoSlug']))
          {
            return ['ninguno' => 'boolean',];
          }
          else
          {
            return [
                    'tipoOperacion' => 'required|exists:catalogos.tipoOperacion,clave',
                    'tipoRelacion' => 'required|exists:catalogos.tipoRelacion,clave',
                    'nombreInstitucion' => 'required|max:65',
                    'rfcMoralHomo' => 'nullable|alpha_num|size:12',
                    'porcentaje' => 'nullable|max:100|min:1|integer',
                    'tipoParticipacion' => 'required|exists:catalogos.tipoParticipacion,clave',
                    'recibeRemuneracion' => 'required|boolean',
                    'montoValor' =>  'nullable|required_if:recibeRemuneracion,1|max:20',
                    'montoMoneda' => 'nullable|required_if:recibeRemuneracion,1|exists:catalogos.monedas,code',
                    'pais' => 'required|exists:catalogos.paises,ISO2',
                    'entidadFederativa' => 'required_if:pais,MX|nullable|exists:catalogos.inegi,Cve_Ent',
                    'sectorClave' => 'required|exists:catalogos.sector,clave',
            ];
          }
          break;
        case "participacionTomaDecisiones":
          if(!isset(request()->route()->parameters()['subformatoSlug']))
          {
            return ['ninguno' => 'boolean',];
          }
          else
          {
            return [
                    'tipoOperacion' => 'required|exists:catalogos.tipoOperacion,clave',
                    'tipoRelacion' => 'required|exists:catalogos.tipoRelacion,clave',
                    'tipoInstitucion' => 'required|exists:catalogos.tipoInstitucion,clave',
                    'nombreInstitucion' => 'required|max:65',
                    'rfcMoralHomo' => 'nullable|alpha_num|size:12',
                    'empleoCargoComision' => 'required|max:65',
                    'fechaObtencion' => 'required|date|after:01-01-1950|before:'.date('Y-m-d'),
                    'recibeRemuneracion' => 'required|boolean',
                    'montoValor' =>  'nullable|required_if:recibeRemuneracion,1|max:20',
                    'montoMoneda' => 'nullable|required_if:recibeRemuneracion,1|exists:catalogos.monedas,code',
                    'pais' => 'required|exists:catalogos.paises,ISO2',
                    'entidadFederativa' => 'required_if:pais,MX|nullable|exists:catalogos.inegi,Cve_Ent',
            ];
          }
          break;
        case "apoyos":
          if(!isset(request()->route()->parameters()['subformatoSlug']))
          {
            return ['ninguno' => 'boolean',];
          }
          else
          {
            return [
                    'tipoOperacion' => 'required|exists:catalogos.tipoOperacion,clave',
                    'tipoPersona' => 'required|exists:catalogos.tipoPersona,clave',
                    'beneficiario' => 'required|exists:catalogos.beneficiario,clave',
                    'nombrePrograma' => 'required|max:65',
                    'nombreInstitucion' => 'required|max:65',
                    'nivelOrdenGobierno' => 'required|exists:catalogos.nivelOrdenGobierno,clave',
                    'tipoApoyo' => 'required|exists:catalogos.tipoApoyo,clave',
                    'formaRecepcion' => 'required|exists:catalogos.formaRecepcion,clave',
                    'montoValor' => 'required_if:formaRecepcion,MONETARIO|max:20',
                    'montoMoneda' => 'nullable|required_if:formaRecepcion,MONETARIO|exists:catalogos.monedas,code',
                    'especifiqueEspecie' => 'required_if:formaRecepcion,ESPECIE|max:65',
            ];
          }
          break;
        case "representaciones":
          if(!isset(request()->route()->parameters()['subformatoSlug']))
          {
            return ['ninguno' => 'boolean',];
          }
          else
          {
            return [
                    'tipoOperacion' => 'required|exists:catalogos.tipoOperacion,clave',
                    'tipoRelacion' => 'required|exists:catalogos.tipoRelacion,clave',
                    'tipoRepresentacion' => 'required|exists:catalogos.tipoRepresentacion,clave',
                    'fechaObtencion' => 'required|date|after:01-01-1950|before:'.date('Y-m-d'),

                    'tipoPersona' => 'required|exists:catalogos.tipoPersona,clave',
                    'nombreRazonSocial' => 'required|max:65',
                    'rfcHomo' => 'nullable|alpha_num|size:'.$rfcHomo,
                    'pais' => 'required|exists:catalogos.paises,ISO2',
                    'entidadFederativa' => 'required_if:pais,MX|nullable|exists:catalogos.inegi,Cve_Ent',
                    'sectorClave' => 'required|exists:catalogos.sector,clave',
                    'recibeRemuneracion' => 'required|boolean',
                    'montoValor' =>  'required_if:recibeRemuneracion,1|max:20',
                    'montoMoneda' => 'nullable|required_if:recibeRemuneracion,1|exists:catalogos.monedas,code',
                  ];
          }
          break;
        case "clientesPrincipales":
          if(!isset(request()->route()->parameters()['subformatoSlug']))
          {
            return ['ninguno' => 'boolean',];
          }
          else
          {
            return [
                    'tipoOperacion' => 'required|exists:catalogos.tipoOperacion,clave',
                    'realizaActividadLucrativa' => 'required|boolean',
                    'tipoRelacion' => 'required|exists:catalogos.tipoRelacion,clave',
                    'nombreEmpresaServicio' => 'required|max:191',
                    'rfcMoralHomo' => 'nullable|alpha_num|size:12',
                    'sectorClave' => 'required|exists:catalogos.sector,clave',
                    'pais' => 'required|exists:catalogos.paises,ISO2',
                    'entidadFederativa' => 'required_if:pais,MX|nullable|exists:catalogos.inegi,Cve_Ent',
                    'tipoPersona' => 'required|exists:catalogos.tipoPersona,clave',
                    'nombreRazonSocial' => 'required|max:65',
                    'rfcHomo' => 'nullable|alpha_num|size:'.$rfcHomo,
                    'montoValor' => 'required|max:20',
                    'montoMoneda' => 'required|exists:catalogos.monedas,code',
            ];
          }
          break;
        case "beneficiosPrivados":
          if(!isset(request()->route()->parameters()['subformatoSlug']))
          {
            return ['ninguno' => 'boolean',];
          }
          else
          {
            return
              [
                'tipoOperacion' => 'required|exists:catalogos.tipoOperacion,clave',
                'tipoPersona' => 'required|exists:catalogos.tipoPersona,clave',
                'beneficiario' => 'present|array|exists:catalogos.beneficiario,clave',
                'tipoBeneficio' => 'required|exists:catalogos.tipoBeneficio,clave',
                'sectorClave' => 'required|exists:catalogos.sector,clave',
                'formaRecepcion' => 'required|exists:catalogos.formaRecepcion,clave',
                'especifiqueEspecie' => 'nullable|required_if:formaRecepcion,ESPECIE|max:65',
                'montoValor' => 'nullable|required_if:formaRecepcion,MONETARIO|max:20',
                'montoMoneda' => 'nullable|required_if:formaRecepcion,MONETARIO|exists:catalogos.monedas,code',
                'tipoPersona_dos' => 'required|exists:catalogos.tipoPersona,clave',
                'nombreRazonSocial' => 'required|max:65',
                'rfcHomo' => 'nullable|alpha_num|size:'.$rfcHomo,
              ];
          }
        case "fideicomisos":
          if(!isset(request()->route()->parameters()['subformatoSlug']))
          {
            return ['ninguno' => 'boolean',];
          }
          else
          {
            return
              [
                'tipoOperacion' => 'required|exists:catalogos.tipoOperacion,clave',
                'tipoRelacion' => 'required|exists:catalogos.tipoRelacion,clave',
                'tipoParticipacion' => 'required|exists:catalogos.tipoParticipacionFideicomiso,clave',
                'tipoFideicomiso' => 'required|exists:catalogos.tipoFideicomiso,clave',
                'rfcMoralHomo' => 'nullable|size:12|alpha_num',
                'sectorClave' => 'required|exists:catalogos.sector,clave',
                'ubicacion' => 'required|exists:catalogos.extranjero,clave',

                'tipoPersona' => 'nullable|required_unless:tipoParticipacion,COMITE_TECNICO,FIDUCIARIO|exists:catalogos.tipoPersona,clave',
                'nombreRazonSocial' => 'required_unless:tipoParticipacion,COMITE_TECNICO|max:65',
                'rfcHomo' => 'nullable|alpha_num|size:'.$rfcHomo,
              ];
          }
          break;
        default:
          return [];
      }
    }

  }//rules

}
