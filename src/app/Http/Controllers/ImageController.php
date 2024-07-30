<?php

namespace App\Http\Controllers;



use App\Http\Requests\ImageRequest;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class ImageController
{
    public function index(ImageRequest $request): BinaryFileResponse
    {
        $parameters = $request->validated();
        if (!Storage::disk('public')->exists($parameters['path'])) {
            abort(404, 'Image not found');
        }
        return response()->file(Storage::disk('public')->path($parameters['path']));
    }
}
