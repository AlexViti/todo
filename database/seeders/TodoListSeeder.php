<?php

namespace Database\Seeders;

use App\User;
use App\TodoList;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class TodoListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        //factory(App\TodoList::class, 10)->create();
        //TodoList::factory()->count(10)->create();

        for ($i=1; $i < 20; $i++) {
            TodoList::create([
                'name' => $faker->sentence,
                'user_id' => User::inRandomOrder()->first()->id,
            ]);
        }
    }
}
