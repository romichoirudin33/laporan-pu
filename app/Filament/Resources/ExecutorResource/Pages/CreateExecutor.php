<?php

namespace App\Filament\Resources\ExecutorResource\Pages;

use App\Filament\Resources\ExecutorResource;
use BezhanSalleh\FilamentShield\Traits\HasPageShield;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateExecutor extends CreateRecord
{

    use HasPageShield;

    protected static string $resource = ExecutorResource::class;
}
