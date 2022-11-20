<?php

namespace App\Filament\Resources\ConsultantResource\Pages;

use App\Filament\Resources\ConsultantResource;
use BezhanSalleh\FilamentShield\Traits\HasPageShield;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateConsultant extends CreateRecord
{

    use HasPageShield;

    protected static string $resource = ConsultantResource::class;
}
