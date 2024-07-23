<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    use HasFactory;

    protected $fillable = [
        'codigo',
        'primeiroNome',
        'sobrenome',
        'nascimento',
        'sala_id',
        'situacao',
    ];

    public function sala(){
        return $this->belongsTo(Sala::class,'sala_id');
}
}
