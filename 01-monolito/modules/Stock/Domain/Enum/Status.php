<?php

namespace RentBike\Modules\Stock\Domain\Enum;

enum Status: string
{
    case AVAILABLE = 'AVAILABLE';
    case RESERVED = 'RESERVED';

    case PICKED_UP = 'PICKED_UP';
}
