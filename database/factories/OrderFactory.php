<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\User;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Order::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $status = array('ordered', 'carted');
        $colors = array('better timing', 'certainty', 'common place', 'pink ground');
        $sizes = array('5ml', '9ml');

        return [
            'status' => $status[array_rand($status)],
            'amount' => rand(1, 3),
            'color' => $colors[array_rand($colors)],
            'size' => $sizes[array_rand($sizes)],
            'total_price' => $this->faker->randomFloat($nbMaxDecimal = 2, $min = 0, $max=1000),

            'user_id' => User::pluck('id')->random(),
            'product_id' => Product::pluck('id')->random()
        ];
    }
}
