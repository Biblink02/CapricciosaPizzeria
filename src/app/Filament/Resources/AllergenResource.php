<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AllergenResource\Pages;
use App\Filament\Resources\AllergenResource\RelationManagers;
use App\Models\Allergen;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AllergenResource extends Resource
{
    protected static ?string $model = Allergen::class;

    protected static ?string $navigationLabel = 'Allergeni';

    protected static ?string $modelLabel = 'allergene';

    protected static ?string $pluralModelLabel = 'allergeni';

    protected static ?string $navigationIcon = 'phosphor-shrimp';

    protected static ?int $navigationSort = 6;

    protected static ?string $navigationGroup = 'Pizzeria';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Allergene:')
                ->schema([
                    Forms\Components\TextInput::make('name')
                        ->required()
                        ->maxLength(255)
                        ->label('Nome'),
                    Forms\Components\TextInput::make('number')
                        ->required()
                        ->numeric()
                        ->minValue(1)
                        ->maxValue(255)
                        ->label('Numero in tabella'),
                ])->columns(2)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->label('Nome'),
                Tables\Columns\TextColumn::make('number')
                    ->numeric()
                    ->sortable()
                    ->label('Numero in tabella'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('number')
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
            RelationManagers\DishesRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAllergens::route('/'),
            'create' => Pages\CreateAllergen::route('/create'),
            'edit' => Pages\EditAllergen::route('/{record}/edit'),
        ];
    }

    public static function canViewAny(): bool
    {
        return false;
    }
}
