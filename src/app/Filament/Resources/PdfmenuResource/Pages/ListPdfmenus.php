<?php

namespace App\Filament\Resources\PdfmenuResource\Pages;

use App\Filament\Resources\PdfmenuResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPdfmenus extends ListRecords
{
    protected static string $resource = PdfmenuResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
