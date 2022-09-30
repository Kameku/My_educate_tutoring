<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateAttenRequest extends FormRequest
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

                'term' => 'required',
                'lesson'=> 'required',
                'student_name'=> 'required',
                'tutor_name'=> 'required',
                'student_attendance'=> 'required',
                'homework_completed'=> 'required',
                'weekly_lesson'=> 'required',
                'homework_assignment'=> 'required',
                'email_school'=> 'required',
    
        ];
    }
}
