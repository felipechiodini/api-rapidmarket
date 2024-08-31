<?php

namespace Aplication\Customer\Controllers\CreateAccount;

use App\Models\StoreCustomer;

class Controller
{
    public function __invoke(Form $request)
    {
        StoreCustomer::query()
            ->create($request->validated());
    }
}
