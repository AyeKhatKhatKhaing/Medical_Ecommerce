<?php

namespace Database\Factories;
use App\Models\CheckUpItem;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CheckupItem>
 */
class CheckupItemFactory extends Factory
{
    protected $model = CheckUpItem::class;

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
