<?php

namespace App\Actions\Events;

use App\Models\Event;
use Illuminate\Support\Carbon;

class GetLastEvent
{
    public function get() {
        $event =  Event::where('is_visible',true)->whereDate('ends_at', '>=', Carbon::now())->orderBy('ends_at', 'asc')->first();
        /*if(is_null($event)) {
            return Event::where('is_visible',true)->orderBy('ends_at', 'asc')->first();
        }*/
        return $event;
    }
}
