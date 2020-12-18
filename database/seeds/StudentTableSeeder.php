<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

// model
use App\Student;

class StudentTableSeeder extends Seeder
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

        for ($i=0; $i < 35; $i++) { 
            Student::create([
                'name' => $faker->name,
                'age' => $faker->numberBetween($min = 18, $max = 25),
                'gender' => $gender
            ]);
        }
    }
}
