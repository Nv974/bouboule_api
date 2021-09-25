<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Instruction extends Model
{

    use HasFactory;
    protected $fillable = [
        "id",
        "recipe_id",
        "description"
    ];

    protected $hidden = [
        'recipe_id',
    ];


    public function recipe()
    {
        return $this->hasOne(Recipe::class);
    }

    const CREATED_AT = null;
    const UPDATED_AT = null;
}

