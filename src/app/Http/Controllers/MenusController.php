<?php
declare(strict_types=1);
namespace App\Http\Controllers;

use Inertia\Inertia;
use Inertia\Response;
use App\Actions\Navigation\GetMenusForMenusPage;

class MenusController
{
    public function index(GetMenusForMenusPage $getMenusForHome): Response
    {
        return Inertia::render('Menus/MenuPage');
    }
}


