<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OccupationAreaItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'occupation_area_id',
        'description',
    ];

    public function occupationArea()
    {
        return $this->belongsTo(OccupationArea::class);
    }
}
