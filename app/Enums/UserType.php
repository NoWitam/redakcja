<?php

namespace App\Enums;

enum UserType: int
{
    case Reader = 1;
    case Writer = 2;
}
