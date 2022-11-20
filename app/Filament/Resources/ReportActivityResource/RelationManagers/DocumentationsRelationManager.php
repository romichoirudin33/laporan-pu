<?php

namespace App\Filament\Resources\ReportActivityResource\RelationManagers;

use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DocumentationsRelationManager extends RelationManager
{
    protected static string $relationship = 'documentations';

    protected static ?string $recordTitleAttribute = 'type';

    protected static ?string $title = 'Dokumentasi';

    protected static ?string $modelLabel = 'Dokumentasi';

    protected static ?string $pluralModelLabel = 'Dokumentasi';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('type')
                    ->label('Jenis Pekerjaan')
                    ->maxLength(255),
                Forms\Components\FileUpload::make('file')
                    ->image()
                    ->panelAspectRatio('4:1'),
            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('type')
                    ->label('Jenis Pekerjaan'),
                Tables\Columns\ImageColumn::make('file')
                    ->label('Foto dokumentasi')
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
