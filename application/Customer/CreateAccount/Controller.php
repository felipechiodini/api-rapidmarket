<?php

namespace Application\Customer\CreateAccount;

use App\Models\StoreCustomer;

class Controller
{
    public function __invoke(Form $request)
    {
        StoreCustomer::query()
            ->create([
                'name' => $request->get('name'),
                'email' => $request->get('email'),
            ]);

        $message = 'Customer created';

        return response()
            ->json(compact('message'));
    }
}
