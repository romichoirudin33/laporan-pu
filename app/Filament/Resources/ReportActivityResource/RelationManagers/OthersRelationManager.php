<?php

namespace App\Filament\Resources\ReportActivityResource\RelationManagers;

use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OthersRelationManager extends RelationManager
{
    protected static string $relationship = 'others';

    protected static ?string $recordTitleAttribute = 'problem_happened';

    protected static ?string $title = 'Lain-lain';

    protected static ?string $modelLabel = 'Lain-lain';

    protected static ?string $pluralModelLabel = 'Lain-lain';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Textarea::make('problem_happened')
                    ->label('Masalah yang dihadapi'),
                Forms\Components\Textarea::make('follow_up')
                    ->label('Tindak lanjut'),
                Forms\Components\Textarea::make('suggestion')
                    ->label('Saran'),
            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('problem_happened')
                    ->label('Masalah yang dihadapi')
                    ->wrap(),
                Tables\Columns\TextColumn::make('follow_up')
                    ->label('Tindak lanjut')
                    ->wrap(),
                Tables\Columns\TextColumn::make('suggestion')
                    ->label('Saran')
                    ->wrap(),
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
