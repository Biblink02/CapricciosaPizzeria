<?php

namespace App\Filament\Resources;

use App\Enums\Lang;
use App\Filament\Resources\SupplierResource\Pages;
use App\Filament\Resources\SupplierResource\RelationManagers;
use App\Models\Supplier;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SupplierResource extends Resource
{
    protected static ?string $model = Supplier::class;

    protected static ?string $navigationLabel = 'Aziende';

    protected static ?string $modelLabel = 'azienda';
    protected static ?string $pluralModelLabel = 'aziende';
    protected static ?string $navigationIcon = 'iconoir-farm';

    protected static ?string $navigationGroup = 'Pizzeria';


    protected static ?int $navigationSort = 5;
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Azienda:')
                ->schema([
                    TextInput::make('name')
                        ->required()
                        ->label('Nome')
                        ->maxLength(255)
                        ->columns(1),
                    Toggle::make('is_visible')
                        ->required()
                        ->default(true)
                        ->columns(1)
                        ->label('È visibile?'),
                    TextInput::make('link')
                        ->label('Link al sito')
                        ->url()
                        ->suffixIcon('heroicon-m-globe-alt')
                        ->columns(1),
                    TextInput::make('sort_key')
                        ->minValue(0)
                        ->numeric()
                        ->required()
                        ->default(0)
                        ->columns(1)
                        ->label('Ordine di comparsa (0 viene prima di 1)'),
                    FileUpload::make('img_url')
                        ->image()
                        ->imageEditor()
                        ->label('Immagine')
                        ->openable()
                        ->panelLayout('integrated')
                        ->required()
                        ->columnSpanFull(),
                ])->columns(2)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable()
                    ->label('Nome'),
                Tables\Columns\IconColumn::make('is_visible')
                    ->boolean()
                    ->label('È visibile?'),
                TextColumn::make('link')
                    ->label('Link al sito'),
                Tables\Columns\TextColumn::make('sort_key')
                    ->searchable()
                    ->sortable()
                    ->label('Ordine di comparsa'),
                TextColumn::make('img_url')
                    ->label('Immagine')
                    ->url(fn($record) => url('/images/' . $record->img_url), true)
                    ->formatStateUsing(fn($state) => 'Visualizza immagine'),
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

    public static function getRelations(): array
    {
        return [
            //RelationManagers\IngredientsRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSuppliers::route('/'),
            'create' => Pages\CreateSupplier::route('/create'),
            'edit' => Pages\EditSupplier::route('/{record}/edit'),
        ];
    }
}
