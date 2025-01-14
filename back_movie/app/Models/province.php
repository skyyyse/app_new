<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class province extends Model
{
    use HasFactory;
    
    protected $table = "province";
    protected $primaryKey = "id";
    protected $fillable = [
        "province_khmer",
        "province_english",
    ];
}
