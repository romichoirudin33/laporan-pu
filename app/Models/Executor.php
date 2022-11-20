<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Executor extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function report_activities(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(ReportActivity::class);
    }
}
