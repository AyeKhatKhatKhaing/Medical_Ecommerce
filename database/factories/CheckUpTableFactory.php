<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\CheckUpTable;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CheckupTable>
 */
class CheckupTableFactory extends Factory
{
    protected $model = CheckUpTable::class;

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
