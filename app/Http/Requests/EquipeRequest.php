<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EquipeRequest extends FormRequest
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
            'd_f_equipe' => 'required|string|max:150|min:15',
            'email' => 'required|string|max:150|min:10|unique:equipes,email,'.$this->id,
            'telephone' => 'required|string|max:10|min:10|unique:equipes,telephone,'.$this->id,
            'chef_equipe' => 'required|string|max:50|min:5'
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'email.required' => 'the email field required.',
            'email.max' => 'the email most be =< 150 caracter.',
            'email.min' => 'the email most be >= 10 caracter.',
            'telephone.required' => 'the telephone field required.',
            'telephone.max' => 'the telephone most be =< 10 caracter.',
            'telephone.min' => 'the telephone most be >= 10 caracter.',
            'd_f_equipe.required' => 'the d_f_equipe field required.',
            'd_f_equipe.max' => 'the d_f_equipe most be =< 150 caracter.',
            'd_f_equipe.min' => 'the d_f_equipe most be >= 15 caracter.',
            'chef_equipe.required' => 'the chef equipe field required.'
        ];
    }
}
