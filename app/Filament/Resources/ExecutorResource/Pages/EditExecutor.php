<?php

namespace App\Filament\Resources\ExecutorResource\Pages;

use App\Filament\Resources\ExecutorResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditExecutor extends EditRecord
{
    protected static string $resource = ExecutorResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
