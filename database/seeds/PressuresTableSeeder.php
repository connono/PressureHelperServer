<?php

use Illuminate\Database\Seeder;
use App\Models\Pressures;
use App\Models\User;

class PressuresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = app(Faker\Generator::class);
        $pressures = factory(Pressures::class)
                         ->times(200)
                         ->make();
        Pressures::insert($pressures->toArray());
    }
}
