<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = "products";
    protected $fillable = [
        "category_id",
        "name",
        "slug",
        "small_description",
        "description",
        "price",
        "qty",
        "image",
        "status",
        "trending",
    ];

    public function category() {
        return $this->belongsTo(Category::class, "category_id", "id");
    }
}
