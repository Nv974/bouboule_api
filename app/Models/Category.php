<?php

namespace App\Models;

use App\Models\Recipe;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        "id",
        "name",
        "created_at",
        "updated_at"
    ];

    public function recipes()
    {
        return $this->hasMany(Recipe::class);
    }
}
