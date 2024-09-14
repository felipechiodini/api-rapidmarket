<?php

namespace Panel\User\Login;

use Illuminate\Foundation\Http\FormRequest;

class Form extends FormRequest
{
    public function rules()
    {
        return [
            'email' => 'required|email',
            'password' => 'required',
        ];
    }
}
