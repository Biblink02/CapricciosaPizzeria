<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Actions\Navigation\GetSuppliers;
use Inertia\Inertia;
use Inertia\Response;

class HomeController extends Controller
{
    public function index(GetSuppliers $getSuppliers): Response
    {
        return Inertia::render('Home/Home', [
            'slidingImages' => config('custom.home'),
            'suppliers' => $getSuppliers->get()->toArray()
        ]);
    }
}
