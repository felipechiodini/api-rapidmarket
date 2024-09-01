<?php

namespace Application\Order\Enum;

enum Status: string
{
    case Pending = 'pending';
    case Shipped = 'shipped';
    case Delivered = 'delivered';
    case Canceled = 'canceled';
}
