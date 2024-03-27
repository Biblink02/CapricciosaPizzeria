<?php

namespace App\Actions\Navigation;

use App\Models\Menu;
use App\Models\Supplier;

class GetSuppliers
{
    public function get()
    {
        return Supplier::where('is_visible',true)->get();
    }
}
