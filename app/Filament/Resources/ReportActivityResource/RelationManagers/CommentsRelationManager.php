<?php

namespace App\Filament\Resources\ReportActivityResource\RelationManagers;

use App\Models\Comment;
use App\Models\User;
use Carbon\Carbon;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;

class CommentsRelationManager extends RelationManager
{
    protected static string $relationship = 'comments';

    protected static ?string $recordTitleAttribute = 'user.name';

    protected static ?string $title = 'Komentar';

    protected static ?string $modelLabel = 'Komentar';

    protected static ?string $pluralModelLabel = 'Komentar';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Textarea::make('note')
                    ->required(),
                Forms\Components\Hidden::make('user_id')
                    ->default(fn ($state)=>Auth::id())
            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('note')
                    ->label('Isi Komentar')
                    ->wrap(),
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Oleh'),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Dibuat')
                    ->icon('heroicon-o-clock')
                    ->size('sm')
                    ->formatStateUsing(fn (string $state): string => Carbon::parse($state)->diffForHumans()),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->label('')
                    ->visible(fn (Comment $record): bool => $record->user_id == Auth::id()),
                Tables\Actions\DeleteAction::make()
                    ->label('')
                    ->visible(fn (): bool => Auth::user()->hasRole('super_admin')),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make()
                    ->visible(fn (): bool => Auth::user()->hasRole('super_admin')),
            ]);
    }
}
