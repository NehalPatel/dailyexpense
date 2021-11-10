<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
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

    public function bank()
    {
        $this->hasOne(Bank::class);
    }
}
