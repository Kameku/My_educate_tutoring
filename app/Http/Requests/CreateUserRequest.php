<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
           'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
           'name' => 'required',
           'password' => ['required', 'string', 'min:8', 'confirmed'],
        ];
    }

    // public function messages()
    // {
    //     return[
    //         'role_admin.required' => 'The role is required'
    //     ];
    // }
}
