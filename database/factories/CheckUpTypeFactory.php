<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\CheckUpType;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CheckupType>
 */
class CheckupTypeFactory extends Factory
{
    protected $model = CheckUpType::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name_en' => $this->faker->text(30),
            
        ];
    }
}
