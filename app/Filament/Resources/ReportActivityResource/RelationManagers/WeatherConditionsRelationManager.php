<?php

namespace App\Filament\Resources\ReportActivityResource\RelationManagers;

use App\Models\User;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class WeatherConditionsRelationManager extends RelationManager
{
    protected static string $relationship = 'weather_conditions';

    protected static ?string $recordTitleAttribute = 'time';

    protected static ?string $title = 'Kondisi Cuaca';

    protected static ?string $modelLabel = 'Kondisi Cuaca';

    protected static ?string $pluralModelLabel = 'Kondisi Cuaca';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\DateTimePicker::make('time')
                    ->label('Waktu')
                    ->required(),
                Forms\Components\Grid::make(4)
                    ->schema([
                        Forms\Components\Toggle::make('is_bright')
                            ->label('Cerah'),
                        Forms\Components\Toggle::make('is_cloudy')
                            ->label('Mendung'),
                        Forms\Components\Toggle::make('is_drizzle')
                            ->label('Gerimis'),
                        Forms\Components\Toggle::make('is_rain')
                            ->label('Hujan'),
                    ]),
                Forms\Components\Grid::make(1)
                    ->schema([
                        Forms\Components\TextInput::make('earthquake')
                            ->label('Gempa'),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('time')
                    ->label('Waktu'),
                Tables\Columns\TextColumn::make('is_bright')
                    ->label('Cerah')
                    ->formatStateUsing(fn (string $state): string => $state == '1' ? 'Ya' : '-'),
                Tables\Columns\TextColumn::make('is_cloudy')
                    ->label('Mendung')
                    ->formatStateUsing(fn (string $state): string => $state == '1' ? 'Ya' : '-'),
                Tables\Columns\TextColumn::make('is_drizzle')
                    ->label('Gerimis')
                    ->formatStateUsing(fn (string $state): string => $state == '1' ? 'Ya' : '-'),
                Tables\Columns\TextColumn::make('is_rain')
                    ->label('Hujan')
                    ->formatStateUsing(fn (string $state): string => $state == '1' ? 'Ya' : '-'),
                Tables\Columns\TextColumn::make('earthquake')
                    ->label('Gempa')
                    ->wrap(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->label(''),
                Tables\Actions\DeleteAction::make()
                    ->label(''),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make()
                    ->visible(fn (User $record): bool => $record->hasRole('super_admin')),
            ]);
    }
}
