<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'user_id'];

    public function category()
    {
        $this->hasOne(Category::class);
    }

    public function user()
    {
        $this->belongsTo(User::class);
    }
}
