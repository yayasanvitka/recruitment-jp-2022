<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Foundation\Http\FormRequest;

class MemberRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // only allow updates if the user is logged in
        return backpack_auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'code' => 'required|max:7|unique:members,code',
            'name' => 'required|max:45',
            'email' => 'required|email:dns|max:45|unique:members',
            'district_id' => 'required|max:45',
        ];
    }

    /**
     * Get the validation attributes that apply to the request.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'code' => 'Code',
            'name' => 'Name',
            'email' => 'Email',
            'district_id' => 'District',
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'code.required' => 'The code field is required.',
            'code.max' => 'The code may not be greater than 7 characters.',
            'code.unique' => 'The code has already been taken.',
            'name.required' => 'The name field is required.',
            'name.max' => 'The name may not be greater than 45 characters.',
            'email.required' => 'The email field is required.',
            'email.email' => 'The email must be a valid email address.',
            'email.max' => 'The email may not be greater than 45 characters.',
            'email.unique' => 'The email has already been taken.',
            'district_id.required' => 'The district field is required.',
        ];
    }
}
