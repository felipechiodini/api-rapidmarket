<?php

namespace Application\Cart\Add;

use Application\Customer\Domain\Cart;

interface PersistenceContract
{
    public function addProductInCart(Cart $cart): void;
}
