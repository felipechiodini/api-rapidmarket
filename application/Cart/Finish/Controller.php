<?php

namespace Application\Cart\Finish;

use App\Models\CustomerAddress;
use App\Models\CustomerCart;
use App\Models\CustomerOrder;
use App\Models\OrderAddress;
use App\Models\OrderItem;
use App\Models\OrderSchedule;
use Application\Customer\UseCases\GetCart;
use Application\Order\Enum\Status;

class Controller
{
    public function __invoke(Form $request, GetCart $getCart)
    {
        $cart = $getCart->execute($request->user()->id);

        $customerOrder = CustomerOrder::query()
            ->create([
                'customer_id' => $request->user()->id,
                'status' => Status::Pending,
                'total' => $cart->total,
                'subtotal' => $cart->total,
                'discount' => 0,
                'delivery_fee' => 10,
                'requested_at' => now(),
            ]);

        $cart->products->each(function ($product) use ($customerOrder) {
            OrderItem::query()
                ->create([
                    'order_id' => $customerOrder->id,
                    'product_id' => $product->id,
                    'price' => $product->price,
                    'quantity' => $product->quantity,
                ]);
        });

        $customerAddress = CustomerAddress::query()
            ->find($request->get('address_id'));

        OrderAddress::query()
            ->create([
                'order_id' => $customerOrder->id,
                'cep' => $customerAddress->cep,
                'street' => $customerAddress->street,
                'neighborhood' => $customerAddress->neighborhood,
                'number' => $customerAddress->number,
                'city' => $customerAddress->city,
                'state' => $customerAddress->state,
                'country' => $customerAddress->country,
            ]);

        OrderSchedule::query()
            ->create([
                'order_id' => $customerOrder->id
            ]);

        $this->closeCart($cart->id);

        $message = 'Pedido gerado com successo';

        return response()
            ->json(compact('message'));
    }

    private function closeCart(int $cartID)
    {
        CustomerCart::query()
            ->where('id', $cartID)
            ->update([
                'open' => false
            ]);
    }
}
