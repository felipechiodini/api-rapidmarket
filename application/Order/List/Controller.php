<?php

namespace Application\Order\List;

use App\Models\CustomerOrder;
use Illuminate\Http\Request;

class Controller
{
    public function __invoke(Request $request)
    {
        $orders = CustomerOrder::query()
            ->where('customer_id', $request->user()->id)
            ->get();

        return response()
            ->json(compact('orders'));
    }
}
