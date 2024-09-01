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
                'name' => $request->name,
                'address' => $request->address,
                'phone' => $request->phone
            ]);

        $message = 'Address added';

        return response()
            ->json(compact('message'));
    }
}
