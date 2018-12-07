<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChallengesCreateRequest extends FormRequest
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
          'name' => 'required',
          'description' => 'required',
          'metaChallenge' => 'required | numeric ',
          'category_id' => 'required | numeric ',
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
        'name.required' => 'El nombre del desafio es obligatorio',
        'description.required' => 'La Actividad es obligatoria',
        'metaChallenge.required' => 'Ingrese un una meta para el Desafio',
        'metaChallenge.numeric' => 'La Meta tiene que ser numerica',
      ];
    }
}
