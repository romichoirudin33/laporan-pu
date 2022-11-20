<?php

namespace App\Filament\Resources\SuperVisorResource\Pages;

use App\Filament\Resources\SuperVisorResource;
use BezhanSalleh\FilamentShield\Traits\HasPageShield;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSuperVisors extends ListRecords
{
    use HasPageShield;

    protected static string $resource = SuperVisorResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
