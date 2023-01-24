<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'user_id',
        'document',
        'img_name',
    ];

    public function graduations()
    {
        return $this->hasMany(Graduation::class);
    }
}
