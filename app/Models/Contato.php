<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contato extends Model
{
    use HasFactory;

    protected $fillable = [
        'aluno_id',
        'celular',
        'emailPessoal',
        'emailInstitucional'
    ];

    public function aluno(){
        return $this->belongsTo(Aluno::class,'aluno)_id');
}
