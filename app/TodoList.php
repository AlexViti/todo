<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TodoList extends Model
{
    protected $fillable = [
        'name', 'user_id', 'color', 'icon',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
