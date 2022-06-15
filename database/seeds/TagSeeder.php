<?php

use Illuminate\Database\Seeder;
use App\Tag;
use App\User;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (User::all() as $user) {
            $tags = ['Meeting', 'Alarm'];
            foreach ($tags as $tag) {
                $user->tags()->create([
                    'name' => $tag
                ]);
            }
        }
    }
}
