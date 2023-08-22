<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    use HasFactory;
    protected $table = 'perfil';
    protected $primaryKey = 'user_id';
    protected $fillable  = ['user_id','aceitacao','sobrenome','dataDeNascimento', 'bloqueio'];
    protected $timestamp = false;
}
