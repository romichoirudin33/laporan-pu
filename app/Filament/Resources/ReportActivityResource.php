<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ReportActivityResource\Pages;
use App\Filament\Resources\ReportActivityResource\RelationManagers;
use App\Models\Consultant;
use App\Models\Executor;
use App\Models\ReportActivity;
use App\Models\SuperVisor;
use Carbon\Carbon;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ReportActivityResource extends Resource
{
    protected static ?string $model = ReportActivity::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $slug = 'data';

    protected static ?string $modelLabel = 'Data';

    protected static ?string $pluralModelLabel = 'Data';

    protected static ?string $navigationLabel = 'Data';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()
                    ->schema([
                        Forms\Components\Fieldset::make('Detial Proyek')
                            ->schema([
                                Forms\Components\TextInput::make('name_project')
                                    ->label('Nama Proyek')
                                    ->required(),
                                Forms\Components\Textarea::make('location')
                                    ->label('Lokasi'),
                                Forms\Components\TextInput::make('no_contractor')
                                    ->label('No Kontraktor'),
                            ])->columns(1),
                        Forms\Components\Fieldset::make('Waktu Proyek')
                            ->schema([
                                Forms\Components\DatePicker::make('work_date')
                                    ->label('Tanggal Kerja'),
                                Forms\Components\DateTimePicker::make('execution_time')
                                    ->label('Waktu Pelaksanaan'),
                                Forms\Components\DateTimePicker::make('maintenance_time')
                                    ->label('Waktu Pemeliharaan'),
                                Forms\Components\Select::make('fiscal_year')
                                    ->label('Tahun Anggaran')
                                    ->options(range(2021, Carbon::now()->year)),
                            ])->columns(2),
                        Forms\Components\Fieldset::make('Penanda Tangan')
                            ->schema([
                                Forms\Components\Select::make('super_visor_id')
                                    ->label('Pengawas')
                                    ->options(SuperVisor::all()->pluck('name', 'id')->toArray())
                                    ->searchable(),
                                Forms\Components\Select::make('consultant_id')
                                    ->label('Konsultan')
                                    ->options(Consultant::all()->pluck('name', 'id')->toArray())
                                    ->searchable(),
                                Forms\Components\Select::make('executor_id')
                                    ->label('Kontraktor Pelaksana')
                                    ->options(Executor::all()->pluck('name', 'id')->toArray())
                                    ->searchable(),
                            ])->columns(3),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name_project')
                    ->label('Data')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('work_date')
                    ->label('Tanggal')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('fiscal_year')
                    ->label('Tahun Anggaran')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('location')
                    ->label('Nama')
                    ->words(5)
                    ->sortable()
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
            RelationManagers\PreparatoryWorksRelationManager::class,
            RelationManagers\ConstructionWorksRelationManager::class,
            RelationManagers\MaterialsRelationManager::class,
            RelationManagers\EquipmentsRelationManager::class,
            RelationManagers\ManPowersRelationManager::class,
            RelationManagers\WeatherConditionsRelationManager::class,
            RelationManagers\OthersRelationManager::class,
            RelationManagers\DocumentationsRelationManager::class,
            RelationManagers\OtherNotesRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListReportActivities::route('/'),
            'create' => Pages\CreateReportActivity::route('/create'),
            'edit' => Pages\EditReportActivity::route('/{record}/edit'),
        ];
    }
}
