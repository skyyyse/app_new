<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class district extends Model
{
    use HasFactory;
    protected $table = "district";
    protected $primaryKey = "id";
    protected $fillable = [
        "district_khmer",
        "district_english",
        "province_id",
    ];
}
