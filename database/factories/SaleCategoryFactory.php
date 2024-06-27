<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\SaleCategory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SaleCategory>
 */
class SaleCategoryFactory extends Factory
{
    protected $model = SaleCategory::class;

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
