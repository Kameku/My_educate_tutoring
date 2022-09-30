<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EnquiryRequest extends FormRequest
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
            'first_name' => ['required'],
            'last_name'  => ['required'], 
            // 'home_phone' => ['required'],
            'adress'     => ['required'],
            'suburb'     => ['required'],
            'post_code'  => ['required'],
            'date_of_birth' => ['required'],
            'language_home' => ['required'],
            'parent_name'   => ['required'],
            'parent_mobile' => ['required'],
            'parent_email'  => ['required'],
            // 'parent_adress' => ['required'],
        ];
    }
}
