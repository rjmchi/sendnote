<?php

namespace Database\Seeders;

use App\Models\Note;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(5)->create(['password'=>'kether1330']);
        User::factory()->create([
            'name' => 'Robert',
            'email' => 'robert@rjmchicago.com',
            'password'=>'kether1330',
        ]);

        User::all()->each(function (User $user) {
            Note::factory(5)->create(['user_id'=> $user->id]);
        });
    }
}
