<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quizz extends Model
{
    use HasFactory;
    protected $fillable=['pergunta','resposta1','resposta2','resposta3','respostaCerta','figurinha_id'];
    protected $table='quizzes';
}
