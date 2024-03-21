<?php

namespace App\Filament\Pages;

use Filament\Pages\Dashboard as BasePage;

class Dashboard extends BasePage
{
    protected static ?string $navigationLabel = 'Istruzioni';

    protected static ?string $title = 'Istruzioni';


    protected static ?string $navigationIcon = 'heroicon-o-question-mark-circle';

    public function getColumns(): int | string | array
    {
        return 1;
    }
}
