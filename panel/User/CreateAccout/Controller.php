<?php

namespace Panel\User\CreateAccout;

use App\Models\User;
use Hash;

class Controller
{
    public function __invoke(Form $request)
    {
        User::query()
            ->create([
                'name' => $request->name,
                'email' => $request->email,
                'cellphone' => $request->cellphone,
                'password' => Hash::make($request->password)
            ]);

        $message = 'User created';

        return response()
            ->json(compact('message'));
    }
}
