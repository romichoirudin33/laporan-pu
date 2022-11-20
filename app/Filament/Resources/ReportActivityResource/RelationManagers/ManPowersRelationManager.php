<?php

namespace App\Filament\Resources\ReportActivityResource\RelationManagers;

use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ManPowersRelationManager extends RelationManager
{
    protected static string $relationship = 'man_powers';

    protected static ?string $recordTitleAttribute = 'type';

    protected static ?string $title = 'Tenaga Kerja';

    protected static ?string $modelLabel = 'Tenaga Kerja';

    protected static ?string $pluralModelLabel = 'Tenaga Kerja';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Grid::make(2)->schema([
                    Forms\Components\TextInput::make('type')
                        ->label('Jenis Pekerjaan')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('amount')
                        ->label('Jumlah')
                        ->numeric(),
                ]),
                Forms\Components\Grid::make(1)
                    ->schema([
                        Forms\Components\TextInput::make('detail')
                            ->label('Detail Tenaga Kerja')
                            ->maxLength(255),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('type')
                    ->label('Jenis Pekerjaan'),
                Tables\Columns\TextColumn::make('detail')
                    ->label('Tenaga Kerja')
                    ->wrap(),
                Tables\Columns\TextColumn::make('amount')
                    ->label('Jumlah')
                    ->alignCenter(true),
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
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
}
