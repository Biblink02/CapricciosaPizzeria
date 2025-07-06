<?php

namespace App\Actions\Helpers;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class ImageConverterHelper
{
    public static function convertToWebp(string $imagePath): string
    {
        if (str_ends_with(strtolower($imagePath), '.webp') || !Storage::disk('public')->exists($imagePath)) {
            return $imagePath;
        }

        $manager = new ImageManager(new Driver());
        $webpImage = $manager->read(Storage::disk('public')->path($imagePath))->toWebp(60);
        $webpPath = preg_replace('/\.\w+$/', '.webp', $imagePath);

        Storage::disk('public')->put($webpPath, $webpImage);
        Storage::disk('public')->delete($imagePath);

        return $webpPath;
    }
}
