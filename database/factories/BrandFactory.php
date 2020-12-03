<?php

namespace Database\Factories;

use App\Models\Brand;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class BrandFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Brand::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'brand_name' => $this->faker->word(),
            'brand_des' => $this->faker->text(100),
            'brand_img' => 'brand.jpg',
            'pub_status' => $this->faker->numberBetween(0,1),
            'created_at' => '20-11-14',
            'updated_at' => '20-11-14',
            'remember_token' => Str::random(10)
        ];
    }
}
