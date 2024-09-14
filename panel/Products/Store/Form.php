<?php

namespace Admin\Products\Controllers;

use Illuminate\Foundation\Http\FormRequest;

class Form extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required|string',
            'image' => 'required|file',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'price_from' => 'required|numeric'
        ];
    }
}
