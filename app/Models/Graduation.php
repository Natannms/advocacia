<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Graduation extends Model
{
    use HasFactory;

    protected $fillable = [
        'team_id',
        'description',
    ];

    public function temas()
    {
        return $this->belongsTo(Temas::class);
    }
}
