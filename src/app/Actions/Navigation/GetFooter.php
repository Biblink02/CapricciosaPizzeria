<?php

namespace App\Actions\Navigation;

use Illuminate\Support\Facades\Route;

class GetFooter
{
    public function get(): array
    {
        return config('custom.footer');
    }
}
