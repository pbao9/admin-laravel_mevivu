<?php

namespace App\Enums;

use App\Supports\Enum;

enum Gender: int
{
    use Enum;

    case Male = 1;
    case Female = 2;
    case Other = 3;
}
