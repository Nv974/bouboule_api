<?php

namespace App\Models;

use App\Models\Recipe;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ingredient extends Model
{
    use HasFactory;
    protected $fillable = [
        "id",
        "recipe_id",
        "name",
        "quantity",
        "unity"
    ];

    public function recipe()
    {
        return $this->hasOne(Recipe::class);
    }

    const CREATED_AT = null;
    const UPDATED_AT = null;
}
