<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'sku' => $this->faker->slug, // todo:: might be something different from slug
            'price' => $this->faker->randomFloat(10,2,2),
            'is_tax_exempt' => $this->faker->boolean,
            'status' => $this->faker->boolean,
            'is_kitchen_item' => $this->faker->boolean,
            'description' => $this->faker->text,
        ];
    }
}
