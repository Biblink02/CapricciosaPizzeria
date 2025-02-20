<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Actions\Events\GetLastEvent;
use App\Actions\Navigation\GetSuppliers;
use Inertia\Inertia;
use Inertia\Response;

class HomeController extends Controller
{
    public function index(GetSuppliers $getSuppliers, GetLastEvent $getLastEvent): Response
    {
        return Inertia::render('Home/HomePage', [
            'suppliers' => $getSuppliers->get()->toArray(),
            'event' =>$getLastEvent->get()?->toArray() ?? null
        ]);
    }
}
