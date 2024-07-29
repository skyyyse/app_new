<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class commune extends Model
{
    use HasFactory;
    protected $table = "commune";
    protected $primaryKey = "id";
    protected $fillable = [
        "commune_khmer",
        "commune_english",
        "district_id",
    ];
}
