<?php

namespace Application\Customer\CreateAccount;

use App\Models\StoreCustomer;

class Controller
{
    public function __invoke(Form $request)
    {
        $user = StoreCustomer::query()
            ->create([
                'store_id' => 1,
                'name' => $request->name,
                'email' => $request->email,
                'cellphone' => $request->cellphone,
                'password' => $request->password
            ]);

        $token = auth()->login($user);

        $message = 'Customer created';

        return response()
            ->json(compact('message', 'user', 'token'));
    }
}
