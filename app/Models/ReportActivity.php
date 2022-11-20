<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportActivity extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function comments(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function construction_works(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(ConstructionWork::class);
    }

    public function documentations(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Documentation::class);
    }

    public function equipments(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Equipment::class);
    }

    public function man_powers(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(ManPower::class);
    }

    public function materials(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Material::class);
    }

    public function others(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Other::class);
    }

    public function other_notes(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(OtherNotes::class);
    }

    public function preparatory_works(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(PreparatoryWork::class);
    }

    public function weather_conditions(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(WeatherCondition::class);
    }

    public function super_visor(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(SuperVisor::class);
    }

    public function consultant(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Consultant::class);
    }

    public function executor(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Executor::class);
    }
}
