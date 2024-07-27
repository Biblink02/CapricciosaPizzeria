<?php

namespace App\Filament\Resources;

use App\Enums\Lang;
use App\Filament\Resources\PdfmenuResource\Pages;
use App\Filament\Resources\PdfmenuResource\RelationManagers;
use App\Models\Pdfmenu;
use Filament\Forms;
use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PdfmenuResource extends Resource
{
    protected static ?string $model = Pdfmenu::class;
    protected static ?string $navigationLabel = 'Menu';

    protected static ?string $modelLabel = 'menu';
    protected static ?string $pluralModelLabel = 'menu';
    protected static ?string $navigationIcon = 'phosphor-scroll';

    protected static ?string $navigationGroup = 'Pizzeria';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Menu:')
                    ->schema([
                        TextInput::make('name')
                            ->required()
                            ->maxLength(255)
                            ->columns(1)
                            ->label('Nome'),
                        Select::make('lang')
                            ->options([
                                'it' => 'Italiano',
                                'en' => 'Inglese',
                            ])
                            ->required()
                            ->label('Lingua')
                            ->columns(1),
                        Toggle::make('is_visible')
                            ->required()
                            ->default(true)
                            ->columns(1)
                            ->label('È visibile?'),
                        FileUpload::make('pdf_url')
                            ->acceptedFileTypes(['application/pdf'])
                            ->label('PDF')
                            ->openable()
                            ->panelLayout('integrated')
                            ->required()
                            ->columnSpanFull()
                    ])->columns(3)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable()
                    ->label('Nome'),
                IconColumn::make('is_visible')
                    ->boolean()
                    ->label('È visibile?'),
                TextColumn::make('pdf_url')
                    ->label('PDF')
                    ->url(fn($record) => url('/pdf/' . $record->pdf_url), true)
                    ->formatStateUsing(fn($state) => 'Visualizza PDF'),
                TextColumn::make('lang')
                    ->label('Lingua')
                    ->formatStateUsing(function ($state) {
                        return Lang::tryFrom($state)?->extendedLabel() ?? 'Unknown';
                    }),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPdfmenus::route('/'),
            'create' => Pages\CreatePdfmenu::route('/create'),
            'edit' => Pages\EditPdfmenu::route('/{record}/edit'),
        ];
    }
}
