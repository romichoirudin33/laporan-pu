<?php

namespace App\Filament\Resources\ReportActivityResource\RelationManagers;

use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OtherNotesRelationManager extends RelationManager
{
    protected static string $relationship = 'other_notes';

    protected static ?string $recordTitleAttribute = 'note';

    protected static ?string $title = 'Catatan Lainnya';

    protected static ?string $modelLabel = 'Catatan Lainnya';

    protected static ?string $pluralModelLabel = 'Catatan Lainnya';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Textarea::make('note')
                    ->label('Catatan'),
                Forms\Components\Textarea::make('note_of_construction')
                    ->label('Catatan mengenai keselamatan konstruksi'),
                Forms\Components\Textarea::make('job_plan')
                    ->label('Rencana pelaksanaan pekerjaan'),
            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('note')
                    ->label('Catatan')
                    ->wrap(),
                Tables\Columns\TextColumn::make('note_of_construction')
                    ->label('Catatan mengenai keselamatan konstruksi')
                    ->wrap(),
                Tables\Columns\TextColumn::make('job_plan')
                    ->label('Rencana pelaksanaan pekerjaan')
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
