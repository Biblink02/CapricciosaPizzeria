<?php

namespace App\Actions\Navigation;

use App\Enums\Lang;
use App\Models\Pdfmenu;
use Illuminate\Support\Facades\Cache;

class GetPdfMenus
{
    public function get()
    {
        return Pdfmenu::where('is_visible',true)->get();
    }
    public function getLastUpdated(Lang $lang)
    {
        $cacheKey = 'pdfmenus_last_updated_' . $lang->value;

        return Cache::rememberForever($cacheKey, function () use ($lang) {
            return Pdfmenu::where('is_visible', true)
                ->where('lang', $lang)
                ->orderBy('updated_at', 'desc')
                ->first();
        });
    }
}
