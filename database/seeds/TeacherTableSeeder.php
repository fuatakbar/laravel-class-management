<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

// models
use App\Teacher;

class TeacherTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        $gender = $faker->randomElement(['Male', 'Female']);

        for ($i=0; $i < 5; $i++) { 
            Teacher::create([
                'name' => $faker->name,
                'address' => $faker->address,
                'age' => $faker->numberBetween($min = 25, $max = 50),
                'gender' => $gender
            ]);
        }
    }
}
