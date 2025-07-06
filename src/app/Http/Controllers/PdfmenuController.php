<?php

namespace App\Http\Controllers;

use App\Actions\Navigation\GetPdfMenus;
use App\Enums\Lang;
use App\Http\Requests\PdfmenuRequest;
use App\Models\Pdfmenu;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class PdfmenuController
{
    public function getSpecificMenu(PdfmenuRequest $request): BinaryFileResponse
    {
        $parameters = $request->validated();
        if (!Storage::disk('public')->exists($parameters['path'])) {
            abort(404, 'PDF not found');
        }
        return response()->file(Storage::disk('public')->path($parameters['path']));
    }

    public function getFirstVisibleMenu(GetPdfMenus $getPdfmenus, string $lang): BinaryFileResponse
    {
        // Converte il parametro in un valore dell'enum Lang
        try {
            $lang = Lang::from($lang);
        } catch (\ValueError $e) {
            abort(404, 'Invalid language specified');
        }

        $pdfMenu = $getPdfmenus->getLastUpdated($lang);

        if (empty($pdfMenu)) {
            abort(404, 'PDF not found');
        }

        if (!Storage::disk('public')->exists($pdfMenu->first()->pdf_url)) {
            abort(404, 'File not found');
        }

        return response()->file(Storage::disk('public')->path($pdfMenu->first()->pdf_url));
    }
}
