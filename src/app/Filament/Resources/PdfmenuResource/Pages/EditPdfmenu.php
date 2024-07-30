<?php

namespace App\Filament\Resources\PdfmenuResource\Pages;

use App\Filament\Resources\PdfmenuResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPdfmenu extends EditRecord
{
    protected static string $resource = PdfmenuResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
