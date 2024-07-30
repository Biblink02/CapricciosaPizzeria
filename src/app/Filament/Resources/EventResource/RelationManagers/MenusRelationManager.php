<?php

namespace App\Filament\Resources\EventResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MenusRelationManager extends RelationManager
{
    protected static string $relationship = 'menus';

    protected static ?string $title='Menù';

    protected static ?string $label = 'menù';
    protected static ?string $pluralLabel = 'menù';
    public function form(Form $form): Form
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

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->label('Nome'),
                Tables\Columns\IconColumn::make('is_visible')
                    ->boolean()
                    ->label('È visibile?'),
                Tables\Columns\IconColumn::make('is_visible_in_menus')
                    ->boolean()
                    ->label('È visibile nella pagina dei menù?'),
                Tables\Columns\TextColumn::make('img_url')
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
            ->headerActions([
                Tables\Actions\CreateAction::make(),
                Tables\Actions\AttachAction::make()
                    ->preloadRecordSelect(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DetachAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DetachBulkAction::make(),
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
