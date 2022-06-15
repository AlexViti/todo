<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ToDo extends Model
{
    protected $fillable = [
        'todo_list_id', 'title', 'description', 'completed',
    ];

    public function todoList()
    {
        return $this->belongsTo(TodoList::class);
    }

    public function tags()
    {
        return $this->hasMany(Tag::class);
    }
}
