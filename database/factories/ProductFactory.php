<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->name,
            'price' => $this->faker->numberBetween($min = 100, $max = 1000),
            'image' => 'uploads/photo.jpg',
            'description' => $this->faker->text(400),
            'additional_info' => $this->faker->text(100),
            'category_id' => $this->faker->numberBetween($min = 1, $max = 10),
            'subcategory_id' => $this->faker->numberBetween($min = 1, $max = 10),
        ];
    }
}
