<?php

namespace App\Filament\Resources\EventResource\Pages;

use App\Filament\Resources\EventResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class CreateEvent extends CreateRecord
{
    protected static string $resource = EventResource::class;

    protected function afterCreate(): void
    {
        $imagePath = $this->record->img_url;

        if (str_ends_with(strtolower($imagePath), '.webp')) {
            return;
        }

        if (!Storage::disk('public')->exists($imagePath)) {
            return;
        }

        $manager = new ImageManager(new Driver());
        $webpImage = $manager->read(Storage::disk('public')->path($imagePath))->toWebp(60);
        $webpPath = preg_replace('/\.\w+$/', '.webp', $imagePath);

        Storage::disk('public')->put($webpPath, $webpImage);

        $this->record->img_url = $webpPath;
        $this->record->save();

        Storage::disk('public')->delete($imagePath);
    }
}
