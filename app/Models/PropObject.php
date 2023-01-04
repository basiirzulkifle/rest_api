<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropObject extends Model
{

    use HasFactory;
    protected $table = 'prop_objects';
    protected $primaryKey = "propobject_id";

    protected $fillable = [
        'object_id',
        'object_name',
        'object_value',
        'object_location',
        'user_id',
    ];
}
