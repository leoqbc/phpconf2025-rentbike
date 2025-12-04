<?php

namespace RentBike\Modules\Shared\Domain\ValueObject;

class Id
{
    public function __construct(
        protected string|int $value
    ) {
    }

    public function getValue(): string|int
    {
        return $this->value;
    }
}
