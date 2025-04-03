<?php

namespace App\Actions\Navigation;

use App\Models\Event;
use App\Models\Menu;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Cache;

class GetEvents
{
    public function get(): Collection
    {
        return Cache::rememberForever('visible_events', function () {
            return Event::where('is_visible', true)
                ->orderBy('starts_at', 'desc')
                ->get();
        });
    }
}

