<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BestScore extends Model
{

    use HasFactory;
    protected $table = 'best_score';
    protected $primaryKey = "best_score_id";

    protected $fillable = [
        'best_score_value',
        'user_id',

    ];
}
