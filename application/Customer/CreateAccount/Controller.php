<?php

namespace Application\Customer\CreateAccount;

use App\Models\StoreCustomer;
use Felipechiodini\Helpers\Helpers;
use Illuminate\Support\Facades\Hash;

class Controller
{
    public function __invoke(Form $request)
    {
        $user = StoreCustomer::query()
            ->create([
                'store_id' => 1,
                'name' => $request->name,
                'email' => mb_strtolower($request->email),
                'cellphone' => Helpers::clearAllIsNotNumber($request->cellphone),
                'password' => Hash::make($request->password)
            ]);

        $token = auth()->login($user);

        $message = 'Customer created';

        return response()
            ->json(compact('message', 'user', 'token'));
    }
}
