<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alert extends Model
{
    use HasFactory;

    protected $fillable = [
        'risk_area_id',
        'message',
        'sent_at',
        'end_at',
        'active'
    ];

    public function riskArea()
    {
        return $this->belongsTo(RiskArea::class);
    }
}
