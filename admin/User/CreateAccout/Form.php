<?php

namespace Panel\User\CreateAccout;

use Illuminate\Foundation\Http\FormRequest;

class Form extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required|string',
            'email' => 'required|email|unique:store_customers,email',
            'cellphone' => 'required|string',
            'password' => 'required|string|min:6',
        ];
    }
}
