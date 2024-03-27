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
        return response()->file(Storage::disk('public')->path($parameters['path']));
    }
}
