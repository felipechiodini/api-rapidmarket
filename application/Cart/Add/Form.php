<?php

namespace Application\Cart\Add;

use Illuminate\Foundation\Http\FormRequest;

class Form extends FormRequest
{
    public function rules()
    {
        return [
            'product_id' => 'required',
            'quantity' => 'required|integer|min:1',
        ];
    }
}
