<?php

namespace App\Actions\Events;

use App\Models\Event;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;

class GetLastEvent
{
    public function get()
    {
        // Calcola i secondi rimanenti fino a mezzanotte
        $secondsUntilMidnight = Carbon::now()->diffInSeconds(Carbon::tomorrow());

        return Cache::remember('last_visible_event', $secondsUntilMidnight, function () {
            return Event::where('is_visible', true)
                ->whereDate('ends_at', '>=', Carbon::now())
                ->orderBy('ends_at', 'asc')
                ->first();
        });
    }
}
