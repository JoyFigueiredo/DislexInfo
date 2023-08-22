<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Simulacao extends Model
{
    use HasFactory;
    protected $table = 'simulacoes';
    protected $primaryKey = 'user_id';
    protected $fillable  = ['user_id','frequencia','leitura','tabuada','espacial'];
    protected $timestamp = false;
}
