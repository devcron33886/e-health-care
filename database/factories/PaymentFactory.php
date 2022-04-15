<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PaymentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'patient_id'=>rand(3,48),
            'amount'=>5000,
            'mobile'=>$this->faker->text(10),
            'start_from'=>$this->faker->date,
            'active_until'=>$this->faker->date,
            'status'=>rand(0,1),
            'created_at'=>date(now()),
            'updated_at'=>date(now()),
            'deleted_at'=>null,
        ];
    }
}
