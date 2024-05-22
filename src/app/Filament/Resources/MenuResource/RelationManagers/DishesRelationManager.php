<?php

namespace App\Filament\Resources\MenuResource\RelationManagers;

use Closure;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Actions\AttachAction;
use Filament\Tables\Table;

class DishesRelationManager extends RelationManager
{

    protected static ?string $title = 'Pietanze';

    protected static ?string $label = 'pietanza';
    protected static ?string $pluralLabel = 'pietanze';

    protected static string $relationship = 'dishes';

    public function form(Form $form): Form
    {
        return $form
            ->schema([

                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255)
                    ->label('Nome'),
                Forms\Components\Toggle::make('is_visible')
                    ->required()
                    ->default(true)
                    ->label('È visibile?'),
                /*FileUpload::make('img_url')
                    ->image()
                    ->imageEditor()
                    ->label('Immagine')
                    ->openable()
                    ->panelLayout('integrated')
                    ->default(null),*/
                Forms\Components\Section::make('Nella pagina dei menù')
                    ->schema([
                        TextInput::make('price')
                            ->prefix('€')
                            ->numeric()
                            ->rules([
                                function () {
                                    return function (string $attribute, $value, Closure $fail) {
                                        if ($value <= 0) {
                                            $fail('Il prezzo deve essere un numero maggiore di zero con due cifre decimali');
                                        }
                                        if (!preg_match("/^[0-9]+(\.[0-9]{2})?$/", $value)) {
                                            if (preg_match("/^[0-9]+(\,[0-9]{2})?$/", $value)) {
                                                $fail('Il separatore tra cifre intere e decimali deve essere: .');
                                            } else {
                                                $fail('Il prezzo deve essere un numero maggiore di zero con due cifre decimali');
                                            }
                                        }
                                    };
                                },
                            ])
                            ->label('Prezzo')
                            ->required(),
                        TextInput::make('sort_key')
                            ->numeric()
                            ->required()
                            ->default(0)
                            ->label('Ordine di comparsa (0 viene prima di 1)'),
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
                Tables\Columns\TextColumn::make('price')
                    ->searchable()
                    ->label('Prezzo'),
                Tables\Columns\TextColumn::make('sort_key')
                    ->searchable()
                    ->sortable()
                    ->label('Ordine di comparsa'),
                Tables\Columns\IconColumn::make('is_visible')
                    ->boolean()
                    ->label('È visibile?'),
                /*Tables\Columns\ImageColumn::make('img_url')
                    ->searchable()
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
            ->headerActions([
                Tables\Actions\CreateAction::make(),
                Tables\Actions\AttachAction::make()
                    ->preloadRecordSelect()
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\AttachAction::make()
                    ->preloadRecordSelect()
                    ->form(fn(AttachAction $action): array => [
                        $action->getRecordSelect(),
                        TextInput::make('price')
                            ->prefix('€')
                            ->numeric()
                            ->rules([
                                function () {
                                    return function (string $attribute, $value, Closure $fail) {
                                        if ($value <= 0) {
                                            $fail('Il prezzo deve essere un numero maggiore di zero con due cifre decimali');
                                        }
                                        if (!preg_match("/^[0-9]+(\.[0-9]{2})?$/", $value)) {
                                            if (preg_match("/^[0-9]+(\,[0-9]{2})?$/", $value)) {
                                                $fail('Il separatore tra cifre intere e decimali deve essere: .');
                                            } else {
                                                $fail('Il prezzo deve essere un numero maggiore di zero con due cifre decimali');
                                            }
                                        }
                                    };
                                },
                            ])
                            ->label('Prezzo')
                            ->required(),
                        TextInput::make('sort_key')
                            ->numeric()
                            ->required()
                            ->default(0)
                            ->label('Ordine di comparsa (0 viene prima di 1)'),
                    ])
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
