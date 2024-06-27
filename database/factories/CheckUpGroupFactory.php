<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\CheckUpGroup;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CheckupGroup>
 */
class CheckupGroupFactory extends Factory
{
    protected $model = CheckUpGroup::class;

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
