<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OccupationArea extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function occupationAreaItems()
    {
        return $this->hasMany(OccupationAreaItem::class);
    }
}
