<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use function Laravel\Prompts\error;

class AllergensController
{
    public function index(): BinaryFileResponse
    {
        if (!Storage::disk('files')->exists('TABELLA-ALLERGENI.pdf')) {
            abort(404, 'PDF file not found');
        }
        return response()->file(Storage::disk('files')->path('TABELLA-ALLERGENI.pdf'), ['Content-Type' => 'application/pdf', 'Content-Disposition' => 'inline; filename="TABELLA-ALLERGENI.pdf"',]);
    }
}
