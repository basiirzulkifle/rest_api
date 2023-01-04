<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GetAchievement extends Model {
    use HasFactory;
    protected $table = 'link_user_achievement';
    protected $fillable = [
        'user_id',
        'achievement_id'
    ];
}

?>
