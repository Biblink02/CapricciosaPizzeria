<?php

namespace App\Actions\Navigation;

use App\Models\Supplier;
use Illuminate\Support\Facades\Cache;
class GetSuppliers
{
    public function get()
    {
        return Cache::rememberForever('visible_suppliers', function () {
            return Supplier::where('is_visible', true)
                ->orderByRaw('`sort_key` IS NULL, `sort_key` ASC')
                ->get();
        });
    }
}

