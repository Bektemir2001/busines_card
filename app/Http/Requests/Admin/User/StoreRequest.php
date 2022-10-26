<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'first_name' => '',
            'last_name' => '',
            'middle_name' => '',
            'image' => 'image',
            'subject' => '',
            'description' => '',
            'phone_number' => '',
            'email' => 'required|unique:users',
            'link_to_instagram' => '',
            'link_to_youtube' => '',
            'link_to_linkedin' => '',
            'link_to_telegram' => '',
            'address' => ''
        ];
    }

    public function messages(){
        return [
            'email.unique' => 'Такой email уже сушествует'
        ];
    }
}
