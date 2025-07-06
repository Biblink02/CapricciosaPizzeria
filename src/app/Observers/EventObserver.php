<?php

namespace App\Observers;

use App\Actions\Helpers\ImageConverterHelper;
use App\Models\Event;
use Illuminate\Support\Facades\Storage;

class EventObserver
{
    /**
     * Handle the Event "saving" event.
     */
    public function saving(Event $event): void
    {
        if (!$event->isDirty('img_url')) return;

        $oldImagePath = $event->getOriginal('img_url');
        if (empty($oldImagePath)) return;

        if (Storage::disk('public')->exists($oldImagePath)) {
            Storage::disk('public')->delete($oldImagePath);
        }

    }

    /**
     * Handle the Event "saved" event.
     */
    public function saved(Event $event): void
    {
        $webpPath = ImageConverterHelper::convertToWebp($event->img_url);

        $event->img_url = $webpPath;
        $event->withoutEvents(function () use ($event) {
            $event->save();
        });
    }

    /**
     * Handle the Event "deleted" event.
     */
    public function deleted(Event $event): void
    {
        $imagePath = $event->img_url;
        if (Storage::disk('public')->exists($imagePath)) {
            Storage::disk('public')->delete($imagePath);
        }
    }

}
