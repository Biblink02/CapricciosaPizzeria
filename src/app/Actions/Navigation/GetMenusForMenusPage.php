<?php

namespace App\Actions\Navigation;

use App\Models\Menu;

class GetMenusForMenusPage
{
    public function get()
    {
        return Menu::where('is_visible',true)->where('is_visible_in_menus', true)->orderBy('sort_key_in_menus','asc')->get();
    }
}
