<?php

namespace RentBike\Modules\Shared\Domain;

use RentBike\Modules\Shared\Domain\ValueObject\Id;

abstract class Entity
{
    public function __construct(
        public Id|null $id = null
    ) {
    }

}
