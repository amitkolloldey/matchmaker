<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileUpdateRequest extends FormRequest
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
            'name'=>'required|max:255',
            'rewards'=>'required',
            'age'=>'numeric|min:18'
        ];
    }
    public function messages()
    {
        return[
            'name.required' => 'The name field is required.',
            'email.unique' => 'The Email Is Already Registered Please Login.',

        ];
    }
}
