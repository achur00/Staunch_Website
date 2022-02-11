<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rules;
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

        $rule = [

            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'company_name' => 'required|string',
            'role' => 'required|numeric',
            'phone' => 'required|regex:/(0)[0-9]{10}/|unique:users',
            'company_address'=> 'required|string',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ];


        return $rule;
    }
}
