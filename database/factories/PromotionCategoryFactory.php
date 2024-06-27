<?php

namespace Database\Factories;
use App\Models\PromotionCategory;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PromotionCategory>
 */
class PromotionCategoryFactory extends Factory
{
    protected $model = PromotionCategory::class;
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
