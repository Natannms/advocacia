<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'short_name',
        'full_name',
        'cnpj',
        'email',
        'phone',
        'whatsapp',
        'address'
    ];


    protected $casts = [
        'address' => 'array'
    ];
}
