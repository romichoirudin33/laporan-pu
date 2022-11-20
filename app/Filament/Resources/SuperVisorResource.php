<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SuperVisorResource\Pages;
use App\Filament\Resources\SuperVisorResource\RelationManagers;
use App\Models\SuperVisor;
use BezhanSalleh\FilamentShield\Traits\HasPageShield;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SuperVisorResource extends Resource
{

    protected static ?string $model = SuperVisor::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $slug = 'pengawas';

    protected static ?string $modelLabel = 'Pengawas';

    protected static ?string $pluralModelLabel = 'Pengawas';

    protected static ?string $navigationLabel = 'Pengawas';

    protected static ?string $navigationGroup = 'Master Data';

    protected static ?int $navigationSort = 1;

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
            'index' => Pages\ListSuperVisors::route('/'),
            'create' => Pages\CreateSuperVisor::route('/create'),
            'edit' => Pages\EditSuperVisor::route('/{record}/edit'),
        ];
    }
}
