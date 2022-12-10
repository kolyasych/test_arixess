<?php

namespace App\Http\Requests\Request\Applications;

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
            'subject' => 'required|min:3|max:50|',
            'message' => 'required',
            'user_id' => 'required|integer'
        ];
    }

    /**
     * @return string[]
     */
    public function messages()
    {
        return [
            'subject.required' => 'Дане поле обовязкове для заповнення',
            'subject.min' => 'Довжина даного поля не менше 3 символів',
            'subject.max' => 'Довжина даного поля не більше 50 символів',
            'message.required' => 'Дане поле обовязкове для заповнення',
        ];


    }

}
