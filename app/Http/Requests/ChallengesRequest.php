<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChallengesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
          'name' => 'requiered',
          'description' => 'requiered',
          'step_1' => 'requiered | numeric ',
          'step_2' => 'requiered | numeric ',
          'step_3' => 'requiered | numeric ',
          'step_4' => 'requiered | numeric ',
          'step_5' => 'requiered | numeric ',
          'category_id' => 'requiered | numeric ',
        ];
    }
    /**
    * Get the validation messages that apply to the request.
    *
    * @return array
    */
    public function messages()
    {
      return [
        'name.required' => 'El nombre es obligatorio',
        'description.required' => 'La description es obligatoria',
        'step_1.required' => 'Ingrese un numero para el 2 paso',
        'step_2.required' => 'Ingrese un numero para el 2 paso',
        'step_3.required' => 'Ingrese un numero para el 2 paso',
        'step_4.required' => 'Ingrese un numero para el 2 paso',
        'step_5.required' => 'Ingrese un numero para el 2 paso',
        'step_1.numeric' => 'El valor tiene que ser numerico',
        'step_2.numeric' => 'El valor tiene que ser numerico',
        'step_3.numeric' => 'El valor tiene que ser numerico',
        'step_4.numeric' => 'El valor tiene que ser numerico',
        'step_5.numeric' => 'El valor tiene que ser numerico',
      ];
    }
}
