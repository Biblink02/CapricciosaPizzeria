<?php

namespace App\Actions\Navigation;

use App\Models\Event;
use Illuminate\Database\Eloquent\Collection;

class GetEvents
{
    public function get(): Collection
    {
        return Event::all();
    }
}
