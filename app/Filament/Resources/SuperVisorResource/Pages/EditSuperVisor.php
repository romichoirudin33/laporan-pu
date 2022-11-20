<?php

namespace App\Filament\Resources\SuperVisorResource\Pages;

use App\Filament\Resources\SuperVisorResource;
use BezhanSalleh\FilamentShield\Traits\HasPageShield;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSuperVisor extends EditRecord
{
    use HasPageShield;

    protected static string $resource = SuperVisorResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
