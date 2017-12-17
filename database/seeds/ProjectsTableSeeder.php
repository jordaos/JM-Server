<?php

use Illuminate\Database\Seeder;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('projects')->insert([
            'title' => str_random(10),
            'description' => str_random(100),
            'technologies' => 'php, mysql, laravel',
            'photos' => '1.jpg, 2.jpg, 3.jpg'
        ]);
    }
}
