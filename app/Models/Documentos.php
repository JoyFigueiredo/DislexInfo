<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documentos extends Model
{
    use HasFactory;
    protected $table = 'documentos';
    protected $primaryKey = 'user_id';
    protected $fillable  = ['user_id','nome','proficonal'];
    protected $timestamp = false;
}
