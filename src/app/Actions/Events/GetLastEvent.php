<?php

namespace App\Actions\Events;

use App\Models\Event;
use Illuminate\Support\Carbon;

class GetLastEvent
{
    public function get() {
        return Event::where('is_visible',true)->whereDate('ends_at', '>=', Carbon::now())->orderBy('starts_at', 'asc')->first();
    }
}
