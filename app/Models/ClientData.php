<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientData extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'client_id',
        "nacionalidade",
        "profissao",
        "rg",
        "cpf",
        "estado_civil",
        "data_nascimento",
        "phone",
        "email",
        "cep",
        "logradouro",
        "numero",
        "complemento",
        "bairro",
        "cidade",
        "uf",
        "trabalha_como",
        "atua_na_esfera",
    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function clients()
    {
        return $this->belongsTo(Client::class);
    }
}
