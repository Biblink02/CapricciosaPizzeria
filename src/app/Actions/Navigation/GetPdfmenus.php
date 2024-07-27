<?php

namespace App\Actions\Navigation;

use App\Enums\Lang;
use App\Models\Pdfmenu;

class GetPdfmenus
{
    public function get()
    {
        return Pdfmenu::where('is_visible',true)->get();
    }
    public function getLastCreated(Lang $lang)
    {
        return Pdfmenu::where('is_visible',true)
                        ->where('lang', $lang)
                        ->orderBy('updated_at','desc')
                        ->limit(1)
                        ->get();
    }
}
