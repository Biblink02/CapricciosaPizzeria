<?php

namespace App\Actions\Events;

use App\Models\Event;

class GetLastEvent
{
    public function get() {
        return Event::orderBy('created_at', 'DESC')->limit(1)->get()->first();
    }
}
