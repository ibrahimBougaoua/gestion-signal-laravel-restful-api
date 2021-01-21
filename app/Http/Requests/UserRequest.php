<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => 'required|string|max:50|min:3',
            'email' => 'required|string|max:150|min:10|unique:users,email,'.$this->id,
            'password' => 'required|string|max:255|min:3',
            'role' => 'required|string|max:15|min:3',
            'sexe' => 'required|string|max:6|min:3',
            'telephone' => 'required|string|max:10|min:10'
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
            'name.required' => 'the name field required.',
            'name.max' => 'the name most be =< 50 caracter.',
            'name.min' => 'the name most be >= 3 caracter.',
            'email.required' => 'the email field required.',
            'email.unique' => 'the email most be unique.',
            'email.max' => 'the email most be =< 150 caracter.',
            'email.min' => 'the email most be >= 10 caracter.',
            'password.required' => 'the password field required.',
            'password.min' => 'the password most be >= 3 caracter.',
            'role.required' => 'the role field required.',
            'role.max' => 'the description most be =< 15 caracter.',
            'role.min' => 'the description most be >= 3 caracter.',
            'sexe.required' => 'the sexe field required.',
            'sexe.max' => 'the sexe most be =< 6 caracter.',
            'sexe.min' => 'the sexe most be >= 3 caracter.',
            'telephone.required' => 'the telephone field required.',
            'telephone.max' => 'the telephone most be =< 10 caracter.',
            'telephone.min' => 'the telephone most be >= 10 caracter.'
        ];
    }
}
