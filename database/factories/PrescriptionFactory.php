<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PrescriptionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'patient_id'=> rand(3,50),
            'medic_one'=> $this->faker->text(),
            'medic_two'=>$this->faker->text(),
            'medic_three'=>$this->faker->text(),
            'medic_four'=>$this->faker->text(),
            'doctor_id'=> 2,
            'created_at'=>date(now()),
            'updated_at'=>date(now()),
            'deleted_at'=>null,
        ];
    }
}
