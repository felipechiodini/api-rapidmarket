<?php

namespace Application\Cart\Decrease;

use Illuminate\Foundation\Http\FormRequest;

class Form extends FormRequest
{
    public function rules()
    {
        return [
            'product_id' => 'required',
        ];
    }
}
