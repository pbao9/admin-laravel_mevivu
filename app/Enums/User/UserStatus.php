<?php

namespace App\Enums\User;

use App\Supports\Enum;

enum UserStatus: int
{
    use Enum;

    case Active = 1;
    case Locked = 2;
}
