<?php

namespace RentBike\Modules\User\Application;

use RentBike\Modules\Shared\Domain\ValueObject\Id;
use RentBike\Modules\User\Domain\User;

class UserService
{
    public function getUser(Id $id): User
    {
        return new User($id);
    }
}
