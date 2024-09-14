<?php

namespace Admin\Products\Controllers;

use Admin\Products\Store\PersistenceContract;

class Controller
{
    public function __invoke(Form $request, PersistenceContract $persistence)
    {
        $persistence->addProductInStore($request->validated());

        $message = 'Product added in store.';

        return response()
            ->json(compact('message'));
    }
}
