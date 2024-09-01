<?php

namespace Application\Customer\Login;

use App\Models\StoreCustomer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class Controller
{
    public function __invoke(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $user = StoreCustomer::query()
            ->where('email', $credentials['email'])
            ->first();

        if (!$user || !Hash::check($credentials['password'], $user->password)) {
            throw ValidationException::withMessages([
                'email' => 'Usuário ou senha inválidos.',
            ]);
        }

        $token = $user->createToken($user->name.'-AuthToken')->plainTextToken;

        return response()
            ->json(compact('user', 'token'));
    }
}
