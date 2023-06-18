<?php

namespace Database\Factories\Admin;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Admin\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title'  => $this->faker->sentence(1),
            'slug'  => $this->faker->sentence,
            'thumbnail' => "no photo",
            'description' => $this->faker->paragraph(1),
            'parent_id' => null,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ];
    }
}
