<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Category;
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
        $colors = array_unique(array($this->faker->colorName, $this->faker->colorName, $this->faker->colorName));
        $sizes = array_unique(array(rand(3, 10) . 'ml', rand(3, 10) . 'ml', rand(3, 10) . 'ml'));

        return [
            'name' =>$this->faker->word,
            'avatar_photo' => 'img/products/avatars/' . rand(1, 8) . '.jpg',
            'product_photo' => 'img/products/products/prod.png',
            'description' => $this->faker->sentence(10),
            'price' => $this->faker->randomFloat($nbMaxDecimals = 2, $min = 15, $max = 100),

            'category_id'=>Category::pluck('id')->random()
        ];
    }
}
