<?php

namespace App\Filament\Resources\ConsultantResource\Pages;

use App\Filament\Resources\ConsultantResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditConsultant extends EditRecord
{
    protected static string $resource = ConsultantResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
