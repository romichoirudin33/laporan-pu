<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ManPower extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function report_activity()
    {
        return $this->belongsTo(ReportActivity::class);
    }
}
