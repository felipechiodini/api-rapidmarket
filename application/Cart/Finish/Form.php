<?php

namespace Application\Cart\Finish;

use Illuminate\Foundation\Http\FormRequest;

class Form extends FormRequest
{
    public function rules()
    {
        return [
            'address_id' => 'required',
        ];
    }
}
