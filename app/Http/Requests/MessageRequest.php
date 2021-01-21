<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MessageRequest extends FormRequest
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
            'send_user_id' => 'required|string|max:150|min:15',
            'catch_user_id' => 'required|string|max:50|min:5',
            'message' => 'required|string|max:150|min:1'
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
            'send_user_id.required' => 'the send_user_id field required.',
            'catch_user_id.required' => 'the catch_user_id field required.',
            'message.required' => 'the message field required.',
            'message.max' => 'the message most be =< 150 caracter.',
            'message.min' => 'the message most be >= 1 caracter.'
        ];
    }
}
