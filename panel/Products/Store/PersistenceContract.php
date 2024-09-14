<?php

namespace Admin\Products\Store;

interface PersistenceContract
{
    public function addProductInStore(array $data): void;
}
