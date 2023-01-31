<?php namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Declaracion;


class DashboardRequest extends FormRequest
{

  public function authorize()
  {
    return true;
  }





  public function messages()
  {
    return [
            'nombre.required'    => 'Olvidaste agregar el nombre.',
            'nombre.max'			    => 'El nombre no puede tener más de 65 letras.',
            'primerApellido.required'	=> 'El primer apellido es obligatorio.',
            'primerApellido.required_if'	=> 'El primer apellido es obligatorio.',
            'primerApellido.max'	=> 'El primer apellido no puede tener más de 65 letras.',
            'segundoApellido.max' => 'El segundo apellido no puede tener más de 65 letras.',

            'correo.email' => 'El correo está mal escrito.',
            'correo.required' => 'Olvidaste indicar el correo electrónico.',
            'correo.max' => 'El correo no puede tener más de 65 caracteres.',

            'celular.required' => 'Olvidaste indicar el celular.',
            'celular.size' => 'El celular no puede tener más de 10 digitos.',

            'usuario.required' => 'Olvidaste indicar el usuario.',
            'usuario.max' => 'El usuario no puede tener más de 12 caracteres.',


            'curp.alpha_num' => 'El CURP debe contener letras y números únicamente.',
            'rfcFisica.required' => 'El RFC es obligatorio.',
            'rfcFisica.size' => 'El RFC debe tener 10 caracteres.',
            'rfcFisica.alpha_num' => 'El RFC debe contener letras y números únicamente.',
            'homoClave.required' => 'La homoclave es obligatoria.',
            'homoClave.size' => 'La homoclave debe tener 3 caracteres.',
            'homoClave.alpha_num' => 'La homoclave debe contener letras y números únicamente.',

            'instituto.required'    => 'Olvidaste agregar el nombre del ente.',
            'instituto.max'			    => 'El nombre no puede tener más de 65 letras.',
            'estado.required_if' => 'Olvidaste agregar la entidad.',
            'estado.exists' => 'La entidad no existe en la lista dada.',

            'contrasenaGeneral.required'    => 'Olvidaste agregar la contraseña predeterminada para todos tus usuarios.',
            'contrasenaGeneral.max'			    => 'La contraseña predeterminada para todos los usuarios no puede tener más de 15 digitos.',
            'contrasenaAdmin.required'    => 'Olvidaste agregar la contraseña del contralor para todos tus usuarios.',
            'contrasenaAdmin.max'			    => 'La contraseña del contralor para todos los usuarios no puede tener más de 15 digitos.',
            'confirmarAdmin.same' => 'La contraseña del contralor no coincide con la confirmación.',

            'id.required' => 'Olvidaste indicar un declarante.',
            'id.exists' => 'El usuario no existe en la lista de declarantes.',

            'tipo.required' => 'Olvidaste indicar el tipo de declarante.',
            'tipo.in' => 'El tipo de declarante no existe en la lista dada.',

            'excel.required' => 'Olvidaste subir un excel.',
          ];
    }



    public function rules()
    {
      if($this->method() == "GET")
      {
      	return [];
      }



      if($this->method() == "PATCH")
      {
        if(request()->route()->uri == "inicio/transparencia")
        {
      	   return [
                    //'id' => 'required|exists:users,_id',
                  ];
        }


        if(request()->route()->uri == "declarante/contrasena")
        {
      	   return [
                    'id' => 'required|exists:users,_id',
                  ];
        }


        if(request()->route()->uri == "declarante/crear")
        {
      	   return [
                   'nombre' => 'required|max:65',
                   'primerApellido' => 'required|max:65',
                   'segundoApellido' => 'max:65',
                   'rfcFisica' => 'required|size:10|alpha_num',
                   'homoClave' => 'required|size:3|alpha_num',
                   'tipo' => 'required|boolean',
                   'periodo' => 'required',
                  ];
        }

        if(request()->route()->uri == "inicio/titular")
        {
          return[
            'nombre' => 'required|max:65',
            'primerApellido' => 'required|max:65',
            'segundoApellido' => 'max:65',
            'correo' => 'email|required|max:65',
            'celular' => 'required|size:10',
            'usuario' => 'required|max:65',
            'contrasenaGeneral' => 'nullable',
            'confirmarContrasena' => 'same:password',
          ];
        }

        if(request()->route()->uri == "inicio/contrasena")
        {
          return[
            'contrasenaGeneral' => 'nullable',
            'confirmarContrasena' => 'same:password',
          ];
        }

      }



      if($this->method() == "DELETE")
      {
      	return [
          'id' => 'required|exists:users,_id',
        ];
      }



      if($this->method() == "POST")
      {

        if(request()->route()->uri == "declarante/crear")
        {
          return
              [
                'nombre' => 'required|max:65',
                'primerApellido' => 'required|max:65',
                'segundoApellido' => 'max:65',
                'rfcFisica' => 'required|size:10|alpha_num',
                'homoClave' => 'required|size:3|alpha_num',
                'tipo' => 'required|boolean',
                'periodo' => 'required',
              ];
        }
        elseif(request()->route()->uri == "declarante/importar")
        {
          return [
            'excel' => 'required|',
          ];
        }
        elseif(request()->route()->uri == "configuracion")
        {
          return
              [
                'contrasenaGeneral' => 'required|max:15',
              ];
        }

      }
    }//rules

}
