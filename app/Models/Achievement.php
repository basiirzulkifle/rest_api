<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Achievement extends Model
{
    use HasFactory;
    // protected $connection = 'mysql';
    protected $primaryKey = "achievement_id";

    protected $table = 'achievement';
    protected $fillable = [
        'title',
        'description'
    ];
}
