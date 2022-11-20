<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ExecutorResource\Pages;
use App\Filament\Resources\ExecutorResource\RelationManagers;
use App\Models\Executor;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ExecutorResource extends Resource
{
    protected static ?string $model = Executor::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $slug = 'kontraktor-pelaksana';

    protected static ?string $modelLabel = 'Kontraktor Pelaksana';

    protected static ?string $pluralModelLabel = 'Kontraktor Pelaksana';

    protected static ?string $navigationLabel = 'Kontraktor Pelaksana';

    protected static ?string $navigationGroup = 'Master Data';

    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()
                    ->schema([
                        Forms\Components\TextInput::make('nip')
                            ->label('NIP')
                            ->required(),
                        Forms\Components\TextInput::make('name')
                            ->label('Nama Pengawas')
                            ->required(),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nip')
                    ->label('NIP')
                    ->searchable(),
                Tables\Columns\TextColumn::make('name')
                    ->label('Nama Pengawas')
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListExecutors::route('/'),
            'create' => Pages\CreateExecutor::route('/create'),
            'edit' => Pages\EditExecutor::route('/{record}/edit'),
        ];
    }
}
