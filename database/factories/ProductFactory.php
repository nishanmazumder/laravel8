<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
            'product_name' => $this->faker->name,
            'product_price' => $this->faker->randomNumber(3, true),
            'category_id' => $this->faker->numberBetween(1,2),
            'brand_id' => $this->faker->numberBetween(1,2),
            'product_short_des' => $this->faker->text(100),
            'product_long_des' => $this->faker->text(300),
            'product_img' => 'faker.jpg',
            'product_quantity' => $this->faker->randomNumber(3, true),
            'pub_status' => $this->faker->numberBetween(0,1),
            'created_at' => '20-11-14',
            'updated_at' => '20-11-14',
            'remember_token' => Str::random(10)
        ];
    }
}
