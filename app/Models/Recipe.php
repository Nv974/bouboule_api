<?php

namespace App\Models;

use App\Models\User;
use App\Models\Category;
use App\Models\Ingredient;
use App\Models\Instruction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Recipe extends Model
{
    use HasFactory;
    protected $fillable = [
        "id",
        "user_id",
        "category_id",
        "title",
        "description",
        "difficulty",
        "img",
        "video_url",
        "ingredients",
        "preparation_time",
        "cooking_time",
        "instructions",
        "created_at",
        "updated_at",
    ];



    public function instructions()
    {
        return $this->hasMany(Instruction::class);
    }

    public function ingredients()
    {
        return $this->hasMany(Ingredient::class);
    }

    public function category()
    {
        return $this->hasOne(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
