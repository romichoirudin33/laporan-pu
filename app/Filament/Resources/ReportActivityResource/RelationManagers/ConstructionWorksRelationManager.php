<?php

namespace App\Filament\Resources\ReportActivityResource\RelationManagers;

use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ConstructionWorksRelationManager extends RelationManager
{
    protected static string $relationship = 'construction_works';

    protected static ?string $recordTitleAttribute = 'work';

    protected static ?string $title = 'Pekerjaan Konstruksi';

    protected static ?string $modelLabel = 'Pekerjaan Konstruksi';

    protected static ?string $pluralModelLabel = 'Pekerjaan Konstruksi';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Grid::make(1)
                    ->schema([
                        Forms\Components\Textarea::make('work')
                            ->label('Uraian Pekerjaan')
                            ->required(),
                        Forms\Components\Textarea::make('sub_work')
                            ->label('Sub Pekerjaan'),
                        Forms\Components\Textarea::make('detail_work')
                            ->label('Detail Pekerjaan'),
                    ]),
                Forms\Components\Grid::make([
                    'md'=>2,
                    'sm'=>1
                ])
                    ->schema([
                        Forms\Components\TextInput::make('volume')
                            ->label('Volume Pekerjaan'),
                        Forms\Components\TextInput::make('unit')
                            ->label('Satuan'),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('work')
                    ->label('Uraian Pekerjaan'),
                Tables\Columns\TextColumn::make('sub_work')
                    ->label('Sub Pekerjaan'),
                Tables\Columns\TextColumn::make('detail_work')
                    ->label('Detail Pekerjaan'),
                Tables\Columns\TextColumn::make('volume')
                    ->label('Volume Pekerjaan'),
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
