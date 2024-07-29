<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class slider extends Model
{
    use HasFactory;
    protected $table = "slider";
    protected $primaryKey = "id";
    protected $fillable = [
        "slider_title",
        "slider_active",
        "slider_image",
    ];
}
