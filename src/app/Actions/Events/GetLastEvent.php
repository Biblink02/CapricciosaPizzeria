<?php

namespace App\Actions\Events;

use App\Models\Event;
use Illuminate\Support\Carbon;

class GetLastEvent
{
    public function get() {
        return Event::where('is_visible',true)->whereStartsAt('>=', Carbon::now())->orderBy('starts_at', 'DESC')->limit(1)->get()->first();
    }
}
