<?php

declare(strict_types=1);

namespace App\Actions\Navigation;

use Illuminate\Support\Facades\Route;

class GetSidebar
{
    public function get(): array
    {
        $route = Route::currentRouteName();

        $sidebar = config('custom.navigation.sidebar');

        return array_map(function ($item) use ($route) {
            $itemRoute = $item['route'];
            $itemChildren = $item['children'] ?? null;

            if ($route && ($route === $itemRoute || ($itemChildren && str_starts_with($route, $item['children'])))) {
                $item['current'] = true;
            }

            return $item;
        }, $sidebar);
    }
}
