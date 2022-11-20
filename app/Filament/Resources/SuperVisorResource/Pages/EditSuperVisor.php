<?php

namespace App\Filament\Resources\SuperVisorResource\Pages;

use App\Filament\Resources\SuperVisorResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSuperVisor extends EditRecord
{
    protected static string $resource = SuperVisorResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
