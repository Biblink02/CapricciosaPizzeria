<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DishResource\RelationManagers\MenusRelationManager;
use App\Filament\Resources\EventResource\Pages;
use App\Filament\Resources\EventResource\RelationManagers;
use App\Models\Event;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EventResource extends Resource
{
    protected static ?string $model = Event::class;

    protected static ?string $navigationLabel = 'Eventi';

    protected static ?string $modelLabel = 'evento';

    protected static ?string $pluralModelLabel = 'eventi';
    protected static ?string $navigationIcon = 'heroicon-o-calendar-days';

    protected static ?string $navigationGroup = 'Pizzeria';

    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {

        return $form
            ->schema([
                Forms\Components\Section::make('Evento:')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->maxLength(255)
                            ->label('Nome')
                            ->columnSpan(1),
                        Forms\Components\Textarea::make('description')
                            ->required()
                            ->label('Descrizione')
                            ->columnSpan(2),
                        Forms\Components\DateTimePicker::make('starts_at')
                            ->required()
                            ->label('Comincia')
                            ->columnSpan(1),
                        Forms\Components\DateTimePicker::make('ends_at')
                            ->required()
                            ->after('starts_at')
                            ->label('Termina')
                            ->columnSpan(1),
                        Forms\Components\Toggle::make('is_visible')
                            ->required()
                            ->default(true)
                            ->label('È visibile?')
                            ->columnSpan(1),
                        FileUpload::make('img_url')
                            ->image()
                            ->imageEditor()
                            ->label('Immagine')
                            ->openable()
                            ->panelLayout('integrated')
                            ->default(null)
                            ->required()
                            ->columnSpanFull(),
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
                Tables\Columns\IconColumn::make('is_visible')
                    ->boolean()
                    ->label('È visibile?'),
                TextColumn::make('starts_at')
                    ->dateTime()
                    ->sortable()
                    ->label('Comincia'),
                TextColumn::make('ends_at')
                    ->dateTime()
                    ->sortable()
                    ->label('Termina'),
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
            //RelationManagers\MenusRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEvents::route('/'),
            'create' => Pages\CreateEvent::route('/create'),
            'edit' => Pages\EditEvent::route('/{record}/edit'),
        ];
    }
}
