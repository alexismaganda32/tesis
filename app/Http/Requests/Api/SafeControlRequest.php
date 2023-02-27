<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class SafeControlRequest extends FormRequest
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
        \App::setLocale($this->language);

        return [
            'language' => 'required|in:es,en',
            'full_name' => 'required|max:192',
            'accept_terms' => 'required|regex:/[0-9]+/|between:0,1|in:0,1',
            'signature' => 'required|base64image'
        ];
    }
}