<?php

namespace App\Filament\Resources\ExecutorResource\Pages;

use App\Filament\Resources\ExecutorResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListExecutors extends ListRecords
{
    protected static string $resource = ExecutorResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
