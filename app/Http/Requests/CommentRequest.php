<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
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
            'reply_id' => 'required|string|max:150|min:15',
            'user_id' => 'required|string|max:150|min:15',
            'signalisation_id' => 'required|string|max:150|min:15',
            'name' => 'required|string|max:50|min:5',
            'mail' => 'required|string|max:150|min:1',
            'comment' => 'required|string|max:150|min:1'
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
            'reply_id.required' => 'the reply_id field required.',
            'user_id.required' => 'the user_id field required.',
            'signalisation_id.required' => 'the signalisation_id field required.',
            'name.required' => 'the name field required.',
            'name.max' => 'the name most be =< 150 caracter.',
            'name.min' => 'the name most be >= 1 caracter.',
            'mail.required' => 'the mail field required.',
            'mail.max' => 'the mail most be =< 150 caracter.',
            'mail.min' => 'the mail most be >= 1 caracter.',
            'comment.required' => 'the comment field required.',
            'comment.max' => 'the comment most be =< 150 caracter.',
            'comment.min' => 'the comment most be >= 1 caracter.'
        ];
    }
}
