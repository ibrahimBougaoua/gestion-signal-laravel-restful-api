<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SignalisationRequest extends FormRequest
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
            'desc' => 'required|string|max:150|min:15',
            'localisation' => 'required|string|max:50|min:5',
            'lieu' => 'required|string|max:50|min:5',
            'nature' => 'required|string|max:50|min:5',
            'cause' => 'required|string|max:50|min:5'
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
            'desc.required' => 'the description field required.',
            'desc.max' => 'the description most be =< 150 caracter.',
            'desc.min' => 'the description most be >= 15 caracter.',
            'localisation.required' => 'the localisation field required.',
            'localisation.max' => 'the localisation most be =< 50 caracter.',
            'localisation.min' => 'the localisation most be >= 5 caracter.',
            'lieu.required' => 'the lieu field required.',
            'lieu.max' => 'the lieu most be =< 50 caracter.',
            'lieu.min' => 'the lieu most be >= 5 caracter.',
            'nature.required' => 'the nature field required.',
            'nature.max' => 'the nature most be =< 50 caracter.',
            'nature.min' => 'the nature most be >= 5 caracter.',
            'cause.required' => 'the cause field required.',
            'cause.max' => 'the cause most be =< 50 caracter.',
            'cause.min' => 'the cause most be >= 5 caracter.'
        ];
    }
}
