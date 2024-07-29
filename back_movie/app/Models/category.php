<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;
    protected $table="category";
    protected $primaryKey = "id";
    protected $fillable = [
        "category_Title ",
        "category_image,",
        "category_active",
    ];
    public function movie()
    {
        return $this->hasMany(movie::class);
    }
}
