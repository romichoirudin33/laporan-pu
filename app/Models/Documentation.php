<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documentation extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function report_activity()
    {
        return $this->belongsTo(ReportActivity::class);
    }
}
