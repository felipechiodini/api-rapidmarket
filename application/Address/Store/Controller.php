<?php

namespace Application\Address\Store;

use App\Models\CustomerAddress;

class Controller
{
    public function __invoke(Form $request)
    {
        CustomerAddress::query()
            ->create([
                'customer_id' => $request->user()->id,
                'street' => $request->street,
                'number' => $request->number,
                'neighborhood' => $request->neighborhood,
                'complement' => $request->complement,
                'cep' => $request->cep,
                'city' => $request->city,
                'state' => $request->state,
                'country' => $request->country,
            ]);

        $message = 'Address added';

        return response()
            ->json(compact('message'));
    }
}
