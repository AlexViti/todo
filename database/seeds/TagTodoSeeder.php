<?php

use Illuminate\Database\Seeder;
use App\Tag;
use App\User;
use App\ToDo;
use App\TodoList;

class TagTodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (ToDo::all() as $todo) {
            $user = $todo->todoList->user->id;
            $tagTodos = [
                'to_do_id' => $todo->id,
                'tag_id' => Tag::where('user_id', $user)->inRandomOrder()->first()->id,
            ];
            $todo->tagTodos()->create($tagTodos);
        }
    }
}
