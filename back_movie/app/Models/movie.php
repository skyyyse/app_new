<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class movie extends Model
{
    use HasFactory;
    protected $table = 'movie';
    protected $primaryKey = 'id';
    protected $fillable = [
        'movie_title',
        'movie_subtitle',
        'movie_description',
        'movie_active',
        'movie_image',
        'movie_mp4',
        'category_id',
        'create_by'
    ];
    public function favorite()
    {
        return $this->hasMany(favorite::class);
    }
    public function category()
    {
        return $this->belongsTo(category::class);
    }
}
