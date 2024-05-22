<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DishResource\Pages;
use App\Filament\Resources\DishResource\RelationManagers;
use App\Models\Dish;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DishResource extends Resource
{
    protected static ?string $model = Dish::class;

    protected static ?string $navigationLabel = 'Pietanze';

    protected static ?string $modelLabel = 'pietanza';

    protected static ?string $pluralModelLabel = 'pietanze';

    protected static ?string $navigationIcon = 'phosphor-pizza-fill';

    protected static ?string $navigationGroup = 'Pizzeria';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Pietanza:')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->maxLength(255)
                            ->label('Nome'),
                        Forms\Components\Toggle::make('is_visible')
                            ->required()
                            ->label('È visibile?')
                            ->default(true),
                        /*FileUpload::make('img_url')
                            ->image()
                            ->imageEditor()
                            ->label('Immagine')
                            ->openable()
                            ->panelLayout('integrated')
                            ->default(null)
                            ->->columnSpanFull(),*/
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
                Tables\Columns\IconColumn::make('is_visible')
                    ->boolean()
                    ->label('È visibile?'),
                /*Tables\Columns\ImageColumn::make('img_url')
                    ->label('Immagine'),*/
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
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
            RelationManagers\MenusRelationManager::class,
            RelationManagers\IngredientsRelationManager::class,
            RelationManagers\AllergensRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDishes::route('/'),
            'create' => Pages\CreateDish::route('/create'),
            'edit' => Pages\EditDish::route('/{record}/edit'),
        ];
    }
}
