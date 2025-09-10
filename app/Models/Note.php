<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'description'
    ];

    // 👇 Reverse relation: one Note belongs to one User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
