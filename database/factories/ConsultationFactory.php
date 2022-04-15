<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ConsultationFactory extends Factory
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
            'symptom_one'=>$this->faker->realText(),
            'symptom_two'=>$this->faker->realText(),
            'symptom_three'=>$this->faker->realText(),
            'symptom_four'=>$this->faker->realText(),
            'doctor_id'=>2,
            'created_at'=>date(now()),
            'updated_at'=>date(now()),
            'deleted_at'=>null,
        ];
    }
}
