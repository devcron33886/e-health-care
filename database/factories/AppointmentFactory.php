<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AppointmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'patient_id' => rand(3,50),
            'appointment_date' => $this->faker->date(),
            'appointment_status' => rand(0,2),
            'doctor_id'=>2

        ];
    }
}
