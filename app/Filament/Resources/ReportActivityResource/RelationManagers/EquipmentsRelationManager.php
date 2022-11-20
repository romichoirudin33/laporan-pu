<?php

namespace App\Filament\Resources\ReportActivityResource\RelationManagers;

use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EquipmentsRelationManager extends RelationManager
{
    protected static string $relationship = 'equipments';

    protected static ?string $recordTitleAttribute = 'type';

    protected static ?string $title = 'Peralatan';

    protected static ?string $modelLabel = 'Peralatan';

    protected static ?string $pluralModelLabel = 'Peralatan';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Grid::make(1)->schema([
                    Forms\Components\TextInput::make('type')
                        ->label('Jenis Peralatan')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('condition')
                        ->label('Kondisi')
                        ->required()
                        ->maxLength(255),
                ]),
                Forms\Components\Grid::make([
                    'md'=>3,
                    'sm'=>1
                ])->schema([
                    Forms\Components\TextInput::make('entry_amount')
                        ->label('Jumlah Masuk')
                        ->numeric(),
                    Forms\Components\TextInput::make('total_material')
                        ->label('Total Peralatan')
                        ->numeric(),
                    Forms\Components\TextInput::make('unit')
                        ->label('Satuan')
                        ->required(),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('type')
                    ->label('Jenis Peralatan'),
                Tables\Columns\TextColumn::make('condition')
                    ->label('Kondisi'),
                Tables\Columns\TextColumn::make('entry_amount')
                    ->label('Jumlah Masuk'),
                Tables\Columns\TextColumn::make('total_material')
                    ->label('Total Peralatan'),
                Tables\Columns\TextColumn::make('unit')
                    ->label('Satuan'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make()->label(''),
                Tables\Actions\DeleteAction::make()->label(''),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
}
