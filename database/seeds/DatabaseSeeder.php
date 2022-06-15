<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(TodoListSeeder::class);
        $this->call(ToDoSeeder::class);
        $this->call(TagSeeder::class);
        // $this->call(TagTodoSeeder::class);
    }
}
