<?php

namespace App\Filament\Resources\SuperVisorResource\Pages;

use App\Filament\Resources\SuperVisorResource;
use BezhanSalleh\FilamentShield\Traits\HasPageShield;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateSuperVisor extends CreateRecord
{
    use HasPageShield;

    protected static string $resource = SuperVisorResource::class;
}
