<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MenuResource\Pages;
use App\Filament\Resources\MenuResource\RelationManagers;
use App\Models\Menu;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class MenuResource extends Resource
{
    protected static ?string $model = Menu::class;

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
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->maxLength(255)
                            ->label('Nome'),
                        Forms\Components\Toggle::make('is_visible')
                            ->required()
                            ->default(true)
                            ->label('È visibile?'),
                        FileUpload::make('img_url')
                            ->image()
                            ->imageEditor()
                            ->label('Immagine')
                            ->openable()
                            ->panelLayout('integrated')
                            ->default(null)
                            ->columnSpanFull()
                                ->required(),
                        Forms\Components\Section::make('Nella pagina dei menù')
                            ->schema([
                                Forms\Components\Toggle::make('is_visible_in_menus')
                                    ->required()
                                    ->default(true)
                                    ->label('È visibile nella pagina dei menù?'),
                                Forms\Components\TextInput::make('sort_key_in_menus')
                                    ->required()
                                    ->numeric()
                                    ->minValue(0)
                                    ->default(0)
                                    ->label('Ordine di comparsa (pagina menu)'),
                            ])->columns(2),
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
                Tables\Columns\TextColumn::make('sort_key_in_menus')
                    ->searchable()
                    ->sortable()
                    ->label('Ordine di comparsa'),
                Tables\Columns\IconColumn::make('is_visible')
                    ->boolean()
                    ->label('È visibile?'),
                Tables\Columns\IconColumn::make('is_visible_in_menus')
                    ->boolean()
                    ->label('È visibile nella pagina dei menù?'),
                Tables\Columns\ImageColumn::make('img_url')
                    ->label('Immagine'),
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
            RelationManagers\DishesRelationManager::class,
            RelationManagers\EventsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMenus::route('/'),
            'create' => Pages\CreateMenu::route('/create'),
            'edit' => Pages\EditMenu::route('/{record}/edit'),
        ];
    }
}
