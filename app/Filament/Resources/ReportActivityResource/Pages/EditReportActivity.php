<?php

namespace App\Filament\Resources\ReportActivityResource\Pages;

use App\Filament\Resources\ReportActivityResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditReportActivity extends EditRecord
{
    protected static string $resource = ReportActivityResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
