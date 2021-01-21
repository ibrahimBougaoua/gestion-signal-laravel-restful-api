<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InterventionRequest extends FormRequest
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
            'signalisation_id' => 'required|string|max:150|min:15',
            'price' => 'required|string|max:50|min:5',
            'etat_avancement' => 'required|string|max:150|min:1',
            'date_debut' => 'required|string|max:150|min:1',
            'date_fin' => 'required|string|max:150|min:1',
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
            'signalisation_id.required' => 'the signalisation_id field required.',
            'price.required' => 'the price field required.',
            'price.max' => 'the price most be =< 150 caracter.',
            'price.min' => 'the price most be >= 1 caracter.',
            'etat_avancement.required' => 'the etat_avancement field required.',
            'etat_avancement.max' => 'the etat_avancement most be =< 150 caracter.',
            'etat_avancement.min' => 'the etat_avancement most be >= 1 caracter.',
            'date_debut.required' => 'the date_debut field required.',
            'date_debut.max' => 'the date_debut most be =< 150 caracter.',
            'date_debut.min' => 'the date_debut most be >= 1 caracter.',
            'date_fin.required' => 'the date_fin field required.',
            'date_fin.max' => 'the date_fin most be =< 150 caracter.',
            'date_fin.min' => 'the date_fin most be >= 1 caracter.'
        ];
    }
}
