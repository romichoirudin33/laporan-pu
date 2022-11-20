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
                Forms\Components\TextInput::make('type')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('detail')
                    ->maxLength(255),
                Forms\Components\TextInput::make('amount')
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('type')
                    ->label('Jenis Pekerjaan'),
                Tables\Columns\TextColumn::make('detail')
                    ->label('Tenaga Kerja'),
                Tables\Columns\TextColumn::make('amount')
                    ->label('Jumlah'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
}
