<?php

namespace App\Enums;

enum Lang: string
{
    case IT = 'it';
    case EN = 'en';

    public function label(): string
    {
        return match($this) {
            self::IT => 'it',
            self::EN => 'en',
        };
    }
}
