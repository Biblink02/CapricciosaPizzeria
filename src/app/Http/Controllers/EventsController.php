<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Actions\Navigation\GetEvents;
use Inertia\Inertia;
use Inertia\Response;

class EventsController extends Controller
{
    public function index(GetEvents $getEvents): Response
    {
        return Inertia::render('Events/EventsPage', [
            'events' => $getEvents->get()->toArray()
        ]);
    }
}
