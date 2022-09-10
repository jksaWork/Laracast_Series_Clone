<?php

namespace Database\Seeders;

use App\Models\Lesson;
use App\Models\Series;
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
        \App\Models\User::factory(10)->create();
        \App\Models\User::factory()->create([
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456'),
        ]);
        Series::factory()->create()->Lessons()->create([
            'title' => 'mohammed',
            'description' => 'mohammed',
            'episode_number' =>200,
            'vedio_id' => 200,
        ]);
        Lesson::factory(10)->create();
    }
}
