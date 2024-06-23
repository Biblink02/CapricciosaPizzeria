<?php

namespace App\Actions\Navigation;

use App\Models\Event;
use App\Models\Menu;
use Illuminate\Database\Eloquent\Collection;

class GetEvents
{
    public function get(): Collection
    {
        return Event::where('is_visible',true)->orderBy('starts_at','desc')->get();
    }
}
