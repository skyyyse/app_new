<?php

namespace App\Models;

use App\Http\Controllers\api\post_controller;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class favorite extends Model
{
    use HasFactory;

    protected $table = 'favorite';
    protected $primaryKey = 'id';
    protected $fillable = [
        'user_id',
        'post_id',
    ];

    public function post()
    {
        return $this->belongsTo(post_model::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
